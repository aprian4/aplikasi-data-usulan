<?= $this->session->unset_userdata('message'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="col-12 col-sm-12 col-lg-12">
                <div>
                    <a href="<?= base_url('idcard/home'); ?>">
                        <i class="fas fa-arrow-circle-left fa-sm"></i> Kembali</a>
                </div><br>
                <div class="card author-box card-light">
                    <div class="card-header">
                        <center>
                            <h4><?= "Detail Usulan " . $title; ?></h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <table style="width: 100%;">
                            <tr>
                                <th style="width: 13%;">Kode Usulan</th>
                                <td> : <?= $usulan['kode_usulan']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 13%;">Nomor Surat</th>
                                <td> : <?= $usulan['no_surat']; ?></td>
                            </tr>
                            <tr>
                                <th style="width: 13%;">Tanggal Usulan</th>
                                <td> : <?= $usulan['tgl_usulan']; ?></td>
                            </tr>
                            <tr>
                                <th style=" width: 13%;">Junis Usulan</th>
                                <td> :
                                    <?php if ($usulan['jenis_usulan'] == 'idcard_baru') {
                                        echo "Kartu Tanda Pengenal Baru";
                                    } else {
                                        echo "Kartu Tanda Pengenal Pengganti";
                                    }  ?>
                                </td>
                            </tr>
                        </table>

                        <br>
                        <?= $this->session->flashdata('upload'); ?>
                        <div class="card mb-3 col-lg-12">
                            <table id="table-riwayat_idcard" style="font-size: 13px;" class="table table-striped dt-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">OPD</th>
                                        <?php if ($usulan['status_usulan'] == 3) { ?>
                                            <th scope="col">No_Kartu</th>
                                            <th scope="col">No_Keputusan</th>
                                            <th scope="col">Tgl_Terbit</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">posisi</th>
                                        <?php } ?>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php if ($detail_usulan != null) { ?>
                                        <?php foreach ($detail_usulan as $lu) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $lu['nip']; ?></td>
                                                <?php foreach ($profile_pegawai as $pp) : ?>
                                                    <?php if ($pp['nip'] == $lu['nip']) : ?>
                                                        <td><?= ucwords(strtolower($pp['nama'])); ?></td>
                                                        <td><?= ucwords(strtolower($pp['opd'])); ?></td>
                                                    <?php endif ?>
                                                <?php endforeach; ?>

                                                <?php if ($usulan['status_usulan'] == 3) { ?>
                                                    <td>
                                                        <?= ($lu['no_kartu'] != null) ? $lu['no_kartu'] : ""; ?>
                                                    </td>
                                                    <td>
                                                        <?= ($lu['no_keputusan'] != null) ? $lu['no_keputusan'] : ""; ?>
                                                    </td>
                                                    <td>
                                                        <?= ($lu['tgl_terbit'] != null) ? $lu['tgl_terbit'] : ""; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($lu['status_kartu'] != null) {
                                                            if ($lu['status_kartu'] == 1) {
                                                                echo "Diterima";
                                                            } else if ($lu['status_kartu'] == 2) {
                                                                echo "Ditolak";
                                                            }
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($lu['posisi'] != null) {
                                                            if ($lu['posisi'] == 1) {
                                                                echo "BKPP";
                                                            } else if ($lu['posisi'] == 2) {
                                                                echo "Sudah Diambil";
                                                            }
                                                        } ?>
                                                    </td>
                                                <?php } ?>

                                                <td>
                                                    <?php if ($usulan['status_usulan'] == 2) { ?>
                                                        <a style="color:#fff" class="lihat btn btn-primary btn-sm" href="<?= base_url('idcard/riwayat_berkas/' . $lu['nip'] . '/' . $usulan['id'] . '/' . $usulan['jenis_usulan']); ?>" role="button"><i class="fas fa-file"></i> Berkas</a>
                                                    <?php } else { ?>
                                                        <div class="dropdown show">
                                                            <a style="font-size: 14px;" class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-dataIdcard<?= $i ?>"><i class="fas fa-edit fa-sm"></i> Data Idcard</a></button>
                                                                <div class="dropdown-divider"></div>
                                                                <?php if ($lu['status_kartu'] != null) {
                                                                    if ($lu['status_kartu'] == 1) { ?>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-kirimNotifikasi<?= $i ?>"><i class="fas fa-envelope-square"></i> Kirim Notifikasi</a></button>
                                                                        <div class="dropdown-divider"></div>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-tandaTerima<?= $i ?>"><i class="fas fa-clipboard-check"></i> Tanda Terima</a></button>
                                                                        <div class="dropdown-divider"></div>
                                                                <?php }
                                                                } ?>
                                                                <a class="dropdown-item" href="<?= base_url('idcard/riwayat_berkas/' . $lu['nip'] . '/' . $usulan['id'] . '/' . $usulan['jenis_usulan']); ?>"><i class="fas fa-file"></i> Berkas</a>
                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <form method="POST" action="<?= base_url('idcard/crud_riwayat/kirimnotifikasi'); ?>">
                                                            <div class="modal fade" id="modal-kirimNotifikasi<?= $i ?>" tabindex="-1" aria-labelledby="kirimNotifikasiModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content col-sm-12">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-center" id="kirimNotifikasiModalLabel">Apakah anda yakin akan mengirimkan notifikasi?</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <input type='text' name='nip' value="<?= $lu['nip']; ?>" hidden>
                                                                        <input type="text" name="id_usulan" value="<?= $usulan['id']; ?>" hidden>
                                                                        <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary">Ya</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <!-- Modal -->
                                                        <form method="POST" action="<?= base_url('idcard/crud_riwayat/dataidcard'); ?>" enctype='multipart/form-data'>
                                                            <div class="modal fade" id="modal-dataIdcard<?= $i ?>" tabindex="-1" aria-labelledby="dataIdcardModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content col-sm-12">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-center" id="dataIdcardModalLabel">Data Kartu Tanda Pengenal</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div id="statusIdcard">
                                                                                <label>Status Kartu Tanda Pengenal</label><br>
                                                                                <input type="radio" id="status_kartu1" name="status_kartu" value="1" <?= ($lu['status_kartu'] == 1) ? "checked" : ""; ?>> Disetujui</input><br>
                                                                                <input type="radio" id="status_kartu2" name="status_kartu" value="2" <?= ($lu['status_kartu'] == 2) ? "checked" : ""; ?>> Ditolak</input>
                                                                                <input type="text" name="id_usulan" value="<?= $usulan['id']; ?>" hidden>
                                                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                                                <input type="text" name="kode_usulan" value="<?= $usulan['kode_usulan']; ?>" hidden>
                                                                                <input type='text' name='nip' value="<?= $lu['nip']; ?>" hidden>
                                                                                <div class="dropdown-divider"></div><br>
                                                                            </div>
                                                                            <div id="formDisetujui">
                                                                                <label>Scan Kartu Tanda Pengenal (Format file .pdf | max. 2MB)</label><br>
                                                                                <?php $path_berkas = null; ?>
                                                                                <?php foreach ($berkas as $bks) {
                                                                                    $nama_berkas = "SCAN_IDCARD_" . $lu['nip'];
                                                                                    if ($bks['nama_berkas'] == $nama_berkas) {
                                                                                        $path_berkas = $bks['path'];
                                                                                        $id_berkas = $bks['id'];
                                                                                    }
                                                                                } ?>
                                                                                <?php if ($path_berkas != null) { ?>
                                                                                    <br>
                                                                                    <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($path_berkas); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                                                                    <a style="color:#fff" class="lihat btn btn-danger btn-sm" href="<?= base_url('idcard/hapus_berkas_idcard/' . $id_berkas . '/' . $usulan['id']); ?>" role="button"><i class="fas fa-times-circle"></i> Batal</a>
                                                                                <?php } else { ?>
                                                                                    <input type='file' name='file'>
                                                                                <?php } ?>
                                                                                <br><br>
                                                                                <label>Nomor Kartu Tanda Pengenal</label>
                                                                                <input type="text" class="form-control" name="no_kartu" value="<?= ($lu['no_kartu'] != null) ? $lu['no_kartu'] : ""; ?>"><br>
                                                                                <label>Nomor Keputusan</label>
                                                                                <input type="text" class="form-control" name="no_keputusan" value="<?= ($lu['no_keputusan'] != null) ? $lu['no_keputusan'] : ""; ?>"><br>
                                                                                <label>Tanggal Terbit</label>
                                                                                <input type="<?= ($lu['tgl_terbit'] != null) ? "text" : "date"; ?>" class="form-control" name="tgl_terbit" value="<?= ($lu['tgl_terbit'] != null) ? $lu['tgl_terbit'] : ""; ?>">
                                                                            </div>
                                                                            <div id="formDitolak">
                                                                                <label>Keterangan</label>
                                                                                <input type="text" class="form-control" name="keterangan" value="<?= ($lu['keterangan'] != null) ? $lu['keterangan'] : ""; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <!-- Modal -->
                                                        <form method="POST" action="<?= base_url('idcard/crud_tandaterima'); ?>" enctype='multipart/form-data'>
                                                            <div class="modal fade" id="modal-tandaTerima<?= $i ?>" tabindex="-1" aria-labelledby="tandaTerima3ModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content col-sm-10">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-center" id="tandaTerima3ModalLabel">Tanda Terima</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body"></div>
                                                                        <div>
                                                                            <input type="text" name="id_usulan" value="<?= $usulan['id']; ?>" hidden>
                                                                            <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                                            <input type="text" name="kode_usulan" value="<?= $usulan['kode_usulan']; ?>" hidden>
                                                                            <input type='text' name='nip' value="<?= $lu['nip']; ?>" hidden>
                                                                            <label>Scan Tanda Terima (Format file .pdf | max. 2MB)</label>

                                                                            <?php $path_berkas = null; ?>
                                                                            <?php foreach ($berkas as $bks) {
                                                                                $nama_berkas = "TANDA_TERIMA_" . $lu['nip'];

                                                                                if ($bks['nama_berkas'] == $nama_berkas) {
                                                                                    $path_berkas = $bks['path'];
                                                                                    $id_berkas = $bks['id'];
                                                                                }
                                                                            } ?>
                                                                            <?php if ($path_berkas != null) { ?>
                                                                                <br>
                                                                                <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($path_berkas); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                                                                <a style="color:#fff" class="lihat btn btn-danger btn-sm" href="<?= base_url('idcard/hapus_berkas_idcard/' . $id_berkas . '/' . $usulan['id']); ?>" role="button"><i class="fas fa-times-circle"></i> Batal</a>
                                                                                <br><br>
                                                                            <?php } else { ?>
                                                                                <input type='file' name='file' required><br><br>
                                                                            <?php } ?>
                                                                            <label>Diambil Oleh</label>
                                                                            <input type="text" class="form-control" name="diambil_oleh" value="<?= ($lu['diambil_oleh'] != null) ? $lu['diambil_oleh'] : ""; ?>" required><br>
                                                                            <label>Tanggal Diambil</label>
                                                                            <input type="<?= ($lu['tgl_diambil'] != null) ? "text" : "date"; ?>" class="form-control" name="tgl_diambil" value="<?= ($lu['tgl_diambil'] != null) ? $lu['tgl_diambil'] : ""; ?>" required><br>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php } else {  ?>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Tidak Ada Data</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>