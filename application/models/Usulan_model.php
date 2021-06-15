<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan_model extends CI_Model
{
    public function getKodeMax()
    {
        $query = "SELECT max(kode_usulan) as kodeTerbesar FROM usulan";
        return $this->db->query($query)->row_array();
    }

    public function getIdBerkasMax()
    {
        $today = date("Ymd");
        $query = "SELECT max(kode_berkas) as kodeTerbesar FROM berkas";
        return $this->db->query($query)->row_array();
    }
}
