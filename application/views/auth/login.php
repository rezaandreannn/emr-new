<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css');?>">

<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css');?>">

</head>
<div class="login-logo pt-4">
<img src="<?= base_url('assets/images/logo.png'); ?>" alt="AdminLTE Logo" class="brand-image" style="width: 70px;">
</div>
<div class="text-center pb-4 pt-2">
    <h5>ELECTRONIC MEDICAL RECORD <br>RSU MUHAMMADIYAH METRO</h5>
    

</div>


<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <?php if ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('danger'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('warning')) : ?>
        <div class="alert alert-warning">
            <?php echo $this->session->flashdata('warning'); ?>
        </div>
    <?php endif; ?>
      <p class="login-box-msg">Masuk untuk memulai EMR</p>

      <form action="<?php echo base_url('LoginController/LoginProses');?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username');?>">
          <span class="text-danger"><?php echo form_error('username'); ?></span>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js');?>"></script>

<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js?v=3.2.0');?>"></script>
</body>
</html>


