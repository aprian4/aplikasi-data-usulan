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
                    <a href="<?= base_url('idcard/riwayat/' . $id_usulan); ?>">
                        <i class="fas fa-arrow-circle-left fa-sm"></i> Kembali</a>
                </div><br>
                <div class="card author-box card-light">
                    <div class="card-header">
                        <center>
                            <h4><?= "Berkas Persyaratan " . $title; ?></h4>
                        </center>
                    </div>
                    <?= $this->session->flashdata('upload'); ?>
                    <div class="card-body">

                        <table class="table table-striped dt-responsive" id="table-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="col-name" style="width: 5%;">#</th>
                                    <th style="width: 80%;">Nama Dokumen</th>
                                    <th class="col-name">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php if ($berkas_sp != null) { ?>
                                            <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                        <?php } else { ?>
                                            <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                        <?php } ?>
                                    </td>
                                    <td><label class="col-sm-12 col-md-12">Surat Pengantar/ Usulan dari Instansi <br></label></td>
                                    <td>
                                        <?php if ($berkas_sp != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_sp['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if ($berkas_skcpns != null) { ?>
                                            <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                        <?php } else { ?>
                                            <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                        <?php } ?>
                                    </td>
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir SK CPNS <br></td>
                                    <td>
                                        <?php if ($berkas_skcpns != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_skcpns['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>

                                        <?php } ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if ($berkas_skpns != null) { ?>
                                            <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                        <?php } else { ?>
                                            <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                        <?php } ?>
                                    </td>
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir SK PNS <br></b></label></td>
                                    <td>
                                        <?php if ($berkas_skpns != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_skpns['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>

                                        <?php } ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if ($berkas_sttpp != null) { ?>
                                            <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                        <?php } else { ?>
                                            <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                        <?php } ?>
                                    </td>
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir STTPP (Surat Tanda Tamat Pendidikan dan Pelatihan) PRAJABATAN<br></b></label></td>
                                    <td>
                                        <?php if ($berkas_sttpp != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_sttpp['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>

                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if ($berkas_foto != null) { ?>
                                            <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                        <?php } else { ?>
                                            <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                        <?php } ?>
                                    </td>
                                    <td><label class="col-sm-12 col-md-12">Pas foto hitam putih ukuran 3x4 cm <br></b></label></td>
                                    <td>
                                        <?php if ($berkas_foto != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_foto['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                        <?php } ?>
                                    </td>
                                </tr>

                                <?php if ($usulan['jenis_usulan'] == "idcard_pengganti") { ?>

                                    <tr>
                                        <td>
                                            <?php if ($berkas_lampiranx != null) { ?>
                                                <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                            <?php } else { ?>
                                                <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                            <?php } ?>
                                        </td>
                                        <td><label class="col-sm-12 col-md-12">Lampiran X<br></b></label></td>
                                        <td>
                                            <?php if ($berkas_lampiranx != null) { ?>
                                                <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_lampiranx['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php if ($berkas_lampiranxi != null) { ?>
                                                <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                            <?php } else { ?>
                                                <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                            <?php } ?>
                                        </td>
                                        <td><label class="col-sm-12 col-md-12">Lampiran XI<br></b></label></td>
                                        <td>
                                            <?php if ($berkas_lampiranxi != null) { ?>
                                                <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_lampiranxi['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <?php }  ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php if ($berkas_kehilangan != null) { ?>
                                                <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                            <?php } else { ?>
                                                <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                            <?php } ?>
                                        </td>
                                        <td><label class="col-sm-12 col-md-12">Surat Kehilangan dari Kepolisian<br></b></label></td>
                                        <td>
                                            <?php if ($berkas_kehilangan != null) { ?>
                                                <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_kehilangan['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>