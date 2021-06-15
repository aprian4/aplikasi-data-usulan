<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="col-8 col-sm-8 col-lg-8">
                <div class="card author-box card-light">
                    <div class="card-header">
                        <center>
                            <h4><?= $title; ?></h4>
                        </center>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-11">
                                <form class="user" method="post" action="<?= base_url('admin/crud_user'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_user_baru" name="nama_user_baru" placeholder="Nama Lengkap" value="<?= set_value('nama_user_baru'); ?>">
                                        <?= form_error('nama_user_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username_baru" name="username_baru" placeholder="Username" value="<?= set_value('username_baru'); ?>">
                                        <?= form_error('username_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password_baru" name="password_baru" placeholder="Password">
                                        <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user">
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>