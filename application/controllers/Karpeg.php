<?php

use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') or exit('No direct script access allowed');

class Karpeg extends CI_Controller
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


        $data['usulan'] = $this->db->where('rec_active', 1)->order_by('created_at', 'DESC')->get('usulan')->result_array();
        $data['detail_usulan'] = $this->db->get_where('detail_usulan', ['rec_active' => 1])->result_array();
        //print_r($data['usulan']);
        $data['title'] = 'Kartu Pegawai';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();
        $data['profile_pegawai'] = $this->db->get('profile_pegawai')->result_array();

        $data['tabel_user'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('karpeg/home', $data);
        $this->load->view('templates/footer');
    }


    public function detail_karpeg($id)
    {

        $data['pegawai'] = $this->db->get('profile_pegawai')->result_array();
        $data['usulan'] = $this->db->where('rec_active', 1)->where('id', $id)->get('usulan')->row_array();
        $data['title'] = 'Kartu Pegawai';

        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();
        $data['tabel_user'] = $this->db->get('user')->result_array();
        $data['detail_usulan'] = $this->db->get_where('detail_usulan', ['kode_usulan' => $data['usulan']['kode_usulan']])->result_array();
        $data['profile_pegawai'] = $this->db->get('profile_pegawai')->result_array();
        $data['berkas'] = $this->db->get('berkas')->result_array();
        $berkas_perusulan = $this->db->get('berkas')->result_array();

        foreach ($data['detail_usulan'] as $lu) {

            if ($data['usulan']['jenis_usulan'] == "karpeg_baru") {
                $berkas1 = "PENGANTAR_KARPEG_BARU_" . $lu['nip'];
            } else if ($data['usulan']['jenis_usulan'] == "karpeg_pengganti") {
                $berkas1 = "PENGANTAR_KARPEG_PENGGANTI_" . $lu['nip'];
                $berkas6 = 'LAMPIRAN_X_' . $lu['nip'];
                $berkas7 = 'LAMPIRAN_XI_' . $lu['nip'];
                $berkas8 = 'KEHILANGAN_KARPEG_' . $lu['nip'];
            }
            $berkas2 = 'SK_CPNS_' . $lu['nip'];
            $berkas3 = 'SK_PNS_' . $lu['nip'];
            $berkas4 = 'STTPP_' . $lu['nip'];
            $berkas5 = 'FOTO_PNS_' . $lu['nip'];

            $sb1 = null;
            $sb2 = null;
            $sb3 = null;
            $sb4 = null;
            $sb5 = null;
            $sb6 = null;
            $sb7 = null;
            $sb8 = null;

            foreach ($berkas_perusulan as $bks) {
                if ($bks['nama_berkas'] == $berkas1) {
                    $sb1 = "Lengkap";
                }
                if ($bks['nama_berkas'] == $berkas2) {
                    $sb2 = "Lengkap";
                }
                if ($bks['nama_berkas'] == $berkas3) {
                    $sb3 = "Lengkap";
                }
                if ($bks['nama_berkas'] == $berkas4) {
                    $sb4 = "Lengkap";
                }
                if ($bks['nama_berkas'] == $berkas5) {
                    $sb5 = "Lengkap";
                }
                if ($data['usulan']['jenis_usulan'] == "karpeg_pengganti") {
                    if ($bks['nama_berkas'] == $berkas6) {
                        $sb6 = "Lengkap";
                    }
                    if ($bks['nama_berkas'] == $berkas7) {
                        $sb7 = "Lengkap";
                    }
                    if ($bks['nama_berkas'] == $berkas8) {
                        $sb8 = "Lengkap";
                    }
                }
            }

            if ($data['usulan']['jenis_usulan'] == "karpeg_baru") {
                if (($sb1 == "Lengkap") && ($sb2 == "Lengkap") && ($sb3 == "Lengkap") && ($sb4 == "Lengkap") && ($sb5 == "Lengkap")) {
                    $data1 = [
                        'status_berkas' => 1
                    ];
                    $this->db->update('detail_usulan', $data1, ['nip' => $lu['nip']]);
                } else {
                    $data2 = [
                        'status_berkas' => 0
                    ];
                    $this->db->update('detail_usulan', $data2, ['nip' => $lu['nip']]);
                }
            } else {
                if (($sb1 == "Lengkap") && ($sb2 == "Lengkap") && ($sb3 == "Lengkap") && ($sb4 == "Lengkap") && ($sb5 == "Lengkap") && ($sb6 == "Lengkap") && ($sb7 == "Lengkap") && ($sb8 == "Lengkap")) {
                    $data1 = [
                        'status_berkas' => 1
                    ];
                    $this->db->update('detail_usulan', $data1, ['nip' => $lu['nip']]);
                } else {
                    $data2 = [
                        'status_berkas' => 0
                    ];
                    $this->db->update('detail_usulan', $data2, ['nip' => $lu['nip']]);
                }
            }
        }


        //var_dump($data['logs_usulan']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('karpeg/detail_karpeg', $data);
        $this->load->view('templates/footer');
    }

    public function riwayat($id)
    {

        $data['usulan'] = $this->db->where('rec_active', 1)->where('id', $id)->get('usulan')->row_array();
        $data['title'] = 'Kartu Pegawai';

        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();
        $data['tabel_user'] = $this->db->get('user')->result_array();
        $data['detail_usulan'] = $this->db->get_where('detail_usulan', ['kode_usulan' => $data['usulan']['kode_usulan']])->result_array();
        $data['profile_pegawai'] = $this->db->get('profile_pegawai')->result_array();
        $data['berkas'] = $this->db->get_where('berkas', ['id_usulan' => $id])->result_array();

        //var_dump($data['logs_usulan']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('karpeg/riwayat', $data);
        $this->load->view('templates/footer');
    }

    public function riwayat_berkas($nip = null, $id_usulan = null, $jenis_usulan = null)
    {

        $data['nip'] = $nip;
        $data['id_usulan'] = $id_usulan;
        $data['title'] = 'Kartu Pegawai';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $namaberkas_sp = null;
        $namaberkas_lampiranx = null;
        $namaberkas_lampiranxi = null;
        $namaberkas_kehilangan = null;

        if ($jenis_usulan == "karpeg_baru") {
            $namaberkas_sp = "PENGANTAR_KARPEG_BARU_" . $nip;
        } else if ($jenis_usulan == "karpeg_pengganti") {
            $namaberkas_sp = "PENGANTAR_KARPEG_PENGGANTI_" . $nip;
            $namaberkas_lampiranx = "LAMPIRAN_X_" . $nip;
            $namaberkas_lampiranxi = "LAMPIRAN_XI_" . $nip;
            $namaberkas_kehilangan = "KEHILANGAN_KARPEG_" . $nip;

            $data['berkas_lampiranx'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_lampiranx])->row_array();
            $data['berkas_lampiranxi'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_lampiranxi])->row_array();
            $data['berkas_kehilangan'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_kehilangan])->row_array();
        }
        $namaberkas_skcpns = "SK_CPNS_" . $nip;
        $namaberkas_skpns = "SK_PNS_" . $nip;
        $namaberkas_sttpp = "STTPP_" . $nip;
        $namaberkas_foto = "FOTO_PNS_" . $nip;



        $data['berkas_sp'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_sp, 'jenis_berkas' => $jenis_usulan])->row_array();
        $data['berkas_skpns'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_skpns])->row_array();
        $data['berkas_skcpns'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_skcpns])->row_array();
        $data['berkas_sttpp'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_sttpp])->row_array();
        $data['berkas_foto'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_foto])->row_array();

        $data['tabel_user'] = $this->db->get('user')->result_array();


        $data['usulan'] = $this->db->where('rec_active', 1)->where('id', $data['id_usulan'])->get('usulan')->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('karpeg/riwayat_berkas', $data);
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

            $data2 = [
                'updated_at' => $time,
                'updated_by' => $updated_by['nama_user'],
                'rec_active' => 0,
            ];
            if ($this->db->update('usulan', $data, array('id' => $this->input->post('id_usulan')))) {
                $this->db->update('detail_usulan', $data2, array('kode_usulan' => $this->input->post('kode_usulan')));
                $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Usulan berhasil dihapus!</div>');
                redirect(base_url('karpeg/home'));
            }
        }

        if ($aksi == 'ubah') {
            $username = $this->session->userdata('username');
            $updated_by = $this->db->get_where('user', ['username' => $username])->row_array();
            $time = date('Y-m-d H:i:s');

            $data = [
                'tgl_usulan' => $this->input->post('tgl_usulan'),
                'no_surat' => $this->input->post('no_surat'),
                'jenis_usulan' => $this->input->post('jenis_usulan'),
                'updated_at' => $time,
                'updated_by' => $updated_by['nama_user'],
            ];

            if ($this->db->update('usulan', $data, array('id' => $this->input->post('id_usulan')))) {
                echo "ok";
            }

            $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Usulan berhasil diubah!</div>');
        }

        if ($aksi == 'ubahstatus') {
            $username = $this->session->userdata('username');
            $updated_by = $this->db->get_where('user', ['username' => $username])->row_array();
            $time = date('Y-m-d H:i:s');

            $detail_usulan = $this->db->get_where('detail_usulan', ['kode_usulan' => $this->input->post('kode_usulan')])->result_array();

            $cek_status = 1;
            foreach ($detail_usulan as $du) {
                if ($du['status_berkas'] == 0) {
                    $cek_status = 0;
                }
            }

            if ($detail_usulan != null) {
                if ($cek_status  == 0) {
                    $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Masih ada berkas yang belum lengkap, silahkan lengkapi!</div>');
                } else {
                    $data = [
                        'status_usulan' => 2,
                        'updated_at' => $time,
                        'updated_by' => $updated_by['nama_user'],
                    ];
                    if ($this->db->update('usulan', $data, array('id' => $this->input->post('id_usulan')))) {
                        $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Usulan telah diusulkan ke BKN!</div>');
                    }
                }
            } else {
                $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Belum ada data pegawai yang diusulkan!</div>');
            }
            redirect(base_url('karpeg/home'));
        }

        if ($aksi == 'ubahstatus2') {

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
                    $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Status berhasil diubah!</div>');
                }
            } else {
                $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Status gagal diubah!</div>');
            }
            redirect(base_url('karpeg/home'));
        }

        if ($aksi == 'tambah_pegawai') {
            $username = $this->session->userdata('username');
            $updated_by = $this->db->get_where('user', ['username' => $username])->row_array();
            $time = date('Y-m-d H:i:s');

            $nip = $this->input->post('nip');
            $detail_usulan = $this->db->get_where('detail_usulan', ['kode_usulan' => $this->input->post('kode_usulan')])->result_array();
            $cek = 0;
            $count = 0;

            if ($detail_usulan != null) {
                foreach ($detail_usulan as $dp) {
                    if ($dp['nip'] == $this->input->post('nip')) {
                        $cek = 1;
                    }
                    $count++;
                }
            }

            if ($count < 25) {
                if ($cek == 0) {
                    $data = [
                        'kode_usulan' => $this->input->post('kode_usulan'),
                        'nip' => $nip,
                        'updated_by' => $updated_by['nama_user'],
                    ];
                    if ($this->db->insert('detail_usulan', $data, array('kode_usulan' => $this->input->post('kode_usulan')))) {
                        echo "ok";
                    }
                    $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Pegawai berhasil ditambahkan!</div>');
                } else {
                    $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Pegawai yang dipilih sudah ada didaftar!</div>');
                }
            } else {
                $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Data Penuh. Maksimal 25 orang per usulan!</div>');
            }
        }
    }

    public function crud_usulan_detail_karpeg($aksi = null, $nip = null)
    {
        if ($aksi == 'hapus') {

            $kode_usulan = $this->input->post('kode_usulan');
            $id_usulan = $this->input->post('id_usulan');

            if ($this->db->where('nip', $nip)->where('kode_usulan', $kode_usulan)->delete('detail_usulan')) {
                $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
                redirect((base_url('karpeg/detail_karpeg/') . $id_usulan));
            } else {
                $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
                redirect((base_url('karpeg/detail_karpeg/') . $id_usulan));
            }
        }

        if ($aksi == 'lengkapidata') {

            $id_usulan = $this->input->post('id_usulan');
            $dataupdate = [
                'tmt_cpns' => date('d-m-Y', strtotime($this->input->post('tmt_cpns'))),
                'tgl_sk_cpns' => date('d-m-Y', strtotime($this->input->post('tgl_sk_cpns'))),
                'no_sk_cpns' => $this->input->post('no_sk_cpns'),
                'tmt_pns' => date('d-m-Y', strtotime($this->input->post('tmt_pns'))),
                'tgl_sk_pns' => date('d-m-Y', strtotime($this->input->post('tgl_sk_pns'))),
                'no_sk_pns' => $this->input->post('no_sk_pns'),
            ];

            if ($this->db->update('profile_pegawai', $dataupdate, array('nip' => $nip))) {
                $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
                redirect((base_url('karpeg/detail_karpeg/') . $id_usulan));
            } else {
                $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
                redirect((base_url('karpeg/detail_karpeg/') . $id_usulan));
            }
        }
    }

    public function upload_berkas($nip = null, $id_usulan = null, $jenis_usulan = null)
    {
        if ($jenis_usulan == null) {
            $jenis_usulan = $this->input->post('jenis_usulan');
        } else {
            $jenis_usulan = $jenis_usulan;
        }

        $data['nip'] = $nip;
        if ($id_usulan == null) {
            $data['id_usulan'] = $this->input->post('id_usulan');
        } else {
            $data['id_usulan'] = $id_usulan;
        }
        $data['title'] = 'Kartu Pegawai';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $namaberkas_sp = null;
        $namaberkas_lampiranx = null;
        $namaberkas_lampiranxi = null;
        $namaberkas_kehilangan = null;

        if ($jenis_usulan == "karpeg_baru") {
            $namaberkas_sp = "PENGANTAR_KARPEG_BARU_" . $nip;
        } else if ($jenis_usulan == "karpeg_pengganti") {
            $namaberkas_sp = "PENGANTAR_KARPEG_PENGGANTI_" . $nip;
            $namaberkas_lampiranx = "LAMPIRAN_X_" . $nip;
            $namaberkas_lampiranxi = "LAMPIRAN_XI_" . $nip;
            $namaberkas_kehilangan = "KEHILANGAN_KARPEG_" . $nip;

            $data['berkas_lampiranx'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_lampiranx])->row_array();
            $data['berkas_lampiranxi'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_lampiranxi])->row_array();
            $data['berkas_kehilangan'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_kehilangan])->row_array();
        }
        $namaberkas_skcpns = "SK_CPNS_" . $nip;
        $namaberkas_skpns = "SK_PNS_" . $nip;
        $namaberkas_sttpp = "STTPP_" . $nip;
        $namaberkas_foto = "FOTO_PNS_" . $nip;



        $data['berkas_sp'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_sp, 'jenis_berkas' => $jenis_usulan])->row_array();
        $data['berkas_skpns'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_skpns])->row_array();
        $data['berkas_skcpns'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_skcpns])->row_array();
        $data['berkas_sttpp'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_sttpp])->row_array();
        $data['berkas_foto'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_foto])->row_array();

        $data['tabel_user'] = $this->db->get('user')->result_array();


        $data['usulan'] = $this->db->where('rec_active', 1)->where('id', $data['id_usulan'])->get('usulan')->row_array();

        $detail_usulan = $this->db->get_where('detail_usulan', ['kode_usulan' => $data['usulan']['kode_usulan']])->result_array();
        $berkas_perusulan = $this->db->get('berkas')->result_array();

        $berkas1 = null;
        $berkas6 = null;
        $berkas7 = null;
        $berkas8 = null;

        foreach ($detail_usulan as $lu) {
            if ($jenis_usulan == "karpeg_baru") {
                $berkas1 = "PENGANTAR_KARPEG_BARU_" . $nip;
            } else if ($jenis_usulan == "karpeg_pengganti") {
                $berkas1 = "PENGANTAR_KARPEG_PENGGANTI_" . $nip;
                $berkas6 = "LAMPIRAN_X_" . $nip;
                $berkas7 = "LAMPIRAN_XI_" . $nip;
                $berkas8 = "KEHILANGAN_KARPEG_" . $nip;
            }
            $berkas2 = 'SK_CPNS_' . $lu['nip'];
            $berkas3 = 'SK_PNS_' . $lu['nip'];
            $berkas4 = 'STTPP_' . $lu['nip'];
            $berkas5 = 'FOTO_PNS_' . $lu['nip'];

            $sb1 = null;
            $sb2 = null;
            $sb3 = null;
            $sb4 = null;
            $sb5 = null;
            $sb6 = null;
            $sb7 = null;
            $sb8 = null;

            foreach ($berkas_perusulan as $bks) {
                if ($bks['nama_berkas'] == $berkas1) {
                    $sb1 = "Lengkap";
                }
                if ($bks['nama_berkas'] == $berkas2) {
                    $sb2 = "Lengkap";
                }
                if ($bks['nama_berkas'] == $berkas3) {
                    $sb3 = "Lengkap";
                }
                if ($bks['nama_berkas'] == $berkas4) {
                    $sb4 = "Lengkap";
                }
                if ($bks['nama_berkas'] == $berkas5) {
                    $sb5 = "Lengkap";
                }
                if ($jenis_usulan == "karpeg_pengganti") {
                    if ($bks['nama_berkas'] == $berkas6) {
                        $sb6 = "Lengkap";
                    }
                    if ($bks['nama_berkas'] == $berkas7) {
                        $sb7 = "Lengkap";
                    }
                    if ($bks['nama_berkas'] == $berkas8) {
                        $sb8 = "Lengkap";
                    }
                }
            }

            if ($jenis_usulan == "karpeg_baru") {
                if (($sb1 == "Lengkap") && ($sb2 == "Lengkap") && ($sb3 == "Lengkap") && ($sb4 == "Lengkap") && ($sb5 == "Lengkap")) {
                    $data1 = [
                        'status_berkas' => 1
                    ];
                    $this->db->update('detail_usulan', $data1, ['nip' => $lu['nip']]);
                } else {
                    $data2 = [
                        'status_berkas' => 0
                    ];
                    $this->db->update('detail_usulan', $data2, ['nip' => $lu['nip']]);
                }
            } else {
                if (($sb1 == "Lengkap") && ($sb2 == "Lengkap") && ($sb3 == "Lengkap") && ($sb4 == "Lengkap") && ($sb5 == "Lengkap") && ($sb6 == "Lengkap") && ($sb7 == "Lengkap") && ($sb8 == "Lengkap")) {
                    $data1 = [
                        'status_berkas' => 1
                    ];
                    $this->db->update('detail_usulan', $data1, ['nip' => $lu['nip']]);
                } else {
                    $data2 = [
                        'status_berkas' => 0
                    ];
                    $this->db->update('detail_usulan', $data2, ['nip' => $lu['nip']]);
                }
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('karpeg/upload_berkas', $data);
        $this->load->view('templates/footer');
    }

    public function crud_riwayat($pg)
    {
        if ($pg == "datakarpeg") {
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $id_usulan = $this->input->post('id_usulan');
            $jenis_usulan = $this->input->post('jenis_usulan');
            $status_karpeg =  $this->input->post('status_karpeg');
            $kode_usulan =  $this->input->post('kode_usulan');
            $no_kartu =  $this->input->post('no_kartu');
            $no_keputusan =  $this->input->post('no_keputusan');
            $tgl_terbit =  $this->input->post('tgl_terbit');
            $keterangan =  $this->input->post('keterangan');

            if ($status_karpeg == 1) {
                // Check form submit or not 
                $namaberkas = "SCAN_KARPEG_" . $nip;
                $data = array();

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
                        'jenis_berkas' => $jenis_usulan
                    ];

                    $this->db->insert('berkas', $data);
                } else {
                    $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert"><b>Berkas Gagal diupload, Pastikan format file .pdf dan ukuran maksimal 2 MB</b></div>');
                }

                $data = [
                    'no_kartu' => $no_kartu,
                    'no_keputusan' => $no_keputusan,
                    'tgl_terbit' => date('d-m-Y', strtotime($tgl_terbit)),
                    'status_karpeg' => $status_karpeg,
                    'keterangan' => null,
                    'posisi' => 1,
                ];
                $this->db->update('detail_usulan', $data, array('kode_usulan' => $kode_usulan, 'nip' => $nip));
                $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');

                // load view 
                redirect((base_url('karpeg/riwayat/') . $id_usulan));
            } else if ($status_karpeg == 2) {
                $data = [
                    'status_karpeg' => $status_karpeg,
                    'keterangan' => $keterangan,
                    'no_kartu' => null,
                    'no_keputusan' => null,
                    'tgl_terbit' => null,
                ];
                $this->db->update('detail_usulan', $data, array('kode_usulan' => $kode_usulan, 'nip' => $nip));
                $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
                redirect((base_url('karpeg/riwayat/') . $id_usulan));
            }
        } else if ($pg = "kirimnotifikasi") {
            $id_usulan = $this->input->post('id_usulan');
            $nip = $this->input->post('nip');
            $jenis_usulan = $this->input->post('jenis_usulan');

            //KIRIM NOTIFIKASI
            $profile = $this->db->get_where('profile_pegawai', ['nip' => $nip])->row_array();
            $no_hp = $profile['hp'];
            //$no_hp = "081286178578";
            $nama_lengkap = $profile['nama_lengkap'];

            $gender = "";
            if ($profile['gender'] == "p") {
                $gender = "Bapak";
            } else if ($profile['gender'] == "w") {
                $gender = "Ibu";
            }
            $message = "Yth.  " . $gender . " " . $nama_lengkap . "," . "%0D%0A" . "Kartu Pegawai (KARPEG) anda sudah selesai dicetak. Silahkan untuk mengambilnya di BKPP. Kami juga telah mengirim softcopy/ scan kartu pegawai anda melalui email anda. %0D%0A%0D%0A" . "Manajemen Kinerja - BKPP Tangsel";
            $notif = send_wa($no_hp, $message);
            $result = "Notifikasi WA gagal dikirim ke " . $no_hp;
            if ($notif['message'] == 'Sukses! Pesan telah terkirim') {
                $result = " Notifikasi WA berhasil dikirim!";
            }


            $nama_berkas = "SCAN_KARPEG_" . $nip;
            $berkas = $this->db->get_where('berkas', ['nama_berkas' => $nama_berkas, 'jenis_berkas' => $jenis_usulan])->row_array();
            $path_berkas = $berkas['path'];

            $email = $profile['email'];
            $path = base_url($path_berkas);
            $subject = "Pemberitahuan Kartu Pegawai (KARPEG)";
            $message =  "Yth.  " . $gender . " " . $nama_lengkap . ",<br> Kartu Pegawai (KARPEG) anda sudah selesai dicetak. Silahkan untuk mengambilnya di BKPP. Kami juga telah melampirkan softcopy/ scan kartu pegawai anda. <br><br> Manajemen Kinerja - BKPP Tangsel";

            $result2 = "Notifikasi Email gagal dikirim";
            $result_sendemail = send_email($email, $path, $subject, $message);
            if ($result_sendemail == "ok") {
                $result2 = " Notifikasi Email berhasil dikirim ke " . $email;
            }

            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">' . $result . ' dan ' . $result2 . '</div>');
            redirect((base_url('karpeg/riwayat/') . $id_usulan));
        }
    }

    public function crud_tandaterima()
    {

        $this->load->helper('url');
        $diambil_oleh =  $this->input->post('diambil_oleh');
        $id_usulan = $this->input->post('id_usulan');
        $jenis_usulan = $this->input->post('jenis_usulan');
        $kode_usulan =  $this->input->post('kode_usulan');
        $nip = $this->input->post('nip');
        $tgl_diambil =  $this->input->post('tgl_diambil');
        $namaberkas = "TANDA_TERIMA_" . $nip;
        $data = array();

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
                'jenis_berkas' => $jenis_usulan
            ];

            $this->db->insert('berkas', $data);
        }
        $data = [
            'diambil_oleh' => $diambil_oleh,
            'tgl_diambil' => date('d-m-Y', strtotime($tgl_diambil)),
            'posisi'  => 2,
        ];
        $this->db->update('detail_usulan', $data, array('kode_usulan' => $kode_usulan, 'nip' => $nip));
        $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');

        redirect((base_url('karpeg/riwayat/') . $id_usulan));
    }

    public function hapus_berkas_karpeg($id_berkas = null, $id_usulan = null)
    {
        if ($this->db->where('id', $id_berkas)->delete('berkas')) {
            $this->session->set_flashdata('upload', '<div class="alert alert-success" role="alert">File berhasil dihapus!</div>');
            redirect((base_url('karpeg/riwayat/') . $id_usulan));
        } else {
            $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">File gagal dihapus!</div>');
            redirect((base_url('karpeg/riwayat/') . $id_usulan));
        }
    }

    public function crud_upload($pg)
    {
        if ($pg == 'hapus') {
            $jenis_usulan = $this->input->post('jenis_usulan');
            $id_berkas = $this->input->post('id_berkas');
            $id_usulan = $this->input->post('id_usulan');
            $nip = $this->input->post('nip');;
            if ($this->db->delete('berkas', ['id' => $id_berkas])) {
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        }

        if ($pg == 'suratpengantar') {
            $jenis_usulan = $this->input->post('jenis_usulan');
            $id_usulan = $this->input->post('id_usulan');
            $nip = $this->input->post('nip');
            $this->load->helper('url');

            $namaberkas = null;
            if ($jenis_usulan == "karpeg_baru") {
                $namaberkas = "PENGANTAR_KARPEG_BARU_" . $nip;
            } else {
                $namaberkas = "PENGANTAR_KARPEG_PENGGANTI_" . $nip;
            }

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
                            'jenis_berkas' => $jenis_usulan
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


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        } else if ($pg == 'skcpns') {
            $jenis_usulan = $this->input->post('jenis_usulan');
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
                            'jenis_berkas' => $jenis_usulan
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


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        } else if ($pg == 'skpns') {
            $jenis_usulan = $this->input->post('jenis_usulan');
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
                            'jenis_berkas' => $jenis_usulan
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


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        } else if ($pg == 'sttpp') {
            $jenis_usulan = $this->input->post('jenis_usulan');
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
                            'jenis_berkas' => $jenis_usulan
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


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        } else if ($pg == 'fotopns') {
            $jenis_usulan = $this->input->post('jenis_usulan');
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
                            'jenis_berkas' => $jenis_usulan
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


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        } else if ($pg == 'lampiranx') {
            $jenis_usulan = $this->input->post('jenis_usulan');
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "LAMPIRAN_X_" . $nip;
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
                            'jenis_berkas' => $jenis_usulan
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


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        } else if ($pg == 'lampiranxi') {
            $jenis_usulan = $this->input->post('jenis_usulan');
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "LAMPIRAN_XI_" . $nip;
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
                            'jenis_berkas' => $jenis_usulan
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


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        } else if ($pg == 'kehilangan') {
            $jenis_usulan = $this->input->post('jenis_usulan');
            $this->load->helper('url');

            $nip = $this->input->post('nip');
            $namaberkas = "KEHILANGAN_KARPEG_" . $nip;
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
                            'jenis_berkas' => $jenis_usulan
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


                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            } else {
                // load view 
                $this->session->set_flashdata('upload', '<div class="alert alert-danger" role="alert">Berkas Gagal diupload!</div>');
                redirect((base_url('karpeg/upload_berkas/') . $nip . '/' . $id_usulan . '/' . $jenis_usulan));
            }
        }
    }
}
