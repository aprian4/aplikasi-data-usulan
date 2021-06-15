<?php
/*
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id,
        ]);
    
            
        

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
*/

function is_logged_admin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');

        if ($role_id != 1) {
            redirect('auth/blocked');
        }
    }
}

function is_logged_user()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');

        if ($role_id != 2) {
            redirect('auth/blocked');
        }
    }
}

function is_logged_admin_user()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            redirect('auth/blocked');
        }
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function send_wa($no_wa, $message)
{
    $token = 'yePK9u8agzCxuMhfixFQPHuRqIKRMSXdnjBkWbJzM3Y7dWyIFy';
    $phone = $no_wa;
    $message = $message;
    $url = 'http://ruangwa.id/api/send-message.php';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, array(
        'token'    => $token,
        'phone'     => $phone,
        'message'   => $message,
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

function send_email($email, $path, $subject, $message)
{
    $ci = get_instance();
    // Konfigurasi email
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        //'smtp_user' => 'bkpp.manajemenkinerja@gmail.com',  // Email gmail
        //'smtp_pass'   => 'bkppkinerja',  // Password gmail
        'smtp_user' => 'aprian.cendekia@gmail.com',  // Email gmail
        'smtp_pass'   => 'Aprian07112020',  // Password gmail
        'smtp_crypto' => 'ssl',
        'smtp_port'   => 465,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];

    // Load library email dan konfigurasinya
    $ci->load->library('email', $config);

    // Email dan nama pengirim
    $ci->email->from('bkpp.manajemenkinerja@gmail.com', 'BKPP Tangerang Selatan');

    // Email penerima
    $ci->email->to($email); // Ganti dengan email tujuan

    // Lampiran email, isi dengan url/path file
    $ci->email->attach($path);

    // Subject email
    $ci->email->subject($subject);

    // Isi email
    $ci->email->message($message);

    // Tampilkan pesan sukses atau error
    if ($ci->email->send()) {
        $result = "ok";
        return $result;
    } else {
        $result = "gagal";
        return $result;
    }
}

function get_bilangan($jml_data)
{
    $ci = get_instance();

    $bil_jml = 0;
    if ($jml_data == 1) {
        $bil_jml = "Satu";
    } else if ($jml_data == 2) {
        $bil_jml = "Dua";
    } else if ($jml_data == 3) {
        $bil_jml = "Tiga";
    } else if ($jml_data == 4) {
        $bil_jml = "Empat";
    } else if ($jml_data == 5) {
        $bil_jml = "Lima";
    } else if ($jml_data == 6) {
        $bil_jml = "Enam";
    } else if ($jml_data == 7) {
        $bil_jml = "Tujuh";
    } else if ($jml_data == 8) {
        $bil_jml = "Delapan";
    } else if ($jml_data == 9) {
        $bil_jml = "Sembilan";
    } else if ($jml_data == 10) {
        $bil_jml = "Sepuluh";
    } else if ($jml_data == 11) {
        $bil_jml = "Sebelas";
    } else if ($jml_data == 12) {
        $bil_jml = "Dua Belas";
    } else if ($jml_data == 13) {
        $bil_jml = "Tiga Belas";
    } else if ($jml_data == 14) {
        $bil_jml = "Empat Belas";
    } else if ($jml_data == 14) {
        $bil_jml = "Lima Belas";
    } else if ($jml_data == 15) {
        $bil_jml = "Enam Belas";
    } else if ($jml_data == 16) {
        $bil_jml = "Tujuh Belas";
    } else if ($jml_data == 17) {
        $bil_jml = "Delapan Belas";
    } else if ($jml_data == 18) {
        $bil_jml = "Sembilan Belas";
    } else if ($jml_data == 19) {
        $bil_jml = "Dua puluh";
    } else if ($jml_data == 21) {
        $bil_jml = "Dua Puluh Satu";
    } else if ($jml_data == 22) {
        $bil_jml = "Dua Puluh Dua";
    } else if ($jml_data == 23) {
        $bil_jml = "Dua Puluh Tiga";
    } else if ($jml_data == 24) {
        $bil_jml = "Dua Puluh Empat";
    } else if ($jml_data == 25) {
        $bil_jml = "Dua Puluh Lima";
    }

    return $bil_jml;
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
