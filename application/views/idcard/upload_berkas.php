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
                    <a href="<?= base_url('idcard/detail_idcard/' . $id_usulan); ?>">
                        <i class="fas fa-arrow-circle-left fa-sm"></i> Kembali</a>
                </div><br>
                <div class="card author-box card-light">
                    <div class="card-header">
                        <center>
                            <h4><?= "Upload Berkas Persyaratan " . $title; ?></h4>
                        </center>
                    </div>
                    <?= $this->session->flashdata('upload'); ?>
                    <div class="card-body">

                        <table class="table table-striped dt-responsive" id="table-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="col-name" style="width: 5%;">No</th>
                                    <th style="width: 52%;">Nama Dokumen</th>
                                    <th class="col-name">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td><label class="col-sm-12 col-md-12">Surat Pengantar/ Usulan dari Instansi <br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                    <td>

                                        <?php if ($berkas_sp != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_sp['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas1"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form id="form-hapus_berkas_idcard1">
                                                <div class="modal fade" id="hapusBerkas1" tabindex="-1" aria-labelledby="hapusBerkas1Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas1Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="id_berkas" value="<?= $berkas_sp['id']; ?>" hidden>
                                                            <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                            <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <form method='post' action='<?php echo base_url('usulan/crud_upload_idcard/suratpengantar'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir SK CPNS <br><b> (Max. Ukuran File 2MB dan Format File .pdf)</td>
                                    <td>
                                        <?php if ($berkas_skcpns != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_skcpns['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas2"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form id="form-hapus_berkas_idcard2">
                                                <div class="modal fade" id="hapusBerkas2" tabindex="-1" aria-labelledby="hapusBerkas2Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas2Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="id_berkas" value="<?= $berkas_skcpns['id']; ?>" hidden>
                                                            <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                            <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <form method='post' action='<?php echo base_url('usulan/crud_upload_idcard/skcpns'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir SK PNS <br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                    <td>
                                        <?php if ($berkas_skpns != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_skpns['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas3"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form id="form-hapus_berkas_idcard3">
                                                <div class="modal fade" id="hapusBerkas3" tabindex="-1" aria-labelledby="hapusBerkas3Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas3Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="id_berkas" value="<?= $berkas_skpns['id']; ?>" hidden>
                                                            <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                            <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <form method='post' action='<?php echo base_url('usulan/crud_upload_idcard/skpns'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir STTPP (Surat Tanda Tamat Pendidikan dan Pelatihan) PRAJABATAN<br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                    <td>
                                        <?php if ($berkas_sttpp != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_sttpp['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas4"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form id="form-hapus_berkas_idcard4">
                                                <div class="modal fade" id="hapusBerkas4" tabindex="-1" aria-labelledby="hapusBerkas4Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas4Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="id_berkas" value="<?= $berkas_sttpp['id']; ?>" hidden>
                                                            <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                            <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <form method='post' action='<?php echo base_url('usulan/crud_upload_idcard/sttpp'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td><label class="col-sm-12 col-md-12">Pas foto hitam putih ukuran 3x4 cm <br><b> (Max. Ukuran File 2MB dan Format File .jpg|.png)</b></label></td>
                                    <td>
                                        <?php if ($berkas_foto != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_foto['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas5"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form id="form-hapus_berkas_idcard5">
                                                <div class="modal fade" id="hapusBerkas5" tabindex="-1" aria-labelledby="hapusBerkas5Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas5Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="id_berkas" value="<?= $berkas_foto['id']; ?>" hidden>
                                                            <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                            <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form><?php } else { ?>
                                            <form method='post' action='<?php echo base_url('usulan/crud_upload_idcard/fotopns'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
                                    </td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>