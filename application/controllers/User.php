<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //ngambil dari fungsi yang di helper
        is_logged_admin_user();
    }

    public function index()
    {
        //  $api_url = "http://localhost/rest-api-server/api/usulan?key=key-restapi";


        // $response = $this->curl->simple_get($api_url);
        //$result = json_decode($response, true);


        //$data['usulan'] = $result['data'];
        $username = $this->session->userdata('username');
        $data['usulan'] = $this->db->get_where('usulan', ['rec_active' => 1])->result_array();
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';


        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $this->load->model('Role_model', 'role');
        $data['role'] = $this->role->getRole();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_user = $this->input->post('nama_user');
            $username = $this->input->post('username');

            //CEK JIKA ADA GAMBAR YANG AKAN DIUPLOAD
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2084';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_user', $nama_user);
            $this->db->where('username', $username);
            $this->db->update('user');
            $this->session->set_flashdata('update', '<div class="alert alert-success" role="alert">Profile Anda berhasil diubah</div>');
            redirect('user/edit');
        }
    }

    public function gantiPassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/gantipassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('gantipassword', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
                redirect('user/gantipassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('gantipassword', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('user/gantipassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('gantipassword', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('user/gantipassword');
                }
            }
        }
    }
    /*
    public function karpeg_baru()
    {
        $data['title'] = 'Form Usulan Kartu Pegawai (Baru)';
        $data['user'] = $this->session->userdata();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/karpeg_baru', $data);
        $this->load->view('templates/footer');
    }
*/
}
