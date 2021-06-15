<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Kolom username harus diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Kolom password harus diisi']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Pegawai';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasi login

            $this->_login();
        }
    }

    private function _login()
    {

        // API CLIENT SETTING
        /*
        $api_url = "http://localhost/rest-api-server/api/login";

        $form_data = array(
            'username'  => $this->input->post('username'),
            'password'  => $this->input->post('password'),
            'key'  => 'key-restapi',
        );

        $response = $this->curl->simple_post($api_url, $form_data, array(CURLOPT_BUFFERSIZE => 10));
        $result = json_decode($response, true);
        //print_r($result);

        if ($result['status'] == true) {
            $user = [
                'id' => $result['data']['id'],
                'username' => $result['data']['username'],
                'nama_user' => $result['data']['nama_user'],
                'image' => $result['data']['image'],
                'opd' => $result['data']['opd'],
                'role_id' => $result['data']['role_id']
            ];

            $this->session->set_userdata($user);
            $data['user'] = $this->session->userdata();

            if ($user['role_id'] == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('auth');
        }
*/
        //END API SETTING


        //LOGIN VIA DB LOCAL
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    // $data = [
                    //     'username' => $user['username'],
                    //    'role_id' => $user['role_id']
                    // ];
                    $user = [
                        'id' => $user['id'],
                        'username' =>  $user['username'],
                        'nama_user' => $user['nama_user'],
                        'image' => $user['image'],
                        'role_id' =>  $user['role_id']
                    ];

                    $this->session->set_userdata($user);
                    $data['user'] = $this->session->userdata();
                    // $this->session->set_userdata($data);
                    //  if ($user['role_id'] == 1) {
                    //      redirect('admin');
                    //  } else {
                    //     redirect('user');
                    // }

                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun anda tidak aktif!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nama_user', 'nama_user', 'required|trim', [
            'required' => 'Nama Lengkap harus diisi'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]|numeric', [
            'required' => 'Username harus diisi', 'is_unique' => 'Username sudah terdaftar', 'numeric' => 'Username harus berupa karakter angka'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Panjang password min. 8 karakter',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Akun';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Anda berhasil didaftarkan, Silahkan Login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Andah telah logout!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
