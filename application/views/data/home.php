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
                    <?= $this->session->flashdata('dataapi'); ?>

                    <?php $this->session->unset_userdata('dataapi'); ?>
                    <div class="card-body">

                        <div class="card mb-3 col-lg-12">
                            <table id="table-dataapi" class="table table-striped dt-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama API</th>
                                        <th scope="col">Last Update</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php if ($data_api != null) : ?>
                                        <?php foreach ($data_api as $da) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td>
                                                    <?= $da['nama_api']; ?>
                                                </td>
                                                <td>
                                                    <?= $da['updated_at']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('dataapi/crud_data_api/' . $da['nama_api'] . '/' . $da['id']); ?>" id="updateapi" class="btn btn-primary"><i class="fas fa-sync"> Update</i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

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