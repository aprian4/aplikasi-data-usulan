<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //ngambil dari fungsi yang di helper
        is_logged_admin_user();
        $this->load->library('word');
    }

    public function surat_usulan_karpeg($kode_usulan = null)
    {
        $PHPWord = $this->word;
        $document = $PHPWord->loadTemplate(FCPATH . 'assets/phpword/surat_usulan_karpeg.docx');

        $usulan = $this->db->get_where('usulan', ['kode_usulan' => $kode_usulan, 'rec_active' => 1])->row_array();
        $detail_usulan = $this->db->get_where('detail_usulan', ['kode_usulan' => $usulan['kode_usulan'], 'rec_active' => 1])->result_array();
        $detail_usulan_first = $this->db->where(['kode_usulan' => $usulan['kode_usulan'], 'rec_active' => 1])->order_by('nip', 'ASC')->get('detail_usulan')->result_array();
        $profile_pegawai = $this->db->get_where('profile_pegawai')->result_array();



        $a = 1;
        $nip1 = null;
        $nip2 = null;
        $nip3 = null;
        $nip4 = null;
        $nip5 = null;
        $nip6 = null;
        $nip7 = null;
        $nip8 = null;
        $nip9 = null;
        $nip10 = null;
        $nip11 = null;
        $nip12 = null;
        $nip13 = null;
        $nip14 = null;
        $nip15 = null;
        $nip16 = null;
        $nip17 = null;
        $nip18 = null;
        $nip19 = null;
        $nip20 = null;
        $nip21 = null;
        $nip22 = null;
        $nip23 = null;
        $nip24 = null;
        $nip25 = null;

        foreach ($detail_usulan_first as $duf) {
            if ($a == 1) {
                $nip1 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip1) {
                        $nama_pegawai1 = $pp['nama_lengkap'];
                        $tmt_cpns1 = $pp['tmt_cpns'];
                        $tgl_sk_cpns1 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns1 = $pp['no_sk_cpns'];
                        $tmt_pns1 = $pp['tmt_pns'];
                        $tgl_sk_pns1 = $pp['tgl_sk_pns'];
                        $no_sk_pns1 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 2) {
                $nip2 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip2) {
                        $nama_pegawai2 = $pp['nama_lengkap'];
                        $tmt_cpns2 = $pp['tmt_cpns'];
                        $tgl_sk_cpns2 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns2 = $pp['no_sk_cpns'];
                        $tmt_pns2 = $pp['tmt_pns'];
                        $tgl_sk_pns2 = $pp['tgl_sk_pns'];
                        $no_sk_pns2 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 3) {
                $nip3 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip3) {
                        $nama_pegawai3 = $pp['nama_lengkap'];
                        $tmt_cpns3 = $pp['tmt_cpns'];
                        $tgl_sk_cpns3 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns3 = $pp['no_sk_cpns'];
                        $tmt_pns3 = $pp['tmt_pns'];
                        $tgl_sk_pns3 = $pp['tgl_sk_pns'];
                        $no_sk_pns3 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 4) {
                $nip4 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip4) {
                        $nama_pegawai4 = $pp['nama_lengkap'];
                        $tmt_cpns4 = $pp['tmt_cpns'];
                        $tgl_sk_cpns4 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns4 = $pp['no_sk_cpns'];
                        $tmt_pns4 = $pp['tmt_pns'];
                        $tgl_sk_pns4 = $pp['tgl_sk_pns'];
                        $no_sk_pns4 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 5) {
                $nip5 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip5) {
                        $nama_pegawai5 = $pp['nama_lengkap'];
                        $tmt_cpns5 = $pp['tmt_cpns'];
                        $tgl_sk_cpns5 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns5 = $pp['no_sk_cpns'];
                        $tmt_pns5 = $pp['tmt_pns'];
                        $tgl_sk_pns5 = $pp['tgl_sk_pns'];
                        $no_sk_pns5 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 6) {
                $nip6 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip6) {
                        $nama_pegawai6 = $pp['nama_lengkap'];
                        $tmt_cpns6 = $pp['tmt_cpns'];
                        $tgl_sk_cpns6 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns6 = $pp['no_sk_cpns'];
                        $tmt_pns6 = $pp['tmt_pns'];
                        $tgl_sk_pns6 = $pp['tgl_sk_pns'];
                        $no_sk_pns6 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 7) {
                $nip7 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip7) {
                        $nama_pegawai7 = $pp['nama_lengkap'];
                        $tmt_cpns7 = $pp['tmt_cpns'];
                        $tgl_sk_cpns7 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns7 = $pp['no_sk_cpns'];
                        $tmt_pns7 = $pp['tmt_pns'];
                        $tgl_sk_pns7 = $pp['tgl_sk_pns'];
                        $no_sk_pns7 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 8) {
                $nip8 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip8) {
                        $nama_pegawai8 = $pp['nama_lengkap'];
                        $tmt_cpns8 = $pp['tmt_cpns'];
                        $tgl_sk_cpns8 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns8 = $pp['no_sk_cpns'];
                        $tmt_pns8 = $pp['tmt_pns'];
                        $tgl_sk_pns8 = $pp['tgl_sk_pns'];
                        $no_sk_pns8 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 9) {
                $nip9 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip9) {
                        $nama_pegawai9 = $pp['nama_lengkap'];
                        $tmt_cpns9 = $pp['tmt_cpns'];
                        $tgl_sk_cpns9 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns9 = $pp['no_sk_cpns'];
                        $tmt_pns9 = $pp['tmt_pns'];
                        $tgl_sk_pns9 = $pp['tgl_sk_pns'];
                        $no_sk_pns9 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 10) {
                $nip10 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip10) {
                        $nama_pegawai10 = $pp['nama_lengkap'];
                        $tmt_cpns10 = $pp['tmt_cpns'];
                        $tgl_sk_cpns10 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns10 = $pp['no_sk_cpns'];
                        $tmt_pns10 = $pp['tmt_pns'];
                        $tgl_sk_pns10 = $pp['tgl_sk_pns'];
                        $no_sk_pns10 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 11) {
                $nip11 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip11) {
                        $nama_pegawai11 = $pp['nama_lengkap'];
                        $tmt_cpns11 = $pp['tmt_cpns'];
                        $tgl_sk_cpns11 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns11 = $pp['no_sk_cpns'];
                        $tmt_pns11 = $pp['tmt_pns'];
                        $tgl_sk_pns11 = $pp['tgl_sk_pns'];
                        $no_sk_pns11 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 12) {
                $nip12 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip12) {
                        $nama_pegawai12 = $pp['nama_lengkap'];
                        $tmt_cpns12 = $pp['tmt_cpns'];
                        $tgl_sk_cpns12 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns12 = $pp['no_sk_cpns'];
                        $tmt_pns12 = $pp['tmt_pns'];
                        $tgl_sk_pns12 = $pp['tgl_sk_pns'];
                        $no_sk_pns12 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 13) {
                $nip13 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip13) {
                        $nama_pegawai13 = $pp['nama_lengkap'];
                        $tmt_cpns13 = $pp['tmt_cpns'];
                        $tgl_sk_cpns13 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns13 = $pp['no_sk_cpns'];
                        $tmt_pns13 = $pp['tmt_pns'];
                        $tgl_sk_pns13 = $pp['tgl_sk_pns'];
                        $no_sk_pns13 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 14) {
                $nip14 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip14) {
                        $nama_pegawai14 = $pp['nama_lengkap'];
                        $tmt_cpns14 = $pp['tmt_cpns'];
                        $tgl_sk_cpns14 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns14 = $pp['no_sk_cpns'];
                        $tmt_pns14 = $pp['tmt_pns'];
                        $tgl_sk_pns14 = $pp['tgl_sk_pns'];
                        $no_sk_pns14 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 15) {
                $nip15 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip15) {
                        $nama_pegawai15 = $pp['nama_lengkap'];
                        $tmt_cpns15 = $pp['tmt_cpns'];
                        $tgl_sk_cpns15 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns15 = $pp['no_sk_cpns'];
                        $tmt_pns15 = $pp['tmt_pns'];
                        $tgl_sk_pns15 = $pp['tgl_sk_pns'];
                        $no_sk_pns15 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 16) {
                $nip16 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip16) {
                        $nama_pegawai16 = $pp['nama_lengkap'];
                        $tmt_cpns16 = $pp['tmt_cpns'];
                        $tgl_sk_cpns16 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns16 = $pp['no_sk_cpns'];
                        $tmt_pns16 = $pp['tmt_pns'];
                        $tgl_sk_pns16 = $pp['tgl_sk_pns'];
                        $no_sk_pns16 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 17) {
                $nip17 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip17) {
                        $nama_pegawai17 = $pp['nama_lengkap'];
                        $tmt_cpns17 = $pp['tmt_cpns'];
                        $tgl_sk_cpns17 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns17 = $pp['no_sk_cpns'];
                        $tmt_pns17 = $pp['tmt_pns'];
                        $tgl_sk_pns17 = $pp['tgl_sk_pns'];
                        $no_sk_pns17 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 18) {
                $nip18 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip18) {
                        $nama_pegawai18 = $pp['nama_lengkap'];
                        $tmt_cpns18 = $pp['tmt_cpns'];
                        $tgl_sk_cpns18 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns18 = $pp['no_sk_cpns'];
                        $tmt_pns18 = $pp['tmt_pns'];
                        $tgl_sk_pns18 = $pp['tgl_sk_pns'];
                        $no_sk_pns18 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 19) {
                $nip19 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip19) {
                        $nama_pegawai19 = $pp['nama_lengkap'];
                        $tmt_cpns19 = $pp['tmt_cpns'];
                        $tgl_sk_cpns19 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns19 = $pp['no_sk_cpns'];
                        $tmt_pns19 = $pp['tmt_pns'];
                        $tgl_sk_pns19 = $pp['tgl_sk_pns'];
                        $no_sk_pns19 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 20) {
                $nip20 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip20) {
                        $nama_pegawai20 = $pp['nama_lengkap'];
                        $tmt_cpns20 = $pp['tmt_cpns'];
                        $tgl_sk_cpns20 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns20 = $pp['no_sk_cpns'];
                        $tmt_pns20 = $pp['tmt_pns'];
                        $tgl_sk_pns20 = $pp['tgl_sk_pns'];
                        $no_sk_pns20 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 21) {
                $nip21 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip21) {
                        $nama_pegawai21 = $pp['nama_lengkap'];
                        $tmt_cpns21 = $pp['tmt_cpns'];
                        $tgl_sk_cpns21 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns21 = $pp['no_sk_cpns'];
                        $tmt_pns21 = $pp['tmt_pns'];
                        $tgl_sk_pns21 = $pp['tgl_sk_pns'];
                        $no_sk_pns21 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 22) {
                $nip22 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip22) {
                        $nama_pegawai22 = $pp['nama_lengkap'];
                        $tmt_cpns22 = $pp['tmt_cpns'];
                        $tgl_sk_cpns22 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns22 = $pp['no_sk_cpns'];
                        $tmt_pns22 = $pp['tmt_pns'];
                        $tgl_sk_pns22 = $pp['tgl_sk_pns'];
                        $no_sk_pns22 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 23) {
                $nip23 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip23) {
                        $nama_pegawai23 = $pp['nama_lengkap'];
                        $tmt_cpns23 = $pp['tmt_cpns'];
                        $tgl_sk_cpns23 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns23 = $pp['no_sk_cpns'];
                        $tmt_pns23 = $pp['tmt_pns'];
                        $tgl_sk_pns23 = $pp['tgl_sk_pns'];
                        $no_sk_pns23 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 24) {
                $nip24 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip24) {
                        $nama_pegawai24 = $pp['nama_lengkap'];
                        $tmt_cpns24 = $pp['tmt_cpns'];
                        $tgl_sk_cpns24 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns24 = $pp['no_sk_cpns'];
                        $tmt_pns24 = $pp['tmt_pns'];
                        $tgl_sk_pns24 = $pp['tgl_sk_pns'];
                        $no_sk_pns24 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 25) {
                $nip25 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip25) {
                        $nama_pegawai25 = $pp['nama_lengkap'];
                        $tmt_cpns25 = $pp['tmt_cpns'];
                        $tgl_sk_cpns25 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns25 = $pp['no_sk_cpns'];
                        $tmt_pns25 = $pp['tmt_pns'];
                        $tgl_sk_pns25 = $pp['tgl_sk_pns'];
                        $no_sk_pns25 = $pp['no_sk_pns'];
                    }
                }
            }
            $a++;
        }


        $jenis_usulan = null;
        if ($usulan['jenis_usulan'] == "karpeg_baru") {
            $jenis_usulan = "Kartu Pegawai (Karpeg)";
        } else if ($usulan['jenis_usulan'] == "karpeg_pengganti") {
            $jenis_usulan = "Kartu Pegawai (Karpeg)";
        }


        $jml_data = 0;
        foreach ($detail_usulan as $det) {
            if ($det['kode_usulan'] == $kode_usulan) {
                $jml_data++;
            }
        }

        $bil_jml = get_bilangan($jml_data);

        // simple parsing
        $document->setValue('{tgl_surat}', tgl_indo($usulan['tgl_usulan']));
        $document->setValue('{no_surat}', $usulan['no_surat']);
        $document->setValue('{jenis_usulan}', $jenis_usulan);
        $document->setValue('{jml_diusulkan}', $jml_data);
        $document->setValue('{jml_diusulkan2}', $bil_jml);

        if ($nip1 != null) {
            $document->setValue('{nama_pegawai1}', $nama_pegawai1);
            $document->setValue('{nip1}', $nip1);
            $document->setValue('{tmt_cpns1}', $tmt_cpns1);
            $document->setValue('{tgl_sk_cpns1}', $tgl_sk_cpns1);
            $document->setValue('{no_sk_cpns1}', $no_sk_cpns1);
            $document->setValue('{tmt_pns1}', $tmt_pns1);
            $document->setValue('{tgl_sk_pns1}', $tgl_sk_pns1);
            $document->setValue('{no_sk_pns1}', $no_sk_pns1);
        } else {
            $document->setValue('{nama_pegawai1}', "");
            $document->setValue('{nip1}', "");
            $document->setValue('{tmt_cpns1}', "");
            $document->setValue('{tgl_sk_cpns1}', "");
            $document->setValue('{no_sk_cpns1}', "");
            $document->setValue('{tmt_pns1}', "");
            $document->setValue('{tgl_sk_pns1}', "");
            $document->setValue('{no_sk_pns1}', "");
        }

        if ($nip2 != null) {
            $document->setValue('{nama_pegawai2}', $nama_pegawai2);
            $document->setValue('{nip2}', $nip2);
            $document->setValue('{tmt_cpns2}', $tmt_cpns2);
            $document->setValue('{tgl_sk_cpns2}', $tgl_sk_cpns2);
            $document->setValue('{no_sk_cpns2}', $no_sk_cpns2);
            $document->setValue('{tmt_pns2}', $tmt_pns2);
            $document->setValue('{tgl_sk_pns2}', $tgl_sk_pns2);
            $document->setValue('{no_sk_pns2}', $no_sk_pns2);
        } else {
            $document->setValue('{nama_pegawai2}', "");
            $document->setValue('{nip2}', "");
            $document->setValue('{tmt_cpns2}', "");
            $document->setValue('{tgl_sk_cpns2}', "");
            $document->setValue('{no_sk_cpns2}', "");
            $document->setValue('{tmt_pns2}', "");
            $document->setValue('{tgl_sk_pns2}', "");
            $document->setValue('{no_sk_pns2}', "");
        }

        if ($nip3 != null) {
            $document->setValue('{nama_pegawai3}', $nama_pegawai3);
            $document->setValue('{nip3}', $nip3);
            $document->setValue('{tmt_cpns3}', $tmt_cpns3);
            $document->setValue('{tgl_sk_cpns3}', $tgl_sk_cpns3);
            $document->setValue('{no_sk_cpns3}', $no_sk_cpns3);
            $document->setValue('{tmt_pns3}', $tmt_pns3);
            $document->setValue('{tgl_sk_pns3}', $tgl_sk_pns3);
            $document->setValue('{no_sk_pns3}', $no_sk_pns3);
        } else {
            $document->setValue('{nama_pegawai3}', "");
            $document->setValue('{nip3}', "");
            $document->setValue('{tmt_cpns3}', "");
            $document->setValue('{tgl_sk_cpns3}', "");
            $document->setValue('{no_sk_cpns3}', "");
            $document->setValue('{tmt_pns3}', "");
            $document->setValue('{tgl_sk_pns3}', "");
            $document->setValue('{no_sk_pns3}', "");
        }

        if ($nip4 != null) {
            $document->setValue('{nama_pegawai4}', $nama_pegawai4);
            $document->setValue('{nip4}', $nip4);
            $document->setValue('{tmt_cpns4}', $tmt_cpns4);
            $document->setValue('{tgl_sk_cpns4}', $tgl_sk_cpns4);
            $document->setValue('{no_sk_cpns4}', $no_sk_cpns4);
            $document->setValue('{tmt_pns4}', $tmt_pns4);
            $document->setValue('{tgl_sk_pns4}', $tgl_sk_pns4);
            $document->setValue('{no_sk_pns4}', $no_sk_pns4);
        } else {
            $document->setValue('{nama_pegawai4}', "");
            $document->setValue('{nip4}', "");
            $document->setValue('{tmt_cpns4}', "");
            $document->setValue('{tgl_sk_cpns4}', "");
            $document->setValue('{no_sk_cpns4}', "");
            $document->setValue('{tmt_pns4}', "");
            $document->setValue('{tgl_sk_pns4}', "");
            $document->setValue('{no_sk_pns4}', "");
        }

        if ($nip5 != null) {
            $document->setValue('{nama_pegawai5}', $nama_pegawai5);
            $document->setValue('{nip5}', $nip5);
            $document->setValue('{tmt_cpns5}', $tmt_cpns5);
            $document->setValue('{tgl_sk_cpns5}', $tgl_sk_cpns5);
            $document->setValue('{no_sk_cpns5}', $no_sk_cpns5);
            $document->setValue('{tmt_pns5}', $tmt_pns5);
            $document->setValue('{tgl_sk_pns5}', $tgl_sk_pns5);
            $document->setValue('{no_sk_pns5}', $no_sk_pns5);
        } else {
            $document->setValue('{nama_pegawai5}', "");
            $document->setValue('{nip5}', "");
            $document->setValue('{tmt_cpns5}', "");
            $document->setValue('{tgl_sk_cpns5}', "");
            $document->setValue('{no_sk_cpns5}', "");
            $document->setValue('{tmt_pns5}', "");
            $document->setValue('{tgl_sk_pns5}', "");
            $document->setValue('{no_sk_pns5}', "");
        }

        if ($nip6 != null) {
            $document->setValue('{nama_pegawai6}', $nama_pegawai6);
            $document->setValue('{nip6}', $nip6);
            $document->setValue('{tmt_cpns6}', $tmt_cpns6);
            $document->setValue('{tgl_sk_cpns6}', $tgl_sk_cpns6);
            $document->setValue('{no_sk_cpns6}', $no_sk_cpns6);
            $document->setValue('{tmt_pns6}', $tmt_pns6);
            $document->setValue('{tgl_sk_pns6}', $tgl_sk_pns6);
            $document->setValue('{no_sk_pns6}', $no_sk_pns6);
        } else {
            $document->setValue('{nama_pegawai6}', "");
            $document->setValue('{nip6}', "");
            $document->setValue('{tmt_cpns6}', "");
            $document->setValue('{tgl_sk_cpns6}', "");
            $document->setValue('{no_sk_cpns6}', "");
            $document->setValue('{tmt_pns6}', "");
            $document->setValue('{tgl_sk_pns6}', "");
            $document->setValue('{no_sk_pns6}', "");
        }

        if ($nip7 != null) {
            $document->setValue('{nama_pegawai7}', $nama_pegawai7);
            $document->setValue('{nip7}', $nip7);
            $document->setValue('{tmt_cpns7}', $tmt_cpns7);
            $document->setValue('{tgl_sk_cpns7}', $tgl_sk_cpns7);
            $document->setValue('{no_sk_cpns7}', $no_sk_cpns7);
            $document->setValue('{tmt_pns7}', $tmt_pns7);
            $document->setValue('{tgl_sk_pns7}', $tgl_sk_pns7);
            $document->setValue('{no_sk_pns7}', $no_sk_pns7);
        } else {
            $document->setValue('{nama_pegawai7}', "");
            $document->setValue('{nip7}', "");
            $document->setValue('{tmt_cpns7}', "");
            $document->setValue('{tgl_sk_cpns7}', "");
            $document->setValue('{no_sk_cpns7}', "");
            $document->setValue('{tmt_pns7}', "");
            $document->setValue('{tgl_sk_pns7}', "");
            $document->setValue('{no_sk_pns7}', "");
        }

        if ($nip8 != null) {
            $document->setValue('{nama_pegawai8}', $nama_pegawai8);
            $document->setValue('{nip8}', $nip8);
            $document->setValue('{tmt_cpns8}', $tmt_cpns8);
            $document->setValue('{tgl_sk_cpns8}', $tgl_sk_cpns8);
            $document->setValue('{no_sk_cpns8}', $no_sk_cpns8);
            $document->setValue('{tmt_pns8}', $tmt_pns8);
            $document->setValue('{tgl_sk_pns8}', $tgl_sk_pns8);
            $document->setValue('{no_sk_pns8}', $no_sk_pns8);
        } else {
            $document->setValue('{nama_pegawai8}', "");
            $document->setValue('{nip8}', "");
            $document->setValue('{tmt_cpns8}', "");
            $document->setValue('{tgl_sk_cpns8}', "");
            $document->setValue('{no_sk_cpns8}', "");
            $document->setValue('{tmt_pns8}', "");
            $document->setValue('{tgl_sk_pns8}', "");
            $document->setValue('{no_sk_pns8}', "");
        }

        if ($nip9 != null) {
            $document->setValue('{nama_pegawai9}', $nama_pegawai9);
            $document->setValue('{nip9}', $nip9);
            $document->setValue('{tmt_cpns9}', $tmt_cpns9);
            $document->setValue('{tgl_sk_cpns9}', $tgl_sk_cpns9);
            $document->setValue('{no_sk_cpns9}', $no_sk_cpns9);
            $document->setValue('{tmt_pns9}', $tmt_pns9);
            $document->setValue('{tgl_sk_pns9}', $tgl_sk_pns9);
            $document->setValue('{no_sk_pns9}', $no_sk_pns9);
        } else {
            $document->setValue('{nama_pegawai9}', "");
            $document->setValue('{nip9}', "");
            $document->setValue('{tmt_cpns9}', "");
            $document->setValue('{tgl_sk_cpns9}', "");
            $document->setValue('{no_sk_cpns9}', "");
            $document->setValue('{tmt_pns9}', "");
            $document->setValue('{tgl_sk_pns9}', "");
            $document->setValue('{no_sk_pns9}', "");
        }

        if ($nip10 != null) {
            $document->setValue('{nama_pegawai10}', $nama_pegawai10);
            $document->setValue('{nip10}', $nip10);
            $document->setValue('{tmt_cpns10}', $tmt_cpns10);
            $document->setValue('{tgl_sk_cpns10}', $tgl_sk_cpns10);
            $document->setValue('{no_sk_cpns10}', $no_sk_cpns10);
            $document->setValue('{tmt_pns10}', $tmt_pns10);
            $document->setValue('{tgl_sk_pns10}', $tgl_sk_pns10);
            $document->setValue('{no_sk_pns10}', $no_sk_pns10);
        } else {
            $document->setValue('{nama_pegawai10}', "");
            $document->setValue('{nip10}', "");
            $document->setValue('{tmt_cpns10}', "");
            $document->setValue('{tgl_sk_cpns10}', "");
            $document->setValue('{no_sk_cpns10}', "");
            $document->setValue('{tmt_pns10}', "");
            $document->setValue('{tgl_sk_pns10}', "");
            $document->setValue('{no_sk_pns10}', "");
        }

        if ($nip11 != null) {
            $document->setValue('{nama_pegawai11}', $nama_pegawai11);
            $document->setValue('{nip11}', $nip11);
            $document->setValue('{tmt_cpns11}', $tmt_cpns11);
            $document->setValue('{tgl_sk_cpns11}', $tgl_sk_cpns11);
            $document->setValue('{no_sk_cpns11}', $no_sk_cpns11);
            $document->setValue('{tmt_pns11}', $tmt_pns11);
            $document->setValue('{tgl_sk_pns11}', $tgl_sk_pns11);
            $document->setValue('{no_sk_pns11}', $no_sk_pns11);
        } else {
            $document->setValue('{nama_pegawai11}', "");
            $document->setValue('{nip11}', "");
            $document->setValue('{tmt_cpns11}', "");
            $document->setValue('{tgl_sk_cpns11}', "");
            $document->setValue('{no_sk_cpns11}', "");
            $document->setValue('{tmt_pns11}', "");
            $document->setValue('{tgl_sk_pns11}', "");
            $document->setValue('{no_sk_pns11}', "");
        }

        if ($nip12 != null) {
            $document->setValue('{nama_pegawai12}', $nama_pegawai12);
            $document->setValue('{nip12}', $nip12);
            $document->setValue('{tmt_cpns12}', "$tmt_cpns12");
            $document->setValue('{tgl_sk_cpns12}', $tgl_sk_cpns12);
            $document->setValue('{no_sk_cpns12}', $no_sk_cpns12);
            $document->setValue('{tmt_pns12}', $tmt_pns12);
            $document->setValue('{tgl_sk_pns12}', $tgl_sk_pns12);
            $document->setValue('{no_sk_pns12}', $no_sk_pns12);
        } else {
            $document->setValue('{nama_pegawai12}', "");
            $document->setValue('{nip12}', "");
            $document->setValue('{tmt_cpns12}', "");
            $document->setValue('{tgl_sk_cpns12}', "");
            $document->setValue('{no_sk_cpns12}', "");
            $document->setValue('{tmt_pns12}', "");
            $document->setValue('{tgl_sk_pns12}', "");
            $document->setValue('{no_sk_pns12}', "");
        }

        if ($nip13 != null) {
            $document->setValue('{nama_pegawai13}', $nama_pegawai13);
            $document->setValue('{nip13}', $nip13);
            $document->setValue('{tmt_cpns13}', $tmt_cpns13);
            $document->setValue('{tgl_sk_cpns13}', $tgl_sk_cpns13);
            $document->setValue('{no_sk_cpns13}', $no_sk_cpns13);
            $document->setValue('{tmt_pns13}', $tmt_pns13);
            $document->setValue('{tgl_sk_pns13}', $tgl_sk_pns13);
            $document->setValue('{no_sk_pns13}', $no_sk_pns13);
        } else {
            $document->setValue('{nama_pegawai13}', "");
            $document->setValue('{nip13}', "");
            $document->setValue('{tmt_cpns13}', "");
            $document->setValue('{tgl_sk_cpns13}', "");
            $document->setValue('{no_sk_cpns13}', "");
            $document->setValue('{tmt_pns13}', "");
            $document->setValue('{tgl_sk_pns13}', "");
            $document->setValue('{no_sk_pns13}', "");
        }

        if ($nip14 != null) {
            $document->setValue('{nama_pegawai14}', $nama_pegawai14);
            $document->setValue('{nip14}', $nip14);
            $document->setValue('{tmt_cpns14}', $tmt_cpns14);
            $document->setValue('{tgl_sk_cpns14}', $tgl_sk_cpns14);
            $document->setValue('{no_sk_cpns14}', $no_sk_cpns14);
            $document->setValue('{tmt_pns14}', $tmt_pns14);
            $document->setValue('{tgl_sk_pns14}', $tgl_sk_pns14);
            $document->setValue('{no_sk_pns14}', $no_sk_pns14);
        } else {
            $document->setValue('{nama_pegawai14}', "");
            $document->setValue('{nip14}', "");
            $document->setValue('{tmt_cpns14}', "");
            $document->setValue('{tgl_sk_cpns14}', "");
            $document->setValue('{no_sk_cpns14}', "");
            $document->setValue('{tmt_pns14}', "");
            $document->setValue('{tgl_sk_pns14}', "");
            $document->setValue('{no_sk_pns14}', "");
        }

        if ($nip15 != null) {
            $document->setValue('{nama_pegawai15}', $nama_pegawai15);
            $document->setValue('{nip15}', $nip15);
            $document->setValue('{tmt_cpns15}', $tmt_cpns15);
            $document->setValue('{tgl_sk_cpns15}', $tgl_sk_cpns15);
            $document->setValue('{no_sk_cpns15}', $no_sk_cpns15);
            $document->setValue('{tmt_pns15}', $tmt_pns15);
            $document->setValue('{tgl_sk_pns15}', $tgl_sk_pns15);
            $document->setValue('{no_sk_pns15}', $no_sk_pns15);
        } else {
            $document->setValue('{nama_pegawai15}', "");
            $document->setValue('{nip15}', "");
            $document->setValue('{tmt_cpns15}', "");
            $document->setValue('{tgl_sk_cpns15}', "");
            $document->setValue('{no_sk_cpns15}', "");
            $document->setValue('{tmt_pns15}', "");
            $document->setValue('{tgl_sk_pns15}', "");
            $document->setValue('{no_sk_pns15}', "");
        }

        if ($nip16 != null) {
            $document->setValue('{nama_pegawai16}', $nama_pegawai16);
            $document->setValue('{nip16}', $nip16);
            $document->setValue('{tmt_cpns16}', $tmt_cpns16);
            $document->setValue('{tgl_sk_cpns16}', $tgl_sk_cpns16);
            $document->setValue('{no_sk_cpns16}', $no_sk_cpns16);
            $document->setValue('{tmt_pns16}', $tmt_pns16);
            $document->setValue('{tgl_sk_pns16}', $tgl_sk_pns16);
            $document->setValue('{no_sk_pns16}', $no_sk_pns16);
        } else {
            $document->setValue('{nama_pegawai16}', "");
            $document->setValue('{nip16}', "");
            $document->setValue('{tmt_cpns16}', "");
            $document->setValue('{tgl_sk_cpns16}', "");
            $document->setValue('{no_sk_cpns16}', "");
            $document->setValue('{tmt_pns16}', "");
            $document->setValue('{tgl_sk_pns16}', "");
            $document->setValue('{no_sk_pns16}', "");
        }

        if ($nip17 != null) {
            $document->setValue('{nama_pegawai17}', $nama_pegawai17);
            $document->setValue('{nip17}', $nip17);
            $document->setValue('{tmt_cpns17}', $tmt_cpns17);
            $document->setValue('{tgl_sk_cpns17}', $tgl_sk_cpns17);
            $document->setValue('{no_sk_cpns17}', $no_sk_cpns17);
            $document->setValue('{tmt_pns17}', $tmt_pns17);
            $document->setValue('{tgl_sk_pns17}', $tgl_sk_pns17);
            $document->setValue('{no_sk_pns17}', $no_sk_pns17);
        } else {
            $document->setValue('{nama_pegawai17}', "");
            $document->setValue('{nip17}', "");
            $document->setValue('{tmt_cpns17}', "");
            $document->setValue('{tgl_sk_cpns17}', "");
            $document->setValue('{no_sk_cpns17}', "");
            $document->setValue('{tmt_pns17}', "");
            $document->setValue('{tgl_sk_pns17}', "");
            $document->setValue('{no_sk_pns17}', "");
        }

        if ($nip18 != null) {
            $document->setValue('{nama_pegawai18}', $nama_pegawai18);
            $document->setValue('{nip18}', $nip18);
            $document->setValue('{tmt_cpns18}', $tmt_cpns18);
            $document->setValue('{tgl_sk_cpns18}', $tgl_sk_cpns18);
            $document->setValue('{no_sk_cpns18}', $no_sk_cpns18);
            $document->setValue('{tmt_pns18}', $tmt_pns18);
            $document->setValue('{tgl_sk_pns18}', $tgl_sk_pns18);
            $document->setValue('{no_sk_pns18}', $no_sk_pns18);
        } else {
            $document->setValue('{nama_pegawai18}', "");
            $document->setValue('{nip18}', "");
            $document->setValue('{tmt_cpns18}', "");
            $document->setValue('{tgl_sk_cpns18}', "");
            $document->setValue('{no_sk_cpns18}', "");
            $document->setValue('{tmt_pns18}', "");
            $document->setValue('{tgl_sk_pns18}', "");
            $document->setValue('{no_sk_pns18}', "");
        }

        if ($nip19 != null) {
            $document->setValue('{nama_pegawai19}', $nama_pegawai19);
            $document->setValue('{nip19}', $nip19);
            $document->setValue('{tmt_cpns19}', $tmt_cpns19);
            $document->setValue('{tgl_sk_cpns19}', $tgl_sk_cpns19);
            $document->setValue('{no_sk_cpns19}', $no_sk_cpns19);
            $document->setValue('{tmt_pns19}', $tmt_pns19);
            $document->setValue('{tgl_sk_pns19}', $tgl_sk_pns19);
            $document->setValue('{no_sk_pns19}', $no_sk_pns19);
        } else {
            $document->setValue('{nama_pegawai19}', "");
            $document->setValue('{nip19}', "");
            $document->setValue('{tmt_cpns19}', "");
            $document->setValue('{tgl_sk_cpns19}', "");
            $document->setValue('{no_sk_cpns19}', "");
            $document->setValue('{tmt_pns19}', "");
            $document->setValue('{tgl_sk_pns19}', "");
            $document->setValue('{no_sk_pns19}', "");
        }

        if ($nip20 != null) {
            $document->setValue('{nama_pegawai20}', $nama_pegawai20);
            $document->setValue('{nip20}', $nip20);
            $document->setValue('{tmt_cpns20}', $tmt_cpns20);
            $document->setValue('{tgl_sk_cpns20}', $tgl_sk_cpns20);
            $document->setValue('{no_sk_cpns20}', $no_sk_cpns20);
            $document->setValue('{tmt_pns20}', $tmt_pns20);
            $document->setValue('{tgl_sk_pns20}', $tgl_sk_pns20);
            $document->setValue('{no_sk_pns20}', $no_sk_pns20);
        } else {
            $document->setValue('{nama_pegawai20}', "");
            $document->setValue('{nip20}', "");
            $document->setValue('{tmt_cpns20}', "");
            $document->setValue('{tgl_sk_cpns20}', "");
            $document->setValue('{no_sk_cpns20}', "");
            $document->setValue('{tmt_pns20}', "");
            $document->setValue('{tgl_sk_pns20}', "");
            $document->setValue('{no_sk_pns20}', "");
        }

        if ($nip21 != null) {
            $document->setValue('{nama_pegawai21}', $nama_pegawai21);
            $document->setValue('{nip21}', $nip21);
            $document->setValue('{tmt_cpns21}', $tmt_cpns21);
            $document->setValue('{tgl_sk_cpns21}', $tgl_sk_cpns21);
            $document->setValue('{no_sk_cpns21}', $no_sk_cpns21);
            $document->setValue('{tmt_pns21}', $tmt_pns21);
            $document->setValue('{tgl_sk_pns21}', $tgl_sk_pns21);
            $document->setValue('{no_sk_pns21}', $no_sk_pns21);
        } else {
            $document->setValue('{nama_pegawai21}', "");
            $document->setValue('{nip21}', "");
            $document->setValue('{tmt_cpns21}', "");
            $document->setValue('{tgl_sk_cpns21}', "");
            $document->setValue('{no_sk_cpns21}', "");
            $document->setValue('{tmt_pns21}', "");
            $document->setValue('{tgl_sk_pns21}', "");
            $document->setValue('{no_sk_pns21}', "");
        }

        if ($nip22 != null) {
            $document->setValue('{nama_pegawai22}', $nama_pegawai22);
            $document->setValue('{nip22}', $nip22);
            $document->setValue('{tmt_cpns22}', $tmt_cpns22);
            $document->setValue('{tgl_sk_cpns22}', $tgl_sk_cpns22);
            $document->setValue('{no_sk_cpns22}', $no_sk_cpns22);
            $document->setValue('{tmt_pns22}', $tmt_pns22);
            $document->setValue('{tgl_sk_pns22}', $tgl_sk_pns22);
            $document->setValue('{no_sk_pns22}', $no_sk_pns22);
        } else {
            $document->setValue('{nama_pegawai22}', "");
            $document->setValue('{nip22}', "");
            $document->setValue('{tmt_cpns22}', "");
            $document->setValue('{tgl_sk_cpns22}', "");
            $document->setValue('{no_sk_cpns22}', "");
            $document->setValue('{tmt_pns22}', "");
            $document->setValue('{tgl_sk_pns22}', "");
            $document->setValue('{no_sk_pns22}', "");
        }

        if ($nip23 != null) {
            $document->setValue('{nama_pegawai23}', $nama_pegawai23);
            $document->setValue('{nip23}', $nip23);
            $document->setValue('{tmt_cpns23}', $tmt_cpns23);
            $document->setValue('{tgl_sk_cpns23}', $tgl_sk_cpns23);
            $document->setValue('{no_sk_cpns23}', $no_sk_cpns23);
            $document->setValue('{tmt_pns23}', $tmt_pns23);
            $document->setValue('{tgl_sk_pns23}', $tgl_sk_pns23);
            $document->setValue('{no_sk_pns23}', $no_sk_pns23);
        } else {
            $document->setValue('{nama_pegawai23}', "");
            $document->setValue('{nip23}', "");
            $document->setValue('{tmt_cpns23}', "");
            $document->setValue('{tgl_sk_cpns23}', "");
            $document->setValue('{no_sk_cpns23}', "");
            $document->setValue('{tmt_pns23}', "");
            $document->setValue('{tgl_sk_pns23}', "");
            $document->setValue('{no_sk_pns23}', "");
        }

        if ($nip24 != null) {
            $document->setValue('{nama_pegawai24}', $nama_pegawai24);
            $document->setValue('{nip24}', $nip24);
            $document->setValue('{tmt_cpns24}', $tmt_cpns24);
            $document->setValue('{tgl_sk_cpns24}', $tgl_sk_cpns24);
            $document->setValue('{no_sk_cpns24}', $no_sk_cpns24);
            $document->setValue('{tmt_pns24}', $tmt_pns24);
            $document->setValue('{tgl_sk_pns24}', $tgl_sk_pns24);
            $document->setValue('{no_sk_pns24}', $no_sk_pns24);
        } else {
            $document->setValue('{nama_pegawai24}', "");
            $document->setValue('{nip24}', "");
            $document->setValue('{tmt_cpns24}', "");
            $document->setValue('{tgl_sk_cpns24}', "");
            $document->setValue('{no_sk_cpns24}', "");
            $document->setValue('{tmt_pns24}', "");
            $document->setValue('{tgl_sk_pns24}', "");
            $document->setValue('{no_sk_pns24}', "");
        }

        if ($nip25 != null) {
            $document->setValue('{nama_pegawai25}', $nama_pegawai25);
            $document->setValue('{nip25}', $nip25);
            $document->setValue('{tmt_cpns25}', $tmt_cpns25);
            $document->setValue('{tgl_sk_cpns25}', $tgl_sk_cpns25);
            $document->setValue('{no_sk_cpns25}', $no_sk_cpns25);
            $document->setValue('{tmt_pns25}', $tmt_pns25);
            $document->setValue('{tgl_sk_pns25}', $tgl_sk_pns25);
            $document->setValue('{no_sk_pns25}', $no_sk_pns25);
        } else {
            $document->setValue('{nama_pegawai25}', "");
            $document->setValue('{nip25}', "");
            $document->setValue('{tmt_cpns25}', "");
            $document->setValue('{tgl_sk_cpns25}', "");
            $document->setValue('{no_sk_cpns25}', "");
            $document->setValue('{tmt_pns25}', "");
            $document->setValue('{tgl_sk_pns25}', "");
            $document->setValue('{no_sk_pns25}', "");
        }

        $kode_usulan = $kode_usulan;

        // save file
        $tmp_file = FCPATH . 'assets/phpword/surat_usulan_karpeg_' . $kode_usulan . '.docx';
        $filename = 'Surat-Usulan-Karpeg-' . $kode_usulan . '.docx';
        $document->save($tmp_file);
        // print('berhasil');

        header("Content-Disposition: attachment; filename=$filename");
        readfile($tmp_file); // or echo file_get_contents($temp_file);
        //unlink($tmp_file);
        // print('berhasil');
    }

    public function surat_usulan_karsu($kode_usulan = null)
    {
        $PHPWord = $this->word;
        $document = $PHPWord->loadTemplate(FCPATH . 'assets/phpword/surat_usulan_karpeg.docx');

        $usulan = $this->db->get_where('usulan', ['kode_usulan' => $kode_usulan, 'rec_active' => 1])->row_array();
        $detail_usulan = $this->db->get_where('detail_usulan', ['kode_usulan' => $usulan['kode_usulan'], 'rec_active' => 1])->result_array();
        $detail_usulan_first = $this->db->where(['kode_usulan' => $usulan['kode_usulan'], 'rec_active' => 1])->order_by('nip', 'ASC')->get('detail_usulan')->result_array();
        $profile_pegawai = $this->db->get_where('profile_pegawai')->result_array();



        $a = 1;
        $nip1 = null;
        $nip2 = null;
        $nip3 = null;
        $nip4 = null;
        $nip5 = null;
        $nip6 = null;
        $nip7 = null;
        $nip8 = null;
        $nip9 = null;
        $nip10 = null;
        $nip11 = null;
        $nip12 = null;
        $nip13 = null;
        $nip14 = null;
        $nip15 = null;
        $nip16 = null;
        $nip17 = null;
        $nip18 = null;
        $nip19 = null;
        $nip20 = null;
        $nip21 = null;
        $nip22 = null;
        $nip23 = null;
        $nip24 = null;
        $nip25 = null;

        foreach ($detail_usulan_first as $duf) {
            if ($a == 1) {
                $nip1 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip1) {
                        $nama_pegawai1 = $pp['nama_lengkap'];
                        $tmt_cpns1 = $pp['tmt_cpns'];
                        $tgl_sk_cpns1 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns1 = $pp['no_sk_cpns'];
                        $tmt_pns1 = $pp['tmt_pns'];
                        $tgl_sk_pns1 = $pp['tgl_sk_pns'];
                        $no_sk_pns1 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 2) {
                $nip2 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip2) {
                        $nama_pegawai2 = $pp['nama_lengkap'];
                        $tmt_cpns2 = $pp['tmt_cpns'];
                        $tgl_sk_cpns2 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns2 = $pp['no_sk_cpns'];
                        $tmt_pns2 = $pp['tmt_pns'];
                        $tgl_sk_pns2 = $pp['tgl_sk_pns'];
                        $no_sk_pns2 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 3) {
                $nip3 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip3) {
                        $nama_pegawai3 = $pp['nama_lengkap'];
                        $tmt_cpns3 = $pp['tmt_cpns'];
                        $tgl_sk_cpns3 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns3 = $pp['no_sk_cpns'];
                        $tmt_pns3 = $pp['tmt_pns'];
                        $tgl_sk_pns3 = $pp['tgl_sk_pns'];
                        $no_sk_pns3 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 4) {
                $nip4 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip4) {
                        $nama_pegawai4 = $pp['nama_lengkap'];
                        $tmt_cpns4 = $pp['tmt_cpns'];
                        $tgl_sk_cpns4 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns4 = $pp['no_sk_cpns'];
                        $tmt_pns4 = $pp['tmt_pns'];
                        $tgl_sk_pns4 = $pp['tgl_sk_pns'];
                        $no_sk_pns4 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 5) {
                $nip5 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip5) {
                        $nama_pegawai5 = $pp['nama_lengkap'];
                        $tmt_cpns5 = $pp['tmt_cpns'];
                        $tgl_sk_cpns5 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns5 = $pp['no_sk_cpns'];
                        $tmt_pns5 = $pp['tmt_pns'];
                        $tgl_sk_pns5 = $pp['tgl_sk_pns'];
                        $no_sk_pns5 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 6) {
                $nip6 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip6) {
                        $nama_pegawai6 = $pp['nama_lengkap'];
                        $tmt_cpns6 = $pp['tmt_cpns'];
                        $tgl_sk_cpns6 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns6 = $pp['no_sk_cpns'];
                        $tmt_pns6 = $pp['tmt_pns'];
                        $tgl_sk_pns6 = $pp['tgl_sk_pns'];
                        $no_sk_pns6 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 7) {
                $nip7 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip7) {
                        $nama_pegawai7 = $pp['nama_lengkap'];
                        $tmt_cpns7 = $pp['tmt_cpns'];
                        $tgl_sk_cpns7 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns7 = $pp['no_sk_cpns'];
                        $tmt_pns7 = $pp['tmt_pns'];
                        $tgl_sk_pns7 = $pp['tgl_sk_pns'];
                        $no_sk_pns7 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 8) {
                $nip8 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip8) {
                        $nama_pegawai8 = $pp['nama_lengkap'];
                        $tmt_cpns8 = $pp['tmt_cpns'];
                        $tgl_sk_cpns8 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns8 = $pp['no_sk_cpns'];
                        $tmt_pns8 = $pp['tmt_pns'];
                        $tgl_sk_pns8 = $pp['tgl_sk_pns'];
                        $no_sk_pns8 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 9) {
                $nip9 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip9) {
                        $nama_pegawai9 = $pp['nama_lengkap'];
                        $tmt_cpns9 = $pp['tmt_cpns'];
                        $tgl_sk_cpns9 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns9 = $pp['no_sk_cpns'];
                        $tmt_pns9 = $pp['tmt_pns'];
                        $tgl_sk_pns9 = $pp['tgl_sk_pns'];
                        $no_sk_pns9 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 10) {
                $nip10 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip10) {
                        $nama_pegawai10 = $pp['nama_lengkap'];
                        $tmt_cpns10 = $pp['tmt_cpns'];
                        $tgl_sk_cpns10 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns10 = $pp['no_sk_cpns'];
                        $tmt_pns10 = $pp['tmt_pns'];
                        $tgl_sk_pns10 = $pp['tgl_sk_pns'];
                        $no_sk_pns10 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 11) {
                $nip11 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip11) {
                        $nama_pegawai11 = $pp['nama_lengkap'];
                        $tmt_cpns11 = $pp['tmt_cpns'];
                        $tgl_sk_cpns11 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns11 = $pp['no_sk_cpns'];
                        $tmt_pns11 = $pp['tmt_pns'];
                        $tgl_sk_pns11 = $pp['tgl_sk_pns'];
                        $no_sk_pns11 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 12) {
                $nip12 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip12) {
                        $nama_pegawai12 = $pp['nama_lengkap'];
                        $tmt_cpns12 = $pp['tmt_cpns'];
                        $tgl_sk_cpns12 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns12 = $pp['no_sk_cpns'];
                        $tmt_pns12 = $pp['tmt_pns'];
                        $tgl_sk_pns12 = $pp['tgl_sk_pns'];
                        $no_sk_pns12 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 13) {
                $nip13 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip13) {
                        $nama_pegawai13 = $pp['nama_lengkap'];
                        $tmt_cpns13 = $pp['tmt_cpns'];
                        $tgl_sk_cpns13 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns13 = $pp['no_sk_cpns'];
                        $tmt_pns13 = $pp['tmt_pns'];
                        $tgl_sk_pns13 = $pp['tgl_sk_pns'];
                        $no_sk_pns13 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 14) {
                $nip14 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip14) {
                        $nama_pegawai14 = $pp['nama_lengkap'];
                        $tmt_cpns14 = $pp['tmt_cpns'];
                        $tgl_sk_cpns14 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns14 = $pp['no_sk_cpns'];
                        $tmt_pns14 = $pp['tmt_pns'];
                        $tgl_sk_pns14 = $pp['tgl_sk_pns'];
                        $no_sk_pns14 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 15) {
                $nip15 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip15) {
                        $nama_pegawai15 = $pp['nama_lengkap'];
                        $tmt_cpns15 = $pp['tmt_cpns'];
                        $tgl_sk_cpns15 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns15 = $pp['no_sk_cpns'];
                        $tmt_pns15 = $pp['tmt_pns'];
                        $tgl_sk_pns15 = $pp['tgl_sk_pns'];
                        $no_sk_pns15 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 16) {
                $nip16 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip16) {
                        $nama_pegawai16 = $pp['nama_lengkap'];
                        $tmt_cpns16 = $pp['tmt_cpns'];
                        $tgl_sk_cpns16 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns16 = $pp['no_sk_cpns'];
                        $tmt_pns16 = $pp['tmt_pns'];
                        $tgl_sk_pns16 = $pp['tgl_sk_pns'];
                        $no_sk_pns16 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 17) {
                $nip17 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip17) {
                        $nama_pegawai17 = $pp['nama_lengkap'];
                        $tmt_cpns17 = $pp['tmt_cpns'];
                        $tgl_sk_cpns17 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns17 = $pp['no_sk_cpns'];
                        $tmt_pns17 = $pp['tmt_pns'];
                        $tgl_sk_pns17 = $pp['tgl_sk_pns'];
                        $no_sk_pns17 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 18) {
                $nip18 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip18) {
                        $nama_pegawai18 = $pp['nama_lengkap'];
                        $tmt_cpns18 = $pp['tmt_cpns'];
                        $tgl_sk_cpns18 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns18 = $pp['no_sk_cpns'];
                        $tmt_pns18 = $pp['tmt_pns'];
                        $tgl_sk_pns18 = $pp['tgl_sk_pns'];
                        $no_sk_pns18 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 19) {
                $nip19 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip19) {
                        $nama_pegawai19 = $pp['nama_lengkap'];
                        $tmt_cpns19 = $pp['tmt_cpns'];
                        $tgl_sk_cpns19 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns19 = $pp['no_sk_cpns'];
                        $tmt_pns19 = $pp['tmt_pns'];
                        $tgl_sk_pns19 = $pp['tgl_sk_pns'];
                        $no_sk_pns19 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 20) {
                $nip20 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip20) {
                        $nama_pegawai20 = $pp['nama_lengkap'];
                        $tmt_cpns20 = $pp['tmt_cpns'];
                        $tgl_sk_cpns20 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns20 = $pp['no_sk_cpns'];
                        $tmt_pns20 = $pp['tmt_pns'];
                        $tgl_sk_pns20 = $pp['tgl_sk_pns'];
                        $no_sk_pns20 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 21) {
                $nip21 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip21) {
                        $nama_pegawai21 = $pp['nama_lengkap'];
                        $tmt_cpns21 = $pp['tmt_cpns'];
                        $tgl_sk_cpns21 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns21 = $pp['no_sk_cpns'];
                        $tmt_pns21 = $pp['tmt_pns'];
                        $tgl_sk_pns21 = $pp['tgl_sk_pns'];
                        $no_sk_pns21 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 22) {
                $nip22 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip22) {
                        $nama_pegawai22 = $pp['nama_lengkap'];
                        $tmt_cpns22 = $pp['tmt_cpns'];
                        $tgl_sk_cpns22 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns22 = $pp['no_sk_cpns'];
                        $tmt_pns22 = $pp['tmt_pns'];
                        $tgl_sk_pns22 = $pp['tgl_sk_pns'];
                        $no_sk_pns22 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 23) {
                $nip23 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip23) {
                        $nama_pegawai23 = $pp['nama_lengkap'];
                        $tmt_cpns23 = $pp['tmt_cpns'];
                        $tgl_sk_cpns23 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns23 = $pp['no_sk_cpns'];
                        $tmt_pns23 = $pp['tmt_pns'];
                        $tgl_sk_pns23 = $pp['tgl_sk_pns'];
                        $no_sk_pns23 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 24) {
                $nip24 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip24) {
                        $nama_pegawai24 = $pp['nama_lengkap'];
                        $tmt_cpns24 = $pp['tmt_cpns'];
                        $tgl_sk_cpns24 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns24 = $pp['no_sk_cpns'];
                        $tmt_pns24 = $pp['tmt_pns'];
                        $tgl_sk_pns24 = $pp['tgl_sk_pns'];
                        $no_sk_pns24 = $pp['no_sk_pns'];
                    }
                }
            } else if ($a == 25) {
                $nip25 = $duf['nip'];
                foreach ($profile_pegawai as $pp) {
                    if ($pp['nip'] == $nip25) {
                        $nama_pegawai25 = $pp['nama_lengkap'];
                        $tmt_cpns25 = $pp['tmt_cpns'];
                        $tgl_sk_cpns25 = $pp['tgl_sk_cpns'];
                        $no_sk_cpns25 = $pp['no_sk_cpns'];
                        $tmt_pns25 = $pp['tmt_pns'];
                        $tgl_sk_pns25 = $pp['tgl_sk_pns'];
                        $no_sk_pns25 = $pp['no_sk_pns'];
                    }
                }
            }
            $a++;
        }


        $jenis_usulan = null;
        if ($usulan['jenis_usulan'] == "karsu_baru") {
            $jenis_usulan = "Kartu Suami (Karsu)";
        } else if ($usulan['jenis_usulan'] == "karsu_pengganti") {
            $jenis_usulan = "Kartu Suami (Karsu)";
        }


        $jml_data = 0;
        foreach ($detail_usulan as $det) {
            if ($det['kode_usulan'] == $kode_usulan) {
                $jml_data++;
            }
        }

        $bil_jml = get_bilangan($jml_data);

        // simple parsing
        $document->setValue('{tgl_surat}', tgl_indo($usulan['tgl_usulan']));
        $document->setValue('{no_surat}', $usulan['no_surat']);
        $document->setValue('{jenis_usulan}', $jenis_usulan);
        $document->setValue('{jml_diusulkan}', $jml_data);
        $document->setValue('{jml_diusulkan2}', $bil_jml);

        if ($nip1 != null) {
            $document->setValue('{nama_pegawai1}', $nama_pegawai1);
            $document->setValue('{nip1}', $nip1);
            $document->setValue('{tmt_cpns1}', $tmt_cpns1);
            $document->setValue('{tgl_sk_cpns1}', $tgl_sk_cpns1);
            $document->setValue('{no_sk_cpns1}', $no_sk_cpns1);
            $document->setValue('{tmt_pns1}', $tmt_pns1);
            $document->setValue('{tgl_sk_pns1}', $tgl_sk_pns1);
            $document->setValue('{no_sk_pns1}', $no_sk_pns1);
        } else {
            $document->setValue('{nama_pegawai1}', "");
            $document->setValue('{nip1}', "");
            $document->setValue('{tmt_cpns1}', "");
            $document->setValue('{tgl_sk_cpns1}', "");
            $document->setValue('{no_sk_cpns1}', "");
            $document->setValue('{tmt_pns1}', "");
            $document->setValue('{tgl_sk_pns1}', "");
            $document->setValue('{no_sk_pns1}', "");
        }

        if ($nip2 != null) {
            $document->setValue('{nama_pegawai2}', $nama_pegawai2);
            $document->setValue('{nip2}', $nip2);
            $document->setValue('{tmt_cpns2}', $tmt_cpns2);
            $document->setValue('{tgl_sk_cpns2}', $tgl_sk_cpns2);
            $document->setValue('{no_sk_cpns2}', $no_sk_cpns2);
            $document->setValue('{tmt_pns2}', $tmt_pns2);
            $document->setValue('{tgl_sk_pns2}', $tgl_sk_pns2);
            $document->setValue('{no_sk_pns2}', $no_sk_pns2);
        } else {
            $document->setValue('{nama_pegawai2}', "");
            $document->setValue('{nip2}', "");
            $document->setValue('{tmt_cpns2}', "");
            $document->setValue('{tgl_sk_cpns2}', "");
            $document->setValue('{no_sk_cpns2}', "");
            $document->setValue('{tmt_pns2}', "");
            $document->setValue('{tgl_sk_pns2}', "");
            $document->setValue('{no_sk_pns2}', "");
        }

        if ($nip3 != null) {
            $document->setValue('{nama_pegawai3}', $nama_pegawai3);
            $document->setValue('{nip3}', $nip3);
            $document->setValue('{tmt_cpns3}', $tmt_cpns3);
            $document->setValue('{tgl_sk_cpns3}', $tgl_sk_cpns3);
            $document->setValue('{no_sk_cpns3}', $no_sk_cpns3);
            $document->setValue('{tmt_pns3}', $tmt_pns3);
            $document->setValue('{tgl_sk_pns3}', $tgl_sk_pns3);
            $document->setValue('{no_sk_pns3}', $no_sk_pns3);
        } else {
            $document->setValue('{nama_pegawai3}', "");
            $document->setValue('{nip3}', "");
            $document->setValue('{tmt_cpns3}', "");
            $document->setValue('{tgl_sk_cpns3}', "");
            $document->setValue('{no_sk_cpns3}', "");
            $document->setValue('{tmt_pns3}', "");
            $document->setValue('{tgl_sk_pns3}', "");
            $document->setValue('{no_sk_pns3}', "");
        }

        if ($nip4 != null) {
            $document->setValue('{nama_pegawai4}', $nama_pegawai4);
            $document->setValue('{nip4}', $nip4);
            $document->setValue('{tmt_cpns4}', $tmt_cpns4);
            $document->setValue('{tgl_sk_cpns4}', $tgl_sk_cpns4);
            $document->setValue('{no_sk_cpns4}', $no_sk_cpns4);
            $document->setValue('{tmt_pns4}', $tmt_pns4);
            $document->setValue('{tgl_sk_pns4}', $tgl_sk_pns4);
            $document->setValue('{no_sk_pns4}', $no_sk_pns4);
        } else {
            $document->setValue('{nama_pegawai4}', "");
            $document->setValue('{nip4}', "");
            $document->setValue('{tmt_cpns4}', "");
            $document->setValue('{tgl_sk_cpns4}', "");
            $document->setValue('{no_sk_cpns4}', "");
            $document->setValue('{tmt_pns4}', "");
            $document->setValue('{tgl_sk_pns4}', "");
            $document->setValue('{no_sk_pns4}', "");
        }

        if ($nip5 != null) {
            $document->setValue('{nama_pegawai5}', $nama_pegawai5);
            $document->setValue('{nip5}', $nip5);
            $document->setValue('{tmt_cpns5}', $tmt_cpns5);
            $document->setValue('{tgl_sk_cpns5}', $tgl_sk_cpns5);
            $document->setValue('{no_sk_cpns5}', $no_sk_cpns5);
            $document->setValue('{tmt_pns5}', $tmt_pns5);
            $document->setValue('{tgl_sk_pns5}', $tgl_sk_pns5);
            $document->setValue('{no_sk_pns5}', $no_sk_pns5);
        } else {
            $document->setValue('{nama_pegawai5}', "");
            $document->setValue('{nip5}', "");
            $document->setValue('{tmt_cpns5}', "");
            $document->setValue('{tgl_sk_cpns5}', "");
            $document->setValue('{no_sk_cpns5}', "");
            $document->setValue('{tmt_pns5}', "");
            $document->setValue('{tgl_sk_pns5}', "");
            $document->setValue('{no_sk_pns5}', "");
        }

        if ($nip6 != null) {
            $document->setValue('{nama_pegawai6}', $nama_pegawai6);
            $document->setValue('{nip6}', $nip6);
            $document->setValue('{tmt_cpns6}', $tmt_cpns6);
            $document->setValue('{tgl_sk_cpns6}', $tgl_sk_cpns6);
            $document->setValue('{no_sk_cpns6}', $no_sk_cpns6);
            $document->setValue('{tmt_pns6}', $tmt_pns6);
            $document->setValue('{tgl_sk_pns6}', $tgl_sk_pns6);
            $document->setValue('{no_sk_pns6}', $no_sk_pns6);
        } else {
            $document->setValue('{nama_pegawai6}', "");
            $document->setValue('{nip6}', "");
            $document->setValue('{tmt_cpns6}', "");
            $document->setValue('{tgl_sk_cpns6}', "");
            $document->setValue('{no_sk_cpns6}', "");
            $document->setValue('{tmt_pns6}', "");
            $document->setValue('{tgl_sk_pns6}', "");
            $document->setValue('{no_sk_pns6}', "");
        }

        if ($nip7 != null) {
            $document->setValue('{nama_pegawai7}', $nama_pegawai7);
            $document->setValue('{nip7}', $nip7);
            $document->setValue('{tmt_cpns7}', $tmt_cpns7);
            $document->setValue('{tgl_sk_cpns7}', $tgl_sk_cpns7);
            $document->setValue('{no_sk_cpns7}', $no_sk_cpns7);
            $document->setValue('{tmt_pns7}', $tmt_pns7);
            $document->setValue('{tgl_sk_pns7}', $tgl_sk_pns7);
            $document->setValue('{no_sk_pns7}', $no_sk_pns7);
        } else {
            $document->setValue('{nama_pegawai7}', "");
            $document->setValue('{nip7}', "");
            $document->setValue('{tmt_cpns7}', "");
            $document->setValue('{tgl_sk_cpns7}', "");
            $document->setValue('{no_sk_cpns7}', "");
            $document->setValue('{tmt_pns7}', "");
            $document->setValue('{tgl_sk_pns7}', "");
            $document->setValue('{no_sk_pns7}', "");
        }

        if ($nip8 != null) {
            $document->setValue('{nama_pegawai8}', $nama_pegawai8);
            $document->setValue('{nip8}', $nip8);
            $document->setValue('{tmt_cpns8}', $tmt_cpns8);
            $document->setValue('{tgl_sk_cpns8}', $tgl_sk_cpns8);
            $document->setValue('{no_sk_cpns8}', $no_sk_cpns8);
            $document->setValue('{tmt_pns8}', $tmt_pns8);
            $document->setValue('{tgl_sk_pns8}', $tgl_sk_pns8);
            $document->setValue('{no_sk_pns8}', $no_sk_pns8);
        } else {
            $document->setValue('{nama_pegawai8}', "");
            $document->setValue('{nip8}', "");
            $document->setValue('{tmt_cpns8}', "");
            $document->setValue('{tgl_sk_cpns8}', "");
            $document->setValue('{no_sk_cpns8}', "");
            $document->setValue('{tmt_pns8}', "");
            $document->setValue('{tgl_sk_pns8}', "");
            $document->setValue('{no_sk_pns8}', "");
        }

        if ($nip9 != null) {
            $document->setValue('{nama_pegawai9}', $nama_pegawai9);
            $document->setValue('{nip9}', $nip9);
            $document->setValue('{tmt_cpns9}', $tmt_cpns9);
            $document->setValue('{tgl_sk_cpns9}', $tgl_sk_cpns9);
            $document->setValue('{no_sk_cpns9}', $no_sk_cpns9);
            $document->setValue('{tmt_pns9}', $tmt_pns9);
            $document->setValue('{tgl_sk_pns9}', $tgl_sk_pns9);
            $document->setValue('{no_sk_pns9}', $no_sk_pns9);
        } else {
            $document->setValue('{nama_pegawai9}', "");
            $document->setValue('{nip9}', "");
            $document->setValue('{tmt_cpns9}', "");
            $document->setValue('{tgl_sk_cpns9}', "");
            $document->setValue('{no_sk_cpns9}', "");
            $document->setValue('{tmt_pns9}', "");
            $document->setValue('{tgl_sk_pns9}', "");
            $document->setValue('{no_sk_pns9}', "");
        }

        if ($nip10 != null) {
            $document->setValue('{nama_pegawai10}', $nama_pegawai10);
            $document->setValue('{nip10}', $nip10);
            $document->setValue('{tmt_cpns10}', $tmt_cpns10);
            $document->setValue('{tgl_sk_cpns10}', $tgl_sk_cpns10);
            $document->setValue('{no_sk_cpns10}', $no_sk_cpns10);
            $document->setValue('{tmt_pns10}', $tmt_pns10);
            $document->setValue('{tgl_sk_pns10}', $tgl_sk_pns10);
            $document->setValue('{no_sk_pns10}', $no_sk_pns10);
        } else {
            $document->setValue('{nama_pegawai10}', "");
            $document->setValue('{nip10}', "");
            $document->setValue('{tmt_cpns10}', "");
            $document->setValue('{tgl_sk_cpns10}', "");
            $document->setValue('{no_sk_cpns10}', "");
            $document->setValue('{tmt_pns10}', "");
            $document->setValue('{tgl_sk_pns10}', "");
            $document->setValue('{no_sk_pns10}', "");
        }

        if ($nip11 != null) {
            $document->setValue('{nama_pegawai11}', $nama_pegawai11);
            $document->setValue('{nip11}', $nip11);
            $document->setValue('{tmt_cpns11}', $tmt_cpns11);
            $document->setValue('{tgl_sk_cpns11}', $tgl_sk_cpns11);
            $document->setValue('{no_sk_cpns11}', $no_sk_cpns11);
            $document->setValue('{tmt_pns11}', $tmt_pns11);
            $document->setValue('{tgl_sk_pns11}', $tgl_sk_pns11);
            $document->setValue('{no_sk_pns11}', $no_sk_pns11);
        } else {
            $document->setValue('{nama_pegawai11}', "");
            $document->setValue('{nip11}', "");
            $document->setValue('{tmt_cpns11}', "");
            $document->setValue('{tgl_sk_cpns11}', "");
            $document->setValue('{no_sk_cpns11}', "");
            $document->setValue('{tmt_pns11}', "");
            $document->setValue('{tgl_sk_pns11}', "");
            $document->setValue('{no_sk_pns11}', "");
        }

        if ($nip12 != null) {
            $document->setValue('{nama_pegawai12}', $nama_pegawai12);
            $document->setValue('{nip12}', $nip12);
            $document->setValue('{tmt_cpns12}', "$tmt_cpns12");
            $document->setValue('{tgl_sk_cpns12}', $tgl_sk_cpns12);
            $document->setValue('{no_sk_cpns12}', $no_sk_cpns12);
            $document->setValue('{tmt_pns12}', $tmt_pns12);
            $document->setValue('{tgl_sk_pns12}', $tgl_sk_pns12);
            $document->setValue('{no_sk_pns12}', $no_sk_pns12);
        } else {
            $document->setValue('{nama_pegawai12}', "");
            $document->setValue('{nip12}', "");
            $document->setValue('{tmt_cpns12}', "");
            $document->setValue('{tgl_sk_cpns12}', "");
            $document->setValue('{no_sk_cpns12}', "");
            $document->setValue('{tmt_pns12}', "");
            $document->setValue('{tgl_sk_pns12}', "");
            $document->setValue('{no_sk_pns12}', "");
        }

        if ($nip13 != null) {
            $document->setValue('{nama_pegawai13}', $nama_pegawai13);
            $document->setValue('{nip13}', $nip13);
            $document->setValue('{tmt_cpns13}', $tmt_cpns13);
            $document->setValue('{tgl_sk_cpns13}', $tgl_sk_cpns13);
            $document->setValue('{no_sk_cpns13}', $no_sk_cpns13);
            $document->setValue('{tmt_pns13}', $tmt_pns13);
            $document->setValue('{tgl_sk_pns13}', $tgl_sk_pns13);
            $document->setValue('{no_sk_pns13}', $no_sk_pns13);
        } else {
            $document->setValue('{nama_pegawai13}', "");
            $document->setValue('{nip13}', "");
            $document->setValue('{tmt_cpns13}', "");
            $document->setValue('{tgl_sk_cpns13}', "");
            $document->setValue('{no_sk_cpns13}', "");
            $document->setValue('{tmt_pns13}', "");
            $document->setValue('{tgl_sk_pns13}', "");
            $document->setValue('{no_sk_pns13}', "");
        }

        if ($nip14 != null) {
            $document->setValue('{nama_pegawai14}', $nama_pegawai14);
            $document->setValue('{nip14}', $nip14);
            $document->setValue('{tmt_cpns14}', $tmt_cpns14);
            $document->setValue('{tgl_sk_cpns14}', $tgl_sk_cpns14);
            $document->setValue('{no_sk_cpns14}', $no_sk_cpns14);
            $document->setValue('{tmt_pns14}', $tmt_pns14);
            $document->setValue('{tgl_sk_pns14}', $tgl_sk_pns14);
            $document->setValue('{no_sk_pns14}', $no_sk_pns14);
        } else {
            $document->setValue('{nama_pegawai14}', "");
            $document->setValue('{nip14}', "");
            $document->setValue('{tmt_cpns14}', "");
            $document->setValue('{tgl_sk_cpns14}', "");
            $document->setValue('{no_sk_cpns14}', "");
            $document->setValue('{tmt_pns14}', "");
            $document->setValue('{tgl_sk_pns14}', "");
            $document->setValue('{no_sk_pns14}', "");
        }

        if ($nip15 != null) {
            $document->setValue('{nama_pegawai15}', $nama_pegawai15);
            $document->setValue('{nip15}', $nip15);
            $document->setValue('{tmt_cpns15}', $tmt_cpns15);
            $document->setValue('{tgl_sk_cpns15}', $tgl_sk_cpns15);
            $document->setValue('{no_sk_cpns15}', $no_sk_cpns15);
            $document->setValue('{tmt_pns15}', $tmt_pns15);
            $document->setValue('{tgl_sk_pns15}', $tgl_sk_pns15);
            $document->setValue('{no_sk_pns15}', $no_sk_pns15);
        } else {
            $document->setValue('{nama_pegawai15}', "");
            $document->setValue('{nip15}', "");
            $document->setValue('{tmt_cpns15}', "");
            $document->setValue('{tgl_sk_cpns15}', "");
            $document->setValue('{no_sk_cpns15}', "");
            $document->setValue('{tmt_pns15}', "");
            $document->setValue('{tgl_sk_pns15}', "");
            $document->setValue('{no_sk_pns15}', "");
        }

        if ($nip16 != null) {
            $document->setValue('{nama_pegawai16}', $nama_pegawai16);
            $document->setValue('{nip16}', $nip16);
            $document->setValue('{tmt_cpns16}', $tmt_cpns16);
            $document->setValue('{tgl_sk_cpns16}', $tgl_sk_cpns16);
            $document->setValue('{no_sk_cpns16}', $no_sk_cpns16);
            $document->setValue('{tmt_pns16}', $tmt_pns16);
            $document->setValue('{tgl_sk_pns16}', $tgl_sk_pns16);
            $document->setValue('{no_sk_pns16}', $no_sk_pns16);
        } else {
            $document->setValue('{nama_pegawai16}', "");
            $document->setValue('{nip16}', "");
            $document->setValue('{tmt_cpns16}', "");
            $document->setValue('{tgl_sk_cpns16}', "");
            $document->setValue('{no_sk_cpns16}', "");
            $document->setValue('{tmt_pns16}', "");
            $document->setValue('{tgl_sk_pns16}', "");
            $document->setValue('{no_sk_pns16}', "");
        }

        if ($nip17 != null) {
            $document->setValue('{nama_pegawai17}', $nama_pegawai17);
            $document->setValue('{nip17}', $nip17);
            $document->setValue('{tmt_cpns17}', $tmt_cpns17);
            $document->setValue('{tgl_sk_cpns17}', $tgl_sk_cpns17);
            $document->setValue('{no_sk_cpns17}', $no_sk_cpns17);
            $document->setValue('{tmt_pns17}', $tmt_pns17);
            $document->setValue('{tgl_sk_pns17}', $tgl_sk_pns17);
            $document->setValue('{no_sk_pns17}', $no_sk_pns17);
        } else {
            $document->setValue('{nama_pegawai17}', "");
            $document->setValue('{nip17}', "");
            $document->setValue('{tmt_cpns17}', "");
            $document->setValue('{tgl_sk_cpns17}', "");
            $document->setValue('{no_sk_cpns17}', "");
            $document->setValue('{tmt_pns17}', "");
            $document->setValue('{tgl_sk_pns17}', "");
            $document->setValue('{no_sk_pns17}', "");
        }

        if ($nip18 != null) {
            $document->setValue('{nama_pegawai18}', $nama_pegawai18);
            $document->setValue('{nip18}', $nip18);
            $document->setValue('{tmt_cpns18}', $tmt_cpns18);
            $document->setValue('{tgl_sk_cpns18}', $tgl_sk_cpns18);
            $document->setValue('{no_sk_cpns18}', $no_sk_cpns18);
            $document->setValue('{tmt_pns18}', $tmt_pns18);
            $document->setValue('{tgl_sk_pns18}', $tgl_sk_pns18);
            $document->setValue('{no_sk_pns18}', $no_sk_pns18);
        } else {
            $document->setValue('{nama_pegawai18}', "");
            $document->setValue('{nip18}', "");
            $document->setValue('{tmt_cpns18}', "");
            $document->setValue('{tgl_sk_cpns18}', "");
            $document->setValue('{no_sk_cpns18}', "");
            $document->setValue('{tmt_pns18}', "");
            $document->setValue('{tgl_sk_pns18}', "");
            $document->setValue('{no_sk_pns18}', "");
        }

        if ($nip19 != null) {
            $document->setValue('{nama_pegawai19}', $nama_pegawai19);
            $document->setValue('{nip19}', $nip19);
            $document->setValue('{tmt_cpns19}', $tmt_cpns19);
            $document->setValue('{tgl_sk_cpns19}', $tgl_sk_cpns19);
            $document->setValue('{no_sk_cpns19}', $no_sk_cpns19);
            $document->setValue('{tmt_pns19}', $tmt_pns19);
            $document->setValue('{tgl_sk_pns19}', $tgl_sk_pns19);
            $document->setValue('{no_sk_pns19}', $no_sk_pns19);
        } else {
            $document->setValue('{nama_pegawai19}', "");
            $document->setValue('{nip19}', "");
            $document->setValue('{tmt_cpns19}', "");
            $document->setValue('{tgl_sk_cpns19}', "");
            $document->setValue('{no_sk_cpns19}', "");
            $document->setValue('{tmt_pns19}', "");
            $document->setValue('{tgl_sk_pns19}', "");
            $document->setValue('{no_sk_pns19}', "");
        }

        if ($nip20 != null) {
            $document->setValue('{nama_pegawai20}', $nama_pegawai20);
            $document->setValue('{nip20}', $nip20);
            $document->setValue('{tmt_cpns20}', $tmt_cpns20);
            $document->setValue('{tgl_sk_cpns20}', $tgl_sk_cpns20);
            $document->setValue('{no_sk_cpns20}', $no_sk_cpns20);
            $document->setValue('{tmt_pns20}', $tmt_pns20);
            $document->setValue('{tgl_sk_pns20}', $tgl_sk_pns20);
            $document->setValue('{no_sk_pns20}', $no_sk_pns20);
        } else {
            $document->setValue('{nama_pegawai20}', "");
            $document->setValue('{nip20}', "");
            $document->setValue('{tmt_cpns20}', "");
            $document->setValue('{tgl_sk_cpns20}', "");
            $document->setValue('{no_sk_cpns20}', "");
            $document->setValue('{tmt_pns20}', "");
            $document->setValue('{tgl_sk_pns20}', "");
            $document->setValue('{no_sk_pns20}', "");
        }

        if ($nip21 != null) {
            $document->setValue('{nama_pegawai21}', $nama_pegawai21);
            $document->setValue('{nip21}', $nip21);
            $document->setValue('{tmt_cpns21}', $tmt_cpns21);
            $document->setValue('{tgl_sk_cpns21}', $tgl_sk_cpns21);
            $document->setValue('{no_sk_cpns21}', $no_sk_cpns21);
            $document->setValue('{tmt_pns21}', $tmt_pns21);
            $document->setValue('{tgl_sk_pns21}', $tgl_sk_pns21);
            $document->setValue('{no_sk_pns21}', $no_sk_pns21);
        } else {
            $document->setValue('{nama_pegawai21}', "");
            $document->setValue('{nip21}', "");
            $document->setValue('{tmt_cpns21}', "");
            $document->setValue('{tgl_sk_cpns21}', "");
            $document->setValue('{no_sk_cpns21}', "");
            $document->setValue('{tmt_pns21}', "");
            $document->setValue('{tgl_sk_pns21}', "");
            $document->setValue('{no_sk_pns21}', "");
        }

        if ($nip22 != null) {
            $document->setValue('{nama_pegawai22}', $nama_pegawai22);
            $document->setValue('{nip22}', $nip22);
            $document->setValue('{tmt_cpns22}', $tmt_cpns22);
            $document->setValue('{tgl_sk_cpns22}', $tgl_sk_cpns22);
            $document->setValue('{no_sk_cpns22}', $no_sk_cpns22);
            $document->setValue('{tmt_pns22}', $tmt_pns22);
            $document->setValue('{tgl_sk_pns22}', $tgl_sk_pns22);
            $document->setValue('{no_sk_pns22}', $no_sk_pns22);
        } else {
            $document->setValue('{nama_pegawai22}', "");
            $document->setValue('{nip22}', "");
            $document->setValue('{tmt_cpns22}', "");
            $document->setValue('{tgl_sk_cpns22}', "");
            $document->setValue('{no_sk_cpns22}', "");
            $document->setValue('{tmt_pns22}', "");
            $document->setValue('{tgl_sk_pns22}', "");
            $document->setValue('{no_sk_pns22}', "");
        }

        if ($nip23 != null) {
            $document->setValue('{nama_pegawai23}', $nama_pegawai23);
            $document->setValue('{nip23}', $nip23);
            $document->setValue('{tmt_cpns23}', $tmt_cpns23);
            $document->setValue('{tgl_sk_cpns23}', $tgl_sk_cpns23);
            $document->setValue('{no_sk_cpns23}', $no_sk_cpns23);
            $document->setValue('{tmt_pns23}', $tmt_pns23);
            $document->setValue('{tgl_sk_pns23}', $tgl_sk_pns23);
            $document->setValue('{no_sk_pns23}', $no_sk_pns23);
        } else {
            $document->setValue('{nama_pegawai23}', "");
            $document->setValue('{nip23}', "");
            $document->setValue('{tmt_cpns23}', "");
            $document->setValue('{tgl_sk_cpns23}', "");
            $document->setValue('{no_sk_cpns23}', "");
            $document->setValue('{tmt_pns23}', "");
            $document->setValue('{tgl_sk_pns23}', "");
            $document->setValue('{no_sk_pns23}', "");
        }

        if ($nip24 != null) {
            $document->setValue('{nama_pegawai24}', $nama_pegawai24);
            $document->setValue('{nip24}', $nip24);
            $document->setValue('{tmt_cpns24}', $tmt_cpns24);
            $document->setValue('{tgl_sk_cpns24}', $tgl_sk_cpns24);
            $document->setValue('{no_sk_cpns24}', $no_sk_cpns24);
            $document->setValue('{tmt_pns24}', $tmt_pns24);
            $document->setValue('{tgl_sk_pns24}', $tgl_sk_pns24);
            $document->setValue('{no_sk_pns24}', $no_sk_pns24);
        } else {
            $document->setValue('{nama_pegawai24}', "");
            $document->setValue('{nip24}', "");
            $document->setValue('{tmt_cpns24}', "");
            $document->setValue('{tgl_sk_cpns24}', "");
            $document->setValue('{no_sk_cpns24}', "");
            $document->setValue('{tmt_pns24}', "");
            $document->setValue('{tgl_sk_pns24}', "");
            $document->setValue('{no_sk_pns24}', "");
        }

        if ($nip25 != null) {
            $document->setValue('{nama_pegawai25}', $nama_pegawai25);
            $document->setValue('{nip25}', $nip25);
            $document->setValue('{tmt_cpns25}', $tmt_cpns25);
            $document->setValue('{tgl_sk_cpns25}', $tgl_sk_cpns25);
            $document->setValue('{no_sk_cpns25}', $no_sk_cpns25);
            $document->setValue('{tmt_pns25}', $tmt_pns25);
            $document->setValue('{tgl_sk_pns25}', $tgl_sk_pns25);
            $document->setValue('{no_sk_pns25}', $no_sk_pns25);
        } else {
            $document->setValue('{nama_pegawai25}', "");
            $document->setValue('{nip25}', "");
            $document->setValue('{tmt_cpns25}', "");
            $document->setValue('{tgl_sk_cpns25}', "");
            $document->setValue('{no_sk_cpns25}', "");
            $document->setValue('{tmt_pns25}', "");
            $document->setValue('{tgl_sk_pns25}', "");
            $document->setValue('{no_sk_pns25}', "");
        }

        $kode_usulan = $kode_usulan;

        // save file
        $tmp_file = FCPATH . 'assets/phpword/surat_usulan_karsu_' . $kode_usulan . '.docx';
        $filename = 'Surat-Usulan-Karsu-' . $kode_usulan . '.docx';
        $document->save($tmp_file);
        // print('berhasil');

        header("Content-Disposition: attachment; filename=$filename");
        readfile($tmp_file); // or echo file_get_contents($temp_file);
        //unlink($tmp_file);
        // print('berhasil');
    }
}
