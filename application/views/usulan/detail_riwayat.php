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
                    <a href="<?= base_url('usulan/riwayat_usulan'); ?>">
                        <i class="fas fa-arrow-circle-left fa-sm"></i> Kembali</a>
                </div><br>
                <div class="card author-box card-light">
                    <div class="card-header">
                        <center>
                            <h4><?= "Detail " . $title; ?></h4>
                        </center>
                    </div>
                    <div class="card-body">

                        <div class="card mb-3 col-lg-12">
                            <table id="table-detail_karpeg" class="table table-striped dt-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">OPD</th>
                                        <th scope="col">Posisi</th>
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
                                                        <td><?= $pp['nama']; ?></td>
                                                        <td><?= $pp['opd']; ?></td>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                                <td>
                                                    <?php
                                                    if ($lu['posisi'] == 0) : ?>
                                                        BKN
                                                    <?php elseif ($lu['posisi'] == 1) : ?>
                                                        BKPP
                                                    <?php elseif ($lu['posisi'] == 2) : ?>
                                                        Sudah diambil
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdataModal"><i class="fas fa-edit"></i> Tanda Terima</button>
                                                    <!-- Modal -->
                                                    <form id="form-tambah_pegawai_karpeg">
                                                        <div class="modal fade" id="tambahdataModal" tabindex="-1" aria-labelledby="tambahdataModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tambahdataModalLabel">Upload Tanda Terima</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="container">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <div>
                                                                                        <input type="text" name="kode_usulan" value="<?= $lu['kode_usulan']; ?>" hidden>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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