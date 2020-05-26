<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $judul; ?></title>
  <link href="<?php echo base_url('assets/adminStyle/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url('assets/adminStyle/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/adminStyle/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/adminStyle/css/style.css'); ?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/adminStyle/js/customJS.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminStyle/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminStyle/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminStyle/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/adminStyle/js/sb-admin-2.min.js'); ?>"></script>
</head>
<body style="overflow-x: hidden;">
  <div class="row justify-content-center">
    <?php if ($this->session->flashdata('error')) : ?>
      <div class="alert alert-danger">Username dan password salah!</div>
    <?php endif; ?>
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block m-auto text-center">
              <img src="<?php echo base_url('assets/image/logo.svg'); ?>" style="width: 75%; margin-left: auto!important; margin-right: auto!important;">
            </div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back, Admin!</h1>
                </div>
                <form class="user" method="POST" action="<?php echo base_url() . 'admin/login'; ?> ">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="username" name="username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                  </div>
                  <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                </form>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>