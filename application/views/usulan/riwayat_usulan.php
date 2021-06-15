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
                <div class="card author-box card-light">
                    <div class="card-header">
                        <center>
                            <h4><?= $title; ?></h4>
                        </center>
                    </div>
                    <?= $this->session->flashdata('usulan'); ?>

                    <?php $this->session->unset_userdata('usulan'); ?>
                    <div class="card-body">

                        <div class="card mb-3 col-lg-12">
                            <table id="table-karpeg" class="table table-striped dt-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">No Surat</th>
                                        <th scope="col">Jenis Usulan</th>
                                        <th scope="col">Tgl Usulan</th>
                                        <th scope="col">Jml Data</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Pengusul</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($usulan as $r) : ?>
                                        <?php if ($r['status_usulan'] != 1) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td>
                                                    <?= $r['kode_usulan'];; ?>
                                                </td>
                                                <td>
                                                    <?= $r['no_surat'];; ?>
                                                </td>
                                                <td>
                                                    <?= $r['jenis_usulan']; ?>
                                                </td>
                                                <td><?= $r['tgl_usulan']; ?></td>
                                                <td>
                                                    <?php $jml_data = 0; ?>
                                                    <?php foreach ($detail_usulan as $det) : ?>
                                                        <?php if ($det['kode_usulan'] == $r['kode_usulan']) : ?>
                                                            <?php
                                                            $jml_data++;
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="align-items-center"> <?= $jml_data; ?></div>

                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['status_usulan'] == 1) { ?>
                                                        <span class="badge badge-secondary">Draft</span>
                                                    <?php } else if ($r['status_usulan'] == 2) { ?>
                                                        <span class="badge badge-warning">Proses BKN</span>
                                                    <?php } else if ($r['status_usulan'] == 3) { ?>
                                                        <span class="badge badge-primary">Diterima BKPP</span>
                                                    <?php } else if ($r['status_usulan'] == 4) { ?>
                                                        <span class="badge badge-success">Sudah Diambil</span>

                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php foreach ($tabel_user as $up) : ?>
                                                        <?php if ($up['id'] == $r['id_user']) : ?>
                                                            <?= strtok($up['nama_user'], " "); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>

                                                    <div class="dropdown show">
                                                        <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a href="<?= base_url('usulan/detail_riwayat/' . $r['id']); ?>" class="dropdown-item">
                                                                <i class="fas fa-eye fa-sm"></i> Details</a>
                                                            <div class="dropdown-divider"></div>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editStatusModal"><i class="fas fa-edit fa-sm"></i> Ubah Status</a></button>

                                                        </div>
                                                    </div>
                                                    <!-- Example single danger button -->



                                                    <!-- Modal -->
                                                    <form id="form-edit_status_usulan">
                                                        <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content col-sm-10">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-center" id="editStatusModalLabel">Ubah Status Usulan</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <input type="text" name="id_usulan" value="<?= $r['id']; ?>" hidden>
                                                                    <input type="text" name="kode_usulan" value="<?= $r['kode_usulan']; ?>" hidden>
                                                                    <div class="modal-body">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="customRadio1" name="status_usulan" class="custom-control-input" value="2" <?php
                                                                                                                                                                                if ($r['status_usulan'] == 2) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                }
                                                                                                                                                                                ?>>
                                                                            <label class="custom-control-label" for="customRadio1">Diproses BKN</label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="customRadio2" name="status_usulan" class="custom-control-input" value="3" <?php
                                                                                                                                                                                if ($r['status_usulan'] == 3) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                }
                                                                                                                                                                                ?>>
                                                                            <label class="custom-control-label" for="customRadio2">Diterima BKPP</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-danger">Ya</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

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