<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //ngambil dari fungsi yang di helper
        is_logged_admin_user();
    }

    public function karpeg()
    {

        // $api_url = "http://localhost/rest-api-server/api/usulan?key=key-restapi";


        // $response = $this->curl->simple_get($api_url);
        //$result = json_decode($response, true);

        //$data['usulan'] = $result['data'];

        $data['usulan'] = $this->db->where('rec_active', 1)->order_by('created_at', 'DESC')->get('usulan')->result_array();
        //print_r($data['usulan']);
        $data['title'] = 'Kartu Pegawai';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $data['tabel_user'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('usulan/karpeg', $data);
        $this->load->view('templates/footer');
    }


    public function crud_usulan_karpeg($aksi)
    {

        if ($aksi == 'tambah') {

            $this->load->model('Usulan_model', 'usulan');
            $Kode = $this->usulan->getKodeMax();
            if (!empty($Kode['kodeTerbesar'])) {
                $urutan = (int) substr($Kode['kodeTerbesar'], 3, 3);
                $urutan++;
            } else {
                $urutan = 1;
            }

            $huruf = "KRP";
            $kodeUsulan = $huruf . sprintf("%03s", $urutan);



            $username = $this->session->userdata('username');
            $created_by = $this->db->get_where('user', ['username' => $username])->row_array();

            $data = [
                'id_user' => $this->input->post('id'),
                'kode_usulan' => $kodeUsulan,
                'tgl_usulan' => $this->input->post('tgl_usulan'),
                'no_surat' => $this->input->post('no_surat'),
                'jenis_usulan' => $this->input->post('jenis_usulan'),
                'created_by' => $created_by['nama_user'],
            ];
            if ($this->db->insert('usulan', $data)) {
                echo "ok";
            } else {
                echo "gagal";
            }

            $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Usulan berhasil ditambahkan!</div>');
        }

        if ($aksi == 'hapus') {
            $username = $this->session->userdata('username');
            $updated_by = $this->db->get_where('user', ['username' => $username])->row_array();
            $time = date('Y-m-d H:i:s');

            $data = [
                'updated_at' => $time,
                'updated_by' => $updated_by['nama_user'],
                'rec_active' => 0,
            ];
            if ($this->db->update('usulan', $data, array('id' => $this->input->post('id_usulan')))) {
                echo "ok";
            }

            $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Usulan berhasil dihapus!</div>');
        }


        /* $api_url = "http://localhost/rest-api-server/api/usulan";

        $data_user = $this->session->userdata();

        $form_data = array(
            'id_user' => $data_user['id'],
            'jenis_usulan' => $this->input->post('jenis_usulan'),
            'status_usulan' => 1,
            'key'  => 'key-restapi'
        );

        $response = $this->curl->simple_post($api_url, $form_data, array(CURLOPT_BUFFERSIZE => 10));
        $result = json_decode($response, true);
        if ($result['status'] == true) {
            echo "ok";
        } else {
            echo "gagal";
        }
        */
    }

    public function crud_detailusulan()
    {
        $api_url = "http://localhost/rest-api-server/api/usulan";

        $logs_usulan = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'kontak' => $this->input->post('kontak'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tmt_cpns' => $this->input->post('tmt_cpns')
        );
        $data = json_encode($logs_usulan);
        $form_data = array(
            'id_usulan'  => 1,
            'logs_usulan'  => $data,
            'key'  => 'key-restapi',
        );
        $response = $this->curl->simple_post($api_url, $form_data, array(CURLOPT_BUFFERSIZE => 10));
        $result = json_decode($response, true);
        if ($result['status'] == true) {
            echo "ok";
        } else {
            echo "gagal";
        }
    }

    public function riwayat_usulan()
    {

        $data['usulan'] = $this->db->where('rec_active', 1)->order_by('created_at', 'DESC')->get('usulan')->result_array();
        $data['detail_usulan'] = $this->db->get_where('detail_usulan', ['rec_active' => 1])->result_array();
        //print_r($data['usulan']);
        $data['title'] = 'Riwayat Usulan';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $data['tabel_user'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('usulan/riwayat_usulan', $data);
        $this->load->view('templates/footer');
    }



    public function detail_riwayat($id)
    {

        $data['usulan'] = $this->db->where('rec_active', 1)->where('id', $id)->get('usulan')->row_array();
        $data['title'] = 'Riwayat Usulan';

        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();
        $data['tabel_user'] = $this->db->get('user')->result_array();
        $data['detail_usulan'] = $this->db->get_where('detail_usulan', ['kode_usulan' => $data['usulan']['kode_usulan']])->result_array();
        $data['profile_pegawai'] = $this->db->get_where('profile_pegawai')->result_array();

        //$logs_usulan = $data['detail_usulan']['logs_usulan'];
        //$data['logs_usulan'] = json_decode($logs_usulan);

        //var_dump($data['logs_usulan']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('usulan/detail_riwayat', $data);
        $this->load->view('templates/footer');
    }


    public function crud_upload($pg)
    {
        if ($pg == 'hapus') {
            $id_berkas = $this->input->post('id_berkas');
            $id_usulan = $this->input->post('id_usulan');
            $nip = $this->input->post('nip');;
            if ($this->db->delete('berkas', ['id' => $id_berkas])) {
                echo $nip . '/' . $id_usulan;
            }
        }

        if ($pg == 'suratpengantar') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "PENGANTAR_KARPEG_BARU_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'karpeg_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        } else if ($pg == 'skcpns') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "SK_CPNS_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'karpeg_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        } else if ($pg == 'skpns') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "SK_PNS_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'karpeg_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        } else if ($pg == 'sttpp') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "STTPP_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'karpeg_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        } else if ($pg == 'fotopns') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "FOTO_PNS_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'karpeg_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        }
    }

    public function crud_upload_idcard($pg)
    {
        if ($pg == 'hapus') {
            $id_berkas = $this->input->post('id_berkas');
            $id_usulan = $this->input->post('id_usulan');
            $nip = $this->input->post('nip');;
            if ($this->db->delete('berkas', ['id' => $id_berkas])) {
                echo $nip . '/' . $id_usulan;
            }
        }

        if ($pg == 'suratpengantar') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "PENGANTAR_IDCARD_BARU_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'idcard_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        } else if ($pg == 'skcpns') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "SK_CPNS_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'idcard_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        } else if ($pg == 'skpns') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "SK_PNS_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'idcard_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        } else if ($pg == 'sttpp') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "STTPP_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'idcard_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        } else if ($pg == 'fotopns') {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "FOTO_PNS_" . $nip;
            $id_usulan = $this->input->post('id_usulan');

            // Check form submit or not 
            if ($this->input->post('upload') != NULL) {
                $data = array();
                if (!empty($_FILES['file']['name'])) {

                    $namafile = $_FILES['file']['name'];
                    $ext = explode('.', $namafile);
                    $ext = end($ext);
                    // Set preference 
                    $config['upload_path'] = 'upload/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '2000'; // max_size in kb 
                    $config['file_name'] = $namaberkas;

                    // Load upload library 
                    $this->load->library('upload', $config);

                    // File upload
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $this->upload->data();
                        $data = [
                            'id_usulan'      => $id_usulan,
                            'nip'           => $nip,
                            'path'         => 'upload/' . $namaberkas . '.' . $ext,
                            'nama_berkas'    => $namaberkas,
                            'jenis_berkas' => 'idcard_baru'
                        ];

                        $exec = $this->db->insert('berkas', $data);
                        if ($exec) {
                            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Berkas berhasil diupload!</div>');
                        }
                    } else {
                        $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                    }
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload, Berkas sudah diupload!</div>');
                }
                // load view 


                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('idcard/upload_berkas/') . $nip . '/' . $id_usulan));
            }
        }
    }

    public function crud_usulan($aksi)
    {

        if ($aksi == 'ubahstatus') {

            $username = $this->session->userdata('username');
            $updated_by = $this->db->get_where('user', ['username' => $username])->row_array();
            $time = date('Y-m-d H:i:s');

            $detail_usulan = $this->db->get_where('detail_usulan', ['kode_usulan' => $this->input->post('kode_usulan')])->result_array();


            if ($detail_usulan != null) {
                $data = [
                    'status_usulan' => $this->input->post('status_usulan'),
                    'updated_at' => $time,
                    'updated_by' => $updated_by['nama_user'],
                ];
                if ($this->db->update('usulan', $data, array('id' => $this->input->post('id_usulan')))) {
                    echo "ok";
                    $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Status berhasil diubah!</div>');
                }
            } else {
                $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Belum ada data pegawai yang diusulkan!</div>');
            }
        }
    }
}
