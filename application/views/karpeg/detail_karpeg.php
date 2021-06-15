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
                    <a href="<?= base_url('karpeg/home'); ?>">
                        <i class="fas fa-arrow-circle-left fa-sm"></i> Kembali</a>
                </div><br>
                <div class="card author-box card-light">
                    <div class="card-header">
                        <center>
                            <h4><?= "Detail Usulan " . $title; ?></h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <div><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubahdataModal"><i class="fas fa-edit"> Ubah Usulan</i></button></div>
                        <br>
                        <!-- Modal -->
                        <form id="form-edit_usulan_karpeg_baru">
                            <div class="modal fade" id="ubahdataModal" tabindex="-1" aria-labelledby="ubahdataModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahdataModalLabel">Ubah Usulan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <label>Nomor Surat</label>
                                            <input type="text" class="form-control" name="no_surat" value="<?= ($usulan['no_surat']) ? $usulan['no_surat'] : ''; ?>" required>
                                        </div>

                                        <div class="modal-body">
                                            <label>Tanggal Usulan</label>
                                            <input type="date" class="form-control" name="tgl_usulan" value="<?= ($usulan['tgl_usulan']) ? $usulan['tgl_usulan'] : ''; ?>" required>
                                        </div>

                                        <div class="modal-body">
                                            <label>Jenis Usulan</label>
                                            <input type="text" name="id_usulan" value="<?= $usulan['id']; ?>" hidden>
                                            <select class="custom-select" name='jenis_usulan' required>
                                                <option <?php if ($usulan['jenis_usulan'] == 'karpeg_baru') {
                                                            echo "selected='selected'";
                                                        } ?> value="karpeg_baru">Pembuatan Kartu Pegawai (Karpeg)</option>
                                                <option <?php if ($usulan['jenis_usulan'] == 'karpeg_pengganti') {
                                                            echo "selected='selected'";
                                                        } ?> value="karpeg_pengganti">Pembuatan Kartu Pegawai (Karpeg) Pengganti Karena Hilang</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

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
                                    <?php if ($usulan['jenis_usulan'] == 'karpeg_baru') {
                                        echo "Kartu Pegawai Baru";
                                    } else {
                                        echo "Kartu Pegawai Pengganti";
                                    }  ?>
                                </td>
                            </tr>
                        </table>

                        <br>
                        <div class=" mb-3" align="right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdataModal"><i class="fas fa-user-plus"> Tambah Pegawai</i></button>
                            <a href="<?= base_url('download/surat_usulan_karpeg/' . $usulan['kode_usulan']); ?>" class="btn btn-warning"><i class="fas fa-download"> Surat Usulan</i></a>
                        </div>

                        <?= $this->session->flashdata('usulan'); ?>
                        <!-- Modal -->
                        <form id="form-tambah_pegawai_karpeg">
                            <div class="modal fade" id="tambahdataModal" tabindex="-1" aria-labelledby="tambahdataModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahdataModalLabel">Tambah Pegawai</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="container">

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div>
                                                            <input type="text" name="kode_usulan" value="<?= $usulan['kode_usulan']; ?>" hidden>
                                                            <select name="nip" class="selectpicker form-control" data-live-search="true" required>
                                                                <?php if ($pegawai != null) : ?>
                                                                    <option value="">Pilih Pegawai</option>
                                                                    <?php foreach ($pegawai as $p) : ?>
                                                                        <option value="<?= $p['nip']; ?>"><?= $p['nip']; ?> - <?= ucwords(strtolower($p['nama'])); ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php else : ?>
                                                                    <option value=""><?= "Untuk Menampilkan Data, Harus Terhubung Internet" ?></option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <style>
                                                .dropdown-menu.show {
                                                    width: 50px !important;
                                                }
                                            </style>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="card mb-3 col-lg-12">
                            <table id="table-detail_karpeg" style="font-size: 15px;" class="table table-striped dt-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">OPD</th>
                                        <th scope="col">Status_Berkas</th>
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
                                                <td>
                                                    <?php
                                                    if ($lu['status_berkas'] == 1) : ?>
                                                        <span class="badge badge-success">Lengkap</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-danger">Tidak Lengkap</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <!-- Example single danger button -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#lengkapi-data<?= $i ?>"><i class="fas fa-user-edit fa-sm"></i> Lengkapi Data</button>
                                                            <div class="dropdown-divider"></div>
                                                            <form action="<?= base_url('karpeg/upload_berkas/' . $lu['nip']); ?>" method="post">
                                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                                <input type="text" name="id_usulan" value="<?= $usulan['id']; ?>" hidden>
                                                                <button type="submit" class="dropdown-item"><i class="fas fa-upload fa-sm"></i> Upload Berkas</button>
                                                            </form>
                                                            <div class="dropdown-divider"></div>
                                                            <form action="<?= base_url('karpeg/crud_usulan_detail_karpeg/hapus/' . $lu['nip']); ?>" method="post">
                                                                <input type="text" name="kode_usulan" value="<?= $usulan['kode_usulan']; ?>" hidden>
                                                                <input type="text" name="id_usulan" value="<?= $usulan['id']; ?>" hidden>
                                                                <button type="submit" class="dropdown-item"><i class="fas fa-trash fa-sm"></i> Hapus</button>
                                                            </form>

                                                        </div>

                                                        <!-- Modal -->
                                                        <form method="POST" action="<?= base_url('karpeg/crud_usulan_detail_karpeg/lengkapidata/' . $lu['nip']); ?>">
                                                            <div class="modal fade" id="lengkapi-data<?= $i ?>" tabindex="-1" aria-labelledby="lengkapi-dataLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="lengkapi-dataLabel">Lengkapi Data Pegawai</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <input type="text" name="id_usulan" value="<?= $usulan['id']; ?>" hidden>
                                                                            <?php foreach ($profile_pegawai as $pp) : ?>
                                                                                <?php if ($pp['nip'] == $lu['nip']) : ?>
                                                                                    <label>TMT CPNS</label>
                                                                                    <input type="<?= ($pp['tmt_cpns'] != null) ? "text" : "date"; ?>" class="form-control" name="tmt_cpns" value="<?= ($pp['tmt_cpns'] != null) ? $pp['tmt_cpns'] : ""; ?>" required>
                                                                                    <label>Tanggal SK CPNS</label>
                                                                                    <input type="<?= ($pp['tgl_sk_cpns'] != null) ? "text" : "date"; ?>" class="form-control" name="tgl_sk_cpns" value="<?= ($pp['tgl_sk_cpns'] != null) ? $pp['tgl_sk_cpns'] : ""; ?>" required>
                                                                                    <label>Nomor SK CPNS</label>
                                                                                    <input type="text" class="form-control" name="no_sk_cpns" value="<?= ($pp['no_sk_cpns'] != null) ? $pp['no_sk_cpns'] : ""; ?>" required><br>
                                                                                    <label>TMT PNS</label>
                                                                                    <input type="<?= ($pp['tmt_pns'] != null) ? "text" : "date"; ?>" class="form-control" name="tmt_pns" value="<?= ($pp['tmt_pns'] != null) ? $pp['tmt_pns'] : ""; ?>" required>
                                                                                    <label>Tanggal SK PNS</label>
                                                                                    <input type="<?= ($pp['tgl_sk_pns'] != null) ? "text" : "date"; ?>" class="form-control" name="tgl_sk_pns" value="<?= ($pp['tgl_sk_pns'] != null) ? $pp['tgl_sk_pns'] : ""; ?>" required>
                                                                                    <label>Nomor SK PNS</label>
                                                                                    <input type="text" class="form-control" name="no_sk_pns" value="<?= ($pp['no_sk_pns'] != null) ? $pp['no_sk_pns'] : ""; ?>" required>
                                                                                <?php endif ?>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
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