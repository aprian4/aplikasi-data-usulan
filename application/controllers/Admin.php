<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //ngambil dari fungsi yang di helper
        is_logged_admin();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['role'] = $this->db->get('role_user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('role_user', ['id' => $role_id])->row_array();

        //$this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        //print_r($data['menu']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function tambah_user()
    {
        $data['title'] = 'Tambah User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_user', $data);
        $this->load->view('templates/footer');
    }


    public function crud_user()
    {

        $this->form_validation->set_rules('nama_user_baru', 'nama_user_baru', 'required|trim', [
            'required' => 'Nama Lengkap harus diisi'
        ]);
        $this->form_validation->set_rules('username_baru', 'username_baru', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus diisi', 'is_unique' => 'Username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password_baru', 'password_baru', 'required|trim|min_length[6]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Panjang password min. 6 karakter',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah User';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambah_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama_user_baru', true)),
                'username' => htmlspecialchars($this->input->post('username_baru', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan!</div>');

            redirect('admin/tambah_user');
        }
    }
}
