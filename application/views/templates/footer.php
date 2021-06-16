<footer class="main-footer">
    <strong>Copyright &copy; BKPP Tangerang Selatan <?= date('Y'); ?></strong>
    All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>vendor/adminlte-v3/dist/js/demo.js"></script>

<script src="<?= base_url('assets/'); ?>js/iziToast.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/'); ?>js/prettify.js" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js'></script>







</body>

</html>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);

    });


    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });

    $('#form-tambah_karpeg_baru').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('karpeg/crud_usulan_karpeg/tambah'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data Usulan Berhasil Disimpan',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.replace("<?= base_url('karpeg/home'); ?>");
                    }, 100);
                } else {
                    iziToast.error({
                        title: 'Maaf,',
                        message: 'Data Gagal disimpan, silahkan ulangi lagi',
                        position: 'center'
                    });
                }
            }
        });
        return false;
    });

    $('#form-tambah_karsu_baru').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('karsu/crud_usulan_karsu/tambah'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data Usulan Berhasil Disimpan',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.replace("<?= base_url('karsu/home'); ?>");
                    }, 100);
                } else {
                    iziToast.error({
                        title: 'Maaf,',
                        message: 'Data Gagal disimpan, silahkan ulangi lagi',
                        position: 'center'
                    });
                }
            }
        });
        return false;
    });

    $('#form-tambah_idcard').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('idcard/crud_usulan_idcard/tambah'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data Usulan Berhasil Disimpan',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.replace("<?= base_url('idcard/home'); ?>");
                    }, 100);
                } else {
                    iziToast.error({
                        title: 'Maaf,',
                        message: 'Data Gagal disimpan, silahkan ulangi lagi',
                        position: 'center'
                    });
                }
            }
        });
        return false;
    });


    $('#form-edit_usulan_karpeg_baru').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('karpeg/crud_usulan_karpeg/ubah'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data Usulan Berhasil Diubah',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                } else {
                    iziToast.error({
                        title: 'Maaf,',
                        message: 'Data Gagal disimpan, silahkan ulangi lagi',
                        position: 'center'
                    });
                }
            }
        });
        return false;
    });

    $('#form-edit_usulan_idcard_baru').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('idcard/crud_usulan_idcard/ubah'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data Usulan Berhasil Diubah',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                } else {
                    iziToast.error({
                        title: 'Maaf,',
                        message: 'Data Gagal disimpan, silahkan ulangi lagi',
                        position: 'center'
                    });
                }
            }
        });
        return false;
    });

    $('#form-edit_status_usulan_idcard').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('idcard/crud_usulan_idcard/ubahstatus'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Status Usulan Berhasil Diubah',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                } else {
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                }
            }
        });
        return false;
    });


    $('#form-edit_status_usulan').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('usulan/crud_usulan/ubahstatus'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Status Usulan Berhasil Diubah',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                } else {
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                }
            }
        });
        return false;
    });


    $('#form-hapus_usulan_idcard').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('idcard/crud_usulan_idcard/hapus'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data Usulan Berhasil Dihapus',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.replace("<?= base_url('idcard/home'); ?>");
                    }, 100);
                } else {
                    iziToast.error({
                        title: 'Maaf,',
                        message: 'Data Gagal disimpan, silahkan ulangi lagi',
                        position: 'center'
                    });
                }
            }
        });
        return false;
    });


    $('#form-tambah_pegawai_karpeg').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('karpeg/crud_usulan_karpeg/tambah_pegawai'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data Usulan Berhasil Disimpan',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                } else {
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                }
            }
        });
        return false;
    });

    $('#form-tambah_pegawai_idcard').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('idcard/crud_usulan_idcard/tambah_pegawai'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data Usulan Berhasil Disimpan',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                } else {
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                }
            }
        });
        return false;
    });
</script>

<script>
    $(document).ready(function() {
        $('#table-karpeg').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            pageLength: 10,
            autoWidth: false,
            "columnDefs": [{
                "targets": 8,
                "visible": false
            }]

        });
    });

    $(document).ready(function() {
        $('#table-idcard').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            pageLength: 10,
            autoWidth: false,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }]

        });
    });

    $(document).ready(function() {
        $('#table-karis').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            pageLength: 10,
            autoWidth: false,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }]

        });
    });

    $(document).ready(function() {
        $('#table-karsu').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            pageLength: 10,
            autoWidth: false,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }]

        });
    });

    $(document).ready(function() {
        $('#table-cltn').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            pageLength: 10,
            autoWidth: false,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }]

        });
    });


    $(document).ready(function() {
        $('#table-detail_karpeg').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            searching: false,
            lengthChange: false,
            paging: false,
            ordering: false,
            autoWidth: false,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }]
        });
    });


    $(document).ready(function() {
        $('#table-riwayat_karpeg').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            searching: false,
            lengthChange: false,
            paging: false,
            ordering: false,
            autoWidth: false,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }]
        });
    });

    $(document).ready(function() {
        $('#table-1').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            searching: false,
            lengthChange: false,
            paging: false,
            ordering: false,
            autoWidth: false,
            columnDefs: [{
                "className": "dt-center",
                "targets": "col-name"
            }]
        });
    });


    $('#form-suratpengantarkarpeg').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('usulan/crud_upload/suratpengantarkarpeg'); ?>",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "ok") {
                    iziToast.success({
                        title: 'Berhasil!',
                        message: 'Data berhasil disimpan',
                        position: 'center'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 100);
                } else {
                    iziToast.error({
                        title: 'Maaf,',
                        message: 'Data Gagal disimpan, silahkan ulangi lagi',
                        position: 'center'
                    });
                }
            }
        });
        return false;
    });




    $(document).ready(function() {
        $('#table-dataapi').DataTable({
            // dom: 'Bfrtip',
            // buttons: [{
            //   extend: 'pdfHtml5',
            // title: 'Data Usulan Kartu Pegawai',
            //text: 'Download Pdf',
            //}, {
            //  extend: 'excelHtml5',
            //title: 'Data Usulan Kartu Pegawai',
            //  text: 'Download Excel',
            // }],
            pageLength: 10,
            autoWidth: false,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }]

        });
    });


    $("#updateapi").click(function() {
        $(".preloader").fadeIn();
    });
</script>

<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>

<script>
    $("#formDisetujui").hide();
    $("#formDitolak").hide();
</script>
<script>
    $(document).ready(function() {

        function checkDisabled(evt) {
            var val = $("input[name=status_karpeg]:checked").val();
            if (val == 1) {
                $("#formDitolak").hide();
                $("#formDisetujui").show();
            } else if (val == 2) {
                $("#formDisetujui").hide();
                $("#formDitolak").show();
            }
        }
        $('input[name=status_karpeg]:radio').change(checkDisabled);
        checkDisabled();
    });
</script>