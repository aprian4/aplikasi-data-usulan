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
                    <a href="<?= base_url('karis/detail_karis/' . $id_usulan); ?>">
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
                                    <th class="col-name" style="width: 5%;">#</th>
                                    <th style="width: 52%;">Nama Dokumen</th>
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
                                    <td><label class="col-sm-12 col-md-12">Surat Pengantar/ Usulan dari Instansi <br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                    <td>

                                        <?php if ($berkas_sp != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_sp['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas1"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/hapus'); ?>'>
                                                <div class="modal fade" id="hapusBerkas1" tabindex="-1" aria-labelledby="hapusBerkas1Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas1Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
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
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/suratpengantar'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
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
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir SK CPNS <br><b> (Max. Ukuran File 2MB dan Format File .pdf)</td>
                                    <td>
                                        <?php if ($berkas_skcpns != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_skcpns['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas2"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/hapus'); ?>'>
                                                <div class="modal fade" id="hapusBerkas2" tabindex="-1" aria-labelledby="hapusBerkas2Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas2Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
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
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/skcpns'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
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
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir SK PNS <br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                    <td>
                                        <?php if ($berkas_skpns != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_skpns['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas3"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/hapus'); ?>'>
                                                <div class="modal fade" id="hapusBerkas3" tabindex="-1" aria-labelledby="hapusBerkas3Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas3Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
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
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/skpns'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
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
                                    <td><label class="col-sm-12 col-md-12">Scan Asli / Fotocopy Legalisir STTPP (Surat Tanda Tamat Pendidikan dan Pelatihan) PRAJABATAN<br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                    <td>
                                        <?php if ($berkas_sttpp != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_sttpp['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas4"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/hapus'); ?>'>
                                                <div class="modal fade" id="hapusBerkas4" tabindex="-1" aria-labelledby="hapusBerkas4Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas4Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
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
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/sttpp'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
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
                                    <td><label class="col-sm-12 col-md-12">Pas foto hitam putih ukuran 3x4 cm <br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                    <td>
                                        <?php if ($berkas_foto != null) { ?>
                                            <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_foto['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas5"><i class="fas fa-times-circle"></i> Batal</button>
                                            <!-- Modal -->
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/hapus'); ?>'>
                                                <div class="modal fade" id="hapusBerkas5" tabindex="-1" aria-labelledby="hapusBerkas5Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusBerkas5Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
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
                                            <form method='post' action='<?php echo base_url('karis/crud_upload/fotopns'); ?>' enctype='multipart/form-data'>
                                                <input type='file' name='file'>
                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                            <?php } ?>
                                            </form>
                                    </td>
                                </tr>

                                <?php if ($usulan['jenis_usulan'] == "karis_pengganti") { ?>

                                    <tr>
                                        <td>
                                            <?php if ($berkas_lampiranx != null) { ?>
                                                <i style="color: green; font-size: 30px;" class="fas fa-check-circle fa-sm"></i>
                                            <?php } else { ?>
                                                <i style="color: red; font-size: 30px;" class="fas fa-times-circle fa-sm"></i>
                                            <?php } ?>
                                        </td>
                                        <td><label class="col-sm-12 col-md-12">Lampiran X<br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                        <td>
                                            <?php if ($berkas_lampiranx != null) { ?>
                                                <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_lampiranx['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas6"><i class="fas fa-times-circle"></i> Batal</button>
                                                <!-- Modal -->
                                                <form method='post' action='<?php echo base_url('karis/crud_upload/hapus'); ?>'>
                                                    <div class="modal fade" id="hapusBerkas6" tabindex="-1" aria-labelledby="hapusBerkas6Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusBerkas6Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                                <input type="text" name="id_berkas" value="<?= $berkas_lampiranx['id']; ?>" hidden>
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
                                                <form method='post' action='<?php echo base_url('karis/crud_upload/lampiranx'); ?>' enctype='multipart/form-data'>
                                                    <input type='file' name='file'>
                                                    <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                    <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                    <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                    <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                                <?php } ?>
                                                </form>
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
                                        <td><label class="col-sm-12 col-md-12">Lampiran XI<br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                        <td>
                                            <?php if ($berkas_lampiranxi != null) { ?>
                                                <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_lampiranxi['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas7"><i class="fas fa-times-circle"></i> Batal</button>
                                                <!-- Modal -->
                                                <form method='post' action='<?php echo base_url('karis/crud_upload/hapus'); ?>'>
                                                    <div class="modal fade" id="hapusBerkas7" tabindex="-1" aria-labelledby="hapusBerkas7Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusBerkas7Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                                <input type="text" name="id_berkas" value="<?= $berkas_lampiranxi['id']; ?>" hidden>
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
                                                <form method='post' action='<?php echo base_url('karis/crud_upload/lampiranxi'); ?>' enctype='multipart/form-data'>
                                                    <input type='file' name='file'>
                                                    <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                    <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                    <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                    <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                                <?php } ?>
                                                </form>
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
                                        <td><label class="col-sm-12 col-md-12">Surat Kehilangan dari Kepolisian<br><b> (Max. Ukuran File 2MB dan Format File .pdf)</b></label></td>
                                        <td>
                                            <?php if ($berkas_kehilangan != null) { ?>
                                                <a style="color:#fff" target="_blank" class="lihat btn btn-success btn-sm" href="<?= base_url($berkas_kehilangan['path']); ?>" role="button"><i class="fas fa-eye"></i> Lihat</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusBerkas8"><i class="fas fa-times-circle"></i> Batal</button>
                                                <!-- Modal -->
                                                <form method='post' action='<?php echo base_url('karis/crud_upload/hapus'); ?>'>
                                                    <div class="modal fade" id="hapusBerkas8" tabindex="-1" aria-labelledby="hapusBerkas8Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="hapusBerkas8Label">Apakah Anda Yakin Menghapus Berkas Ini?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                                <input type="text" name="id_berkas" value="<?= $berkas_kehilangan['id']; ?>" hidden>
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
                                                <form method='post' action='<?php echo base_url('karis/crud_upload/kehilangan'); ?>' enctype='multipart/form-data'>
                                                    <input type='file' name='file'>
                                                    <input type="text" name="jenis_usulan" value="<?= $usulan['jenis_usulan']; ?>" hidden>
                                                    <input type='text' name='nip' value="<?= $nip; ?>" hidden>
                                                    <input type='text' name='id_usulan' value="<?= $id_usulan; ?>" hidden>
                                                    <input type='submit' class="btn btn-primary" value='Upload' name='upload' />
                                                </form>
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