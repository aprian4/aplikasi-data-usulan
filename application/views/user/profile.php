<?= $this->session->unset_userdata('message'); ?>
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

            <div class="col-11 col-sm-11 col-lg-11">
                <div class="card author-box card-light">
                    <div class="card-header">
                        <center>
                            <h4><?= $title; ?></h4>
                        </center>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <?= $this->session->flashdata('update'); ?>
                            </div>
                        </div>

                        <div class=" row no-gutters">
                            <div class="col-md-2">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td class="pr-4"><b>Username</b></td>
                                            <td> : <?= $user['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="pr-4"><b>Nama Lengkap</b></td>
                                            <td> : <?= $user['nama_user']; ?></td>
                                        </tr>
                                        <?php foreach ($role as $r) : ?>
                                            <?php if ($r['id'] == $user['id']) : ?>
                                                <tr>
                                                    <td class="pr-4"><b>Role</b></td>
                                                    <td> : <?= $r['role']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>