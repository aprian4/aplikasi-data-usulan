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
                    <div class="card-body">
                        <div class="container justify-content-center mt-5">
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2">Jenis Layanan</label>
                                    <select class="col-sm-8 custom-select" name='jenis_usulan'>
                                        <option value="all" selected>-- Semua --</option>
                                        <option value="karpeg">Kartu Pegawai (KARPEG)</option>
                                        <option value="karsu">Kartu Suami (KARSU)</option>
                                        <option value="karis">Kartu Istri (KARIS)</option>
                                        <option value="idcard">Kartu Tanda Pengenal (ID CARD)</option>
                                        <option value="cuti">Cuti</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2">Jenis Usulan</label>
                                    <select class="custom-select col-sm-8" name='jenis_usulan'>
                                        <option value="all" selected>-- Semua --</option>
                                        <option value="karpeg_baru">Baru</option>
                                        <option value="karpeg_pengganti">Pengganti Karena Hilang</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2">Tanggal Awal</label>
                                    <input type="date" class="form-control col-sm-8" name="tgl_awal">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2">Tanggal Akhir</label>
                                    <input type="date" class="form-control col-sm-8" name="tgl_akhir">
                                </div>
                                <div class="form-group text-center mt-5">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-download"> Unduh Laporan</i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>