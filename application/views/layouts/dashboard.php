<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMR | Dashboard</title>

    <?= link_tag('assets/images/logo.png', 'shortcut icon', 'image/x-icon') ?>

    <!-- Google Font: Source Sans Pro -->
    <?= link_tag('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback', 'stylesheet') ?>
    <!-- Font Awesome -->
    <?= link_tag('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>"> -->
    <!-- Theme style -->
    <?= link_tag('assets/AdminLTE/dist/css/adminlte.min.css') ?>
    <!-- icheck -->
    <?= link_tag('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <?php echo header_assets(!empty($header) ? $header : array()); ?>

    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <?php $this->load->view('partials/dashboard/_loader'); ?>
        <!-- Preloader -->

        <!-- Navbar -->
        <?php $this->load->view('partials/dashboard/_navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("partials/dashboard/_sidebar"); ?>
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- /.content-header -->

            <!-- Main content -->
            <?php $this->load->view($content) ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- footer -->
        <?php $this->load->view('partials/dashboard/_footer'); ?>
        <!-- footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/AdminLTE/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/AdminLTE/plugins/moment/moment.min.js'); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.js'); ?>"></script>
    <script src="<?= base_url('assets/AdminLTE/dist/js/demo.js'); ?>"></script>
    <script src="<?= base_url('assets/qrcode/qrcode.min.js'); ?>"></script>
    <!-- select2 -->
    <script src="<?= base_url('assets/AdminLTE/plugins/select2/js/select2.full.min.js'); ?>"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
    </script>

    <script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script>

<script>
            function click_lab(){
                
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Yakin hapus data?",            
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"
                
                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if(result.isConfirmed){
                        window.location.href = getLink
                    }
                })
                return false;
            };
        </script>

    <?php echo footer_assets(!empty($footer) ? $footer : array()) ?>

</body>

</html>