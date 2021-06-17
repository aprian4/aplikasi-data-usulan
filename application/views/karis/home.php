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


                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"> Tambah Usulan</i></button>
                        </div>
                        <!-- Modal -->
                        <form id="form-tambah_karis_baru">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Usulan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <label>Nomor Surat</label>
                                            <input type="text" class="form-control" name="no_surat" required>
                                        </div>

                                        <div class="modal-body">
                                            <label>Tanggal Usulan</label>
                                            <input type="date" class="form-control" name="tgl_usulan" required>
                                        </div>

                                        <div class="modal-body">
                                            <input type="text" name="id" value="<?= $user['id']; ?>" hidden>
                                            <label>Jenis Usulan</label>
                                            <select class="custom-select" name='jenis_usulan' required>
                                                <option value="" selected>Pilih Jenis Usulan</option>
                                                <option value="karis_baru">Pembuatan Kartu Istri (Karis)</option>
                                                <option value="karis_pengganti">Pembuatan Kartu Istri (Karis) Pengganti Karena Hilang</option>
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


                        <div class="card mb-3 col-lg-12">
                            <table id="table-karis" style="font-size: 15px;" class="table table-striped dt-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">NoSurat</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Pengusul</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">detail</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($usulan as $r) : ?>
                                        <?php if (($r['jenis_usulan'] == 'karis_baru' || $r['jenis_usulan'] == 'karis_pengganti')) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td>
                                                    <?= $r['kode_usulan'];; ?>
                                                </td>
                                                <td>
                                                    <?= $r['no_surat'];; ?>
                                                </td>
                                                <td>
                                                    <?php if ($r['jenis_usulan'] == 'karis_baru') {
                                                        echo "Baru";
                                                    } else {
                                                        echo "Pengganti";
                                                    } ?>
                                                </td>
                                                <td><?= $r['tgl_usulan']; ?></td>

                                                <td>
                                                    <?php if ($detail_usulan != null) : ?>
                                                        <?php $jml_data = 0; ?>
                                                        <?php foreach ($detail_usulan as $det) : ?>
                                                            <?php if ($det['kode_usulan'] == $r['kode_usulan']) : ?>
                                                                <?php $jml_data++; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-auto">
                                                                <div class="mb-0 mr-1"><?= $jml_data; ?></div>
                                                            </div>

                                                            <?php $persentase = $jml_data / 25 * 100;  ?>
                                                            <div class="col">
                                                                <div class="progress progress-sm mr-1">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $persentase; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="25"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="mb-0 mr-0">25</div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($tabel_user as $up) : ?>
                                                        <?php if ($up['id'] == $r['id_user']) : ?>
                                                            <?= strtok($up['nama_user'], " "); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <?= strtok($r['updated_by'], " "); ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($detail_usulan as $det) : ?>
                                                        <?php if ($det['kode_usulan'] == $r['kode_usulan']) : ?>
                                                            <?php foreach ($profile_pegawai as $pg) : ?>
                                                                <?php if ($pg['nip'] == $det['nip']) : ?>
                                                                    <?php echo $pg['nip'] . $pg['nama_lengkap'] . $pg['opd'] ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['status_usulan'] == 1) { ?>
                                                        <span class="badge badge-secondary">Draft</span>
                                                    <?php } else if ($r['status_usulan'] == 2) { ?>
                                                        <span class="badge badge-warning">Proses BKN</span>
                                                    <?php } else if ($r['status_usulan'] == 3) { ?>
                                                        <span class="badge badge-primary">Diterima BKPP</span>
                                                    <?php } ?>
                                                </td>
                                                <?php if ($r['status_usulan'] == 1) { ?>
                                                    <td>

                                                        <div class="dropdown show">
                                                            <a style="font-size: 14px;" class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a href="<?= base_url('karis/detail_karis/' . $r['id']); ?>" class="dropdown-item">
                                                                    <i class="fas fa-edit fa-sm"></i> Ubah Usulan</a>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#editStatusModal<?= $i ?>"><i class="fas fa-check-square fa-sm"></i> Usulkan ke BKN</a></button>

                                                                <div class="dropdown-divider"></div>
                                                                <form action="<?= base_url('karis/crud_usulan_karis/hapus'); ?>" method="post">
                                                                    <input type="text" name="id_usulan" value="<?= $r['id']; ?>" hidden>
                                                                    <input type="text" name="kode_usulan" value="<?= $r['kode_usulan']; ?>" hidden>
                                                                    <button type="submit" class="dropdown-item"><i class="fas fa-trash fa-sm"></i> Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <form method="POST" action="<?= base_url('karis/crud_usulan_karis/ubahstatus'); ?>">
                                                            <div class="modal fade" id="editStatusModal<?= $i ?>" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-center" id="editStatusModalLabel">Apakah Anda Yakin Akan Mengusulkan Data ini ke BKN?</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <input type="text" name="id_usulan" value="<?= $r['id']; ?>" hidden>
                                                                        <input type="text" name="kode_usulan" value="<?= $r['kode_usulan']; ?>" hidden>
                                                                        <div class="modal-footer col-sm-8">
                                                                            <button type="submit" class="btn btn-danger">Ya</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </td>
                                                <?php } else if ($r['status_usulan'] == 2) { ?>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a style="font-size: 14px;" class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a href="<?= base_url('karis/riwayat/' . $r['id']); ?>" class="dropdown-item">
                                                                    <i class="fas fa-eye fa-sm"></i> Details</a>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-edit<?= $i ?>"><i class="fas fa-edit fa-sm"></i> Ubah Status</a></button>

                                                            </div>
                                                        </div><!-- Modal -->
                                                        <form method="POST" action="<?= base_url('karis/crud_usulan_karis/ubahstatus2'); ?>">
                                                            <div class="modal fade" id="modal-edit<?= $i ?>" tabindex="-1" aria-labelledby="editStatus3ModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content col-sm-10">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-center" id="editStatus3ModalLabel">Ubah Status Usulan</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <input type="text" name="id_usulan" value="<?= $r['id']; ?>" hidden>
                                                                        <input type="text" name="kode_usulan" value="<?= $r['kode_usulan']; ?>" hidden>
                                                                        <div class="modal-body">
                                                                            <label>Status Usulan</label>
                                                                            <select class="custom-select" name='status_usulan' required>
                                                                                <option <?php if ($r['status_usulan'] == '1') {
                                                                                            echo "selected='selected'";
                                                                                        } ?> value="1">Draft</option>
                                                                                <option <?php if ($r['status_usulan'] == '2') {
                                                                                            echo "selected='selected'";
                                                                                        } ?> value="2">Proses BKN</option>
                                                                                <option <?php if ($r['status_usulan'] == '3') {
                                                                                            echo "selected='selected'";
                                                                                        } ?> value="3">Diterima BKPP</option>
                                                                            </select>
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

                                                <?php } else { ?>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a style="font-size: 14px;" class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <!--  <form action="<?= base_url('whatsapp/send_wa'); ?>" method="post">
                                                                    <input type="text" name="id_usulan" value="<?= $r['id']; ?>" hidden>
                                                                    <input type="text" name="kode_usulan" value="<?= $r['kode_usulan']; ?>" hidden>
                                                                    <button type="submit" class="dropdown-item"><i class="fas fa-mail fa-sm"></i> Kirim WA</button>
                                                                </form>
                                                                <div class="dropdown-divider"></div>
                                                                <form action="<?= base_url('email/send_email'); ?>" method="post">
                                                                    <input type="text" name="id_usulan" value="<?= $r['id']; ?>" hidden>
                                                                    <input type="text" name="kode_usulan" value="<?= $r['kode_usulan']; ?>" hidden>
                                                                    <button type="submit" class="dropdown-item"><i class="fas fa-mail fa-sm"></i> Kirim Email</button>
                                                                </form>
                                                                <div class="dropdown-divider"></div> -->
                                                                <a href="<?= base_url('karis/riwayat/' . $r['id']); ?>" class="dropdown-item">
                                                                    <i class="fas fa-eye fa-sm"></i> Details</a>
                                                                <div class="dropdown-divider"></div>
                                                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-edit<?= $i ?>"><i class="fas fa-edit fa-sm"></i> Ubah Status</a></button>

                                                            </div>
                                                        </div><!-- Modal -->
                                                        <form method="POST" action="<?= base_url('karis/crud_usulan_karis/ubahstatus2'); ?>">
                                                            <div class="modal fade" id="modal-edit<?= $i ?>" tabindex="-1" aria-labelledby="editStatus3ModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content col-sm-10">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-center" id="editStatus3ModalLabel">Ubah Status Usulan</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <input type="text" name="id_usulan" value="<?= $r['id']; ?>" hidden>
                                                                        <input type="text" name="kode_usulan" value="<?= $r['kode_usulan']; ?>" hidden>
                                                                        <div class="modal-body">
                                                                            <label>Status Usulan</label>
                                                                            <select class="custom-select" name='status_usulan' required>
                                                                                <option <?php if ($r['status_usulan'] == '1') {
                                                                                            echo "selected='selected'";
                                                                                        } ?> value="1">Draft</option>
                                                                                <option <?php if ($r['status_usulan'] == '2') {
                                                                                            echo "selected='selected'";
                                                                                        } ?> value="2">Proses BKN</option>
                                                                                <option <?php if ($r['status_usulan'] == '3') {
                                                                                            echo "selected='selected'";
                                                                                        } ?> value="3">Diterima BKPP</option>
                                                                            </select>
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

                                                <?php } ?>

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