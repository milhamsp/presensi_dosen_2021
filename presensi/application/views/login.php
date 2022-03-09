<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login - Sistem Monitoring Dosen Universitas Gunadarma</title>
    <link rel="icon" href="<?=base_url('assets/img/logo.png')?>">

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets')?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets')?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<a class="btn btn-primary mx-1 my-1 text-light" href="<?=base_url('main')?>">
      <i class="fas fa-arrow-left mx-1"></i>Kembali
    </a>
<!-- <body class="bg-gradient" style="background-color: #763996 !important;"> -->
<body style="background: url(<?=base_url('assets/img/dex.png')?>) center / cover no-repeat;">  
  <div class="container">
    <!-- Outer Row -->
    <h2 class="text-center my-4 mb-5">
      <strong>                                         </strong>
    </h2>
    <div class="card-group">
      <div class="card o-hidden col-lg-4 my-5 mx-auto bg-gradient-link">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="col-lg-7 mx-auto my-3">
              <center><img class="card-img" src="<?=base_url('assets/img/logo.png')?>" style="max-width: 160px;"></center>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-3">Selamat Datang!</h1>
              </div>
              <?=$this->session->flashdata('message')?>
              <form method="post" action='<?=base_url('auth/login'); ?>'>
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" id="username" name='username' placeholder="Username" value="<?=set_value('username') ?>">
                  <?= form_error('username', '<small class="text-danger">','</small>');  ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-sm" id="password" name='password' placeholder="Password" value="<?=set_value('password') ?>">
                  <?= form_error('password', '<small class="text-danger">','</small>');  ?>
                </div>
                <button type='submit' class="btn btn-primary btn-sm btn-block mb-3"> Login</button> 
              </form>                   
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      <div class="modal fade" id="mod-about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tentang</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <img src="<?=base_url('assets/img/logo.png')?>" style="max-width: 80px;"><hr>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
<!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets')?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets')?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets')?>/js/sb-admin-2.min.js"></script>
</body>
</html>