<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //ngambil dari fungsi yang di helper
        is_logged_admin_user();

        date_default_timezone_set('Asia/Jakarta');
    }

    public function home()
    {
        $data['usulan'] = $this->db->where('rec_active', 1)->where('status_usulan', 1)->order_by('created_at', 'DESC')->get('usulan')->result_array();
        $data['detail_usulan'] = $this->db->get_where('detail_usulan', ['rec_active' => 1])->result_array();
        //print_r($data['usulan']);
        $data['title'] = 'Kartu Istri';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $data['tabel_user'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('karis/home', $data);
        $this->load->view('templates/footer');
    }
}
