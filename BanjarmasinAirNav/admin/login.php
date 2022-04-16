<?php
include('layout/LoginRegister.php');
include('layout/SweetAlert.php');
?>
<title>Login </title>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <a href="../index.php"><img src="../images/airnav.png" alt="logo" width="100" class="shadow-light rounded-circle" style="margin-bottom:20px"></a>
              <h6 style="color:black">Banjarmasin Air Traffic Services Information System</h6>
            </div>
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="controller/LoginController.php">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  </div>
                  <div class="form-group">
                    <input type="submit" id="login" name="login" value="Login" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
                <a href="../index.php" class="btn btn-success btn-md "><i class="fas fa-arrow-left"></i> Kembali</a>
                <div class="mt-5 text-muted text-center">
                  <p>Belum Memiliki Akun ?<a href="register.php" class="modal-trigger" style="color:#185ADB; cursor:pointer;font-weight:bold"> Daftar disini</a></p>
                </div>
              </div>
            </div>

            <div class="simple-footer" style="color:white">
              Copyright &copy; 2022 Design By ABRE
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>