<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Idcard extends CI_Controller
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
        $data['title'] = 'Kartu Tanda Pengenal';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $data['tabel_user'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('idcard/home', $data);
        $this->load->view('templates/footer');
    }

    public function detail_idcard($id)
    {

        $data['pegawai'] = $this->db->get('profile_pegawai')->result_array();
        $data['usulan'] = $this->db->where('rec_active', 1)->where('id', $id)->get('usulan')->row_array();
        $data['title'] = 'Kartu Tanda Pengenal';

        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();
        $data['tabel_user'] = $this->db->get('user')->result_array();
        $data['detail_usulan'] = $this->db->get_where('detail_usulan', ['kode_usulan' => $data['usulan']['kode_usulan']])->result_array();
        $data['profile_pegawai'] = $this->db->get('profile_pegawai')->result_array();
        $data['berkas'] = $this->db->get('berkas')->result_array();
        $berkas_perusulan = $this->db->get('berkas')->result_array();

        foreach ($data['detail_usulan'] as $lu) {
            $berkas1 = 'PENGANTAR_KARTU_TANDA_PENGENAL_BARU_' . $lu['nip'];
            $berkas2 = 'SK_CPNS_' . $lu['nip'];
            $berkas3 = 'SK_PNS_' . $lu['nip'];
            $berkas4 = 'STTPP_' . $lu['nip'];
            $berkas5 = 'FOTO_PNS_' . $lu['nip'];

            $sb1 = null;
            $sb2 = null;
            $sb3 = null;
            $sb4 = null;
            $sb5 = null;

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
            }

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
        }


        //var_dump($data['logs_usulan']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('idcard/detail_idcard', $data);
        $this->load->view('templates/footer');
    }

    public function crud_usulan_idcard($aksi)
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

            $huruf = "IDC";
            $kodeUsulan = $huruf . sprintf("%03s", $urutan);

            $username = $this->session->userdata('username');
            $created_by = $this->db->get_where('user', ['username' => $username])->row_array();

            $data = [
                'id_user' => $this->input->post('id'),
                'kode_usulan' => $kodeUsulan,
                'tgl_usulan' => $this->input->post('tgl_usulan'),
                'no_surat' => "-",
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
                echo "ok";
            }

            $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Usulan berhasil dihapus!</div>');
        }

        if ($aksi == 'ubah') {
            $username = $this->session->userdata('username');
            $updated_by = $this->db->get_where('user', ['username' => $username])->row_array();
            $time = date('Y-m-d H:i:s');

            $data = [
                'tgl_usulan' => $this->input->post('tgl_usulan'),
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
                        echo "ok";
                        $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Usulan telah diusulkan ke BKN!</div>');
                    }
                }
            } else {
                $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Belum ada data pegawai yang diusulkan!</div>');
            }
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

    public function crud_usulan_detail_idcard($aksi = null, $nip = null)
    {
        if ($aksi == 'hapus') {

            $kode_usulan = $this->input->post('kode_usulan');
            $id_usulan = $this->input->post('id_usulan');

            if ($this->db->where('nip', $nip)->where('kode_usulan', $kode_usulan)->delete('detail_usulan')) {
                $this->session->set_flashdata('usulan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
                redirect((base_url('idcard/detail_idcard/') . $id_usulan));
            } else {
                $this->session->set_flashdata('usulan', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
                redirect((base_url('idcard/detail_idcard/') . $id_usulan));
            }
        }
    }

    public function upload_berkas($nip = null, $id_usulan = null)
    {
        $data['nip'] = $nip;
        if ($id_usulan == null) {
            $data['id_usulan'] = $this->input->post('id_usulan');
        } else {
            $data['id_usulan'] = $id_usulan;
        }
        $data['title'] = 'Kartu Tanda Pengenal';
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();

        $namaberkas_sp = "PENGANTAR_KARTU_TANDA_PENGENAL_BARU_" . $nip;
        $namaberkas_skcpns = "SK_CPNS_" . $nip;
        $namaberkas_skpns = "SK_PNS_" . $nip;
        $namaberkas_sttpp = "STTPP_" . $nip;
        $namaberkas_foto = "FOTO_PNS_" . $nip;

        $jenisberkas = "kartu_tanda_pengenal_baru";
        $data['berkas_sp'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_sp, 'jenis_berkas' => $jenisberkas])->row_array();
        $data['berkas_skpns'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_skpns])->row_array();
        $data['berkas_skcpns'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_skcpns])->row_array();
        $data['berkas_sttpp'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_sttpp])->row_array();
        $data['berkas_foto'] = $this->db->get_where('berkas', ['nip' => $nip, 'nama_berkas' => $namaberkas_foto])->row_array();

        $data['tabel_user'] = $this->db->get('user')->result_array();


        $data['usulan'] = $this->db->where('rec_active', 1)->where('id', $data['id_usulan'])->get('usulan')->row_array();

        $detail_usulan = $this->db->get_where('detail_usulan', ['kode_usulan' => $data['usulan']['kode_usulan']])->result_array();
        $berkas_perusulan = $this->db->get('berkas')->result_array();

        foreach ($detail_usulan as $lu) {
            $berkas1 = 'PENGANTAR_KARTU_TANDA_PENGENAL_BARU_' . $lu['nip'];
            $berkas2 = 'SK_CPNS_' . $lu['nip'];
            $berkas3 = 'SK_PNS_' . $lu['nip'];
            $berkas4 = 'STTPP_' . $lu['nip'];
            $berkas5 = 'FOTO_PNS_' . $lu['nip'];

            $sb1 = null;
            $sb2 = null;
            $sb3 = null;
            $sb4 = null;
            $sb5 = null;

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
            }

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
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('idcard/upload_berkas', $data);
        $this->load->view('templates/footer');
    }
}
