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
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard </a></div>
              <div class="breadcrumb-item">Profile</div>
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
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <input type="hidden" class="form-control" name="id_akun" value="<?= $data['id'] ?>" required>
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>No Hp</label>
                            <input type="number" class="form-control" name="nomer" value="<?= $data['no_hp'] ?>" required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" required="">
                          </div>
                          <div class="form-group col-12">
                            <label for="nama"> Foto Profile </label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    <button type="submit" name="update_profile" value="Simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>
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