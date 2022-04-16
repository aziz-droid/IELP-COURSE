<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <?php if($_SESSION['role'] == 1){ ?>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifikasi Akun Belum Diverifikasi
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
              <?php
                  $data_user=showUsers($connect,"status_akun",0);
                    $no=1;
                    foreach($data_user as $data ){
              ?>
                <a href="verifikasiBelum.php" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-user-times"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Nama : <?= $data['nama']; ?><br>
                    Username : <?= $data['username']; ?><br>
                    Email : <?= $data['email']; ?><br>
                    No. Hp : <?= $data['no_hp']; ?>
                    <div class="time"><?= $data['created_at'] ?></div>
                  </div>
                </a>
                <?php } ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="verifikasiBelum.php">Lihat Semua <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <?php
          }
            $data_user=showUsers($connect,"id",$_SESSION['idUsers']);
            $data = $data_user[0];
          ?>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <?php if(!empty($data['foto_profil'])){ ?>
                  <img alt="image" src="../files/profile/<?= $data['foto_profil'] ?>" class="rounded-circle mr-1">
            <?php } else { ?>
              <img alt="image" src="../images/user2.png" class="rounded-circle mr-1">
            <?php } ?>
            <div class="d-sm-none d-lg-inline-block"><?= $data['nama']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Menu</div>
              <a href="profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="ubahPassword.php" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Ubah Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>