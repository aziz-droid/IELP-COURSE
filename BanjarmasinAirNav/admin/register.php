<?php
include('layout/LoginRegister.php');
include('layout/SweetAlert.php');
?>
<title>Register </title>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="../images/airnav.png" alt="logo" width="100" class="shadow-light rounded-circle" style="margin-bottom:20px">
              <h6 style="color:black">Banjarmasin Air Traffic Services Information System</h6>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>

              <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="controller/RegisterController.php">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Nama Lengkap <span style="color: red; font-weight: bold">*</span></label>
                      <input id="nama" type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group col-6">
                      <label for="nomer">No Hp <span style="color: red; font-weight: bold">*</span></label>
                      <input id="nomer" type="number" class="form-control" name="nomer" required>
                    </div>
                    <div class="form-group  col-6">
                      <label for="username">Username <span style="color: red; font-weight: bold">*</span></label>
                      <input id="username" type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group  col-6">
                      <label for="email">Email <span style="color: red; font-weight: bold">*</span></label>
                      <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password <span style="color: red; font-weight: bold">*</span></label>
                      <input oninput="isCorrect()" id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Konfirmasi Password <span style="color: red; font-weight: bold">*</span></label>
                      <input oninput="isCorrect()" id="password2" type="password" class="form-control" name="password2" required>
                      <p id="alert" style="color:red;display:none">Cek kembali Password dan Konfirmasi Password !!!</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" onclick="Pass2()">
                      <label class="custom-control-label" for="agree">Lihat Password</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" id="register" name="register" value="Register" class="btn btn-primary btn-lg btn-block" disabled>
                  </div>
                </form>
                <a href="../index.php" class="btn btn-success btn-md "><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="login.php" class="btn btn-primary btn-md "><i class="fas fa-sign-in-alt"></i> Login</a>
              </div>
            </div>
            <div class="simple-footer" style="color:white">
              Copyright &copy; 2022 <div class="bullet"></div> Design By ABRE</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>