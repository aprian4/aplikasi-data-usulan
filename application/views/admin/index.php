<?= $this->session->unset_userdata('message'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <center>
                        <h1 class="m-0 text-dark"><?= $title; ?></h1>
                    </center>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div>
                <div class="card mb-12">
                    <div class="card-body">
                        Selamat Datang, <b> <?= $user['nama_user']; ?> </b>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php $i = 0; ?>
                                <?php foreach ($usulan as $r) : ?>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                <?= $i; ?></h3>

                            <p>TOTAL USULAN</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-navicon"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php $i = 0; ?>
                                <?php foreach ($usulan as $r) : ?>
                                    <?php if (($r['status_usulan'] == 1) || ($r['status_usulan'] == 2)) : ?>
                                        <?php $i++; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?= $i; ?></h3>

                            <p>USULAN BELUM LENGKAP</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php $i = 0; ?><?php foreach ($usulan as $r) : ?>
                                <?php if (($r['status_usulan'] == 3) || ($r['status_usulan'] == 4)) : ?>
                                    <?php $i++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?= $i; ?></h3>

                            <p>USULAN DIPROSES</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-load-a"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php $i = 0; ?>
                                <?php foreach ($usulan as $r) : ?>
                                    <?php if (($r['status_usulan'] == 5) || ($r['status_usulan'] == 6)) : ?>
                                        <?php $i++; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?= $i; ?></h3>

                            <p>USULAN SELESAI</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>