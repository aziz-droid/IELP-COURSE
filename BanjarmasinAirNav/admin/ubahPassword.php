<?php  
    // session_start();
    include('layout/Home.php');
    include('layout/Navtop.php'); 
    include('layout/Sidebar.php');
    include('layout/SweetAlert.php'); 
?>
 <!-- Main Content -->
 <?php
    $data_user=showUsers($connect,"id",$_SESSION['idUsers']);
    $data = $data_user[0];
  ?>
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Ubah Password</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Profile </a></div>
              <div class="breadcrumb-item">Ubah Password</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hai, <?= $data['nama'] ?></h2>
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                  <?php if(!empty($data['foto_profil'])){ ?>
                        <img alt="image" src="../files/profile/<?= $data['foto_profil'] ?>" class="rounded-circle profile-widget-picture">
                    <?php } else { ?>
                        <img alt="image" src="../images/user2.png" class="rounded-circle profile-widget-picture">
                    <?php } ?>
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"><?= $data['nama'] ?></div>
                        <div class="profile-widget-item-value"><?= $data['role_id'] == 2 ? 'Users' : 'Admin' ; ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="login-brand">
                    <img src="../images/airnav.png" alt="logo" width="200" class="shadow-light rounded-circle" style="margin-bottom:25px">
                    <h6>Banjarmasin Air Traffic Services Information System</h6>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form action="controller/MasterAkunController.php" method="post" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Ubah Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <input type="hidden" class="form-control" name="id_akun" value="<?= $data['id'] ?>" required>
                          <div class="form-group col-md-12 col-12">
                            <label for="old_pass">Password Lama <span style="color: red; font-weight: bold">*</span></label>
                            <input placeholder="Masukkan Password Lama" id="old_pass" name="old_pass" class="form-control" type="password" required>
                          </div>
                          <div class="form-group col-md-12 col-12">
                            <label for="old_pass">Password Baru <span style="color: red; font-weight: bold">*</span></label>
                            <input oninput="isCorrect2()" placeholder="Masukkan Password Baru" id="new_pass" name="new_pass" class="form-control" type="password" required>
                          </div>
                          <div class="form-group col-md-12 col-12">
                            <label for="cek_pass">Konfirmasi Password <span style="color: red; font-weight: bold">*</span></label>
                            <input oninput="isCorrect2()" placeholder="Masukkan Konfirmasi Password Lagi" id="cek_pass" name="cek_pass" class="form-control" type="password" required>
                            <p id="alert2" style="color:red;display:none">Cek kembali Password Baru dan Konfirmasi Password !!!</p>
                          </div>
                          <div class="form-group col-md-12 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="agree" class="custom-control-input" id="agree" onclick="ubahPassword()">
                              <label class="custom-control-label" for="agree">Lihat Password</label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    <button type="submit" name="update_password" value="Simpan" class="btn btn-info"><i class="fas fa-key"></i> Ubah Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    <?php   
        include('layout/Footer.php');
    ?>