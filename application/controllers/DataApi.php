<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //ngambil dari fungsi yang di helper
        is_logged_admin_user();

        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data['data_api'] = $this->db->get_where('data_api')->result_array();
        $data['title'] = 'Data API';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/home', $data);
        $this->load->view('templates/footer');
    }

    public function crud_data_api($nama_api = null, $id = null)
    {
        if ($nama_api == "profile_pegawai") {
            $ch = curl_init();
            $api_url = "https://lasik.tangerangselatankota.go.id/simpeg/api/get_profile_pegawai";

            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "msg=TEST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $result = json_decode(curl_exec($ch));

            $username = $this->session->userdata('username');
            $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();
            $updated_by = $this->db->get_where('user', ['username' => $username])->row_array();
            $time = date('Y-m-d H:i:s');
            if ($result) {
                $pegawai = $result->pegawai;
                foreach ($pegawai as $p) {
                    $data_pegawai = $this->db->get_where('profile_pegawai', ['nip' => $p->nip])->row_array();
                    if ($data_pegawai == null) {

                        $ch2 = curl_init();
                        $api_url2 = "https://lasik.tangerangselatankota.go.id/simpeg/api/asn_profile/" . $p->nip;

                        curl_setopt($ch2, CURLOPT_URL, $api_url2);
                        curl_setopt($ch2, CURLOPT_POST, true);
                        curl_setopt($ch2, CURLOPT_POSTFIELDS, "msg=TEST");
                        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, FALSE);
                        curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
                        $result2 = json_decode(curl_exec($ch2));

                        if ($result2) {
                            $pegawai2 = $result2->pegawai;
                            $nama_lengkap = $pegawai2->nama_lengkap;
                        }

                        $input1 = [
                            'nip' => $p->nip,
                            'nama' => $p->nama,
                            'nama_lengkap' => $nama_lengkap,
                            'opd' => $p->nama_organisasi,
                            'email' => $p->email1,
                            'hp' => $p->hp1,
                            'gender' => $p->gender,
                            'nama_jabatan' => $p->nama_jabatan,
                            'updated_at' => $time,
                        ];

                        $this->db->set($input1);
                        $this->db->insert('profile_pegawai');
                    }

                    //  $dataupdate = [
                    //      'email' => $p->email1,
                    //      'hp' => $p->hp1,
                    //      'gender' => $p->gender,
                    //      'nama_jabatan' => $p->nama_jabatan,
                    //  ];
                    // $this->db->update('profile_pegawai', $dataupdate, array('nip' => $p->nip));
                }

                $input2 = [
                    'updated_at' => $time,
                    'updated_by' => $updated_by['nama_user'],
                ];

                if ($this->db->update('data_api', $input2, array('id' => $id))) {
                    $this->session->set_flashdata('dataapi', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
                    redirect((base_url('dataapi')));
                }
            } else {
                $this->session->set_flashdata('dataapi', '<div class="alert alert-danger" role="alert">Gagal Terhubung dengan Server!</div>');
                redirect((base_url('dataapi')));
            }
        }
    }
}
