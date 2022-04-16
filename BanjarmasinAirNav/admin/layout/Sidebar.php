

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<div class="main-wrapper">
      <div class="navbar-bg"></div>
          <div class="main-sidebar">
            <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="#" onclick="dashboard();"><?= $_SESSION['role'] == 2 ? 'Users' : 'Admin' ; ?> </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="home.php">AR</a>
            </div>
            <ul class="sidebar-menu nav-pills" id="myTab">
                <li class="menu-header">Menu
                </li>
                <li class="<?= $page == 'Home' ? 'active' : '' ?>"><a href="home.php"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                <li><a href="class.php" ><i class="bi bi-book-fill"></i><span>Class</span></a></li>

                <?php if($_SESSION['role'] == 1){ ?>
                    <li class="nav-item dropdown <?= ($page == 'verifikasibelum' || $page == 'verifikasisudah' ) ? 'active' : '' ?>">
                        <a href="#" class="has-dropdown"><i class="fas fa-user-check"></i><span>Payment</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?= $page == 'verifikasibelum' ? 'active' : '' ?>"><a href="verifikasiBelum.php">Belum Verifikasi</a></li>
                            <li class="<?= $page == 'verifikasisudah' ? 'active' : '' ?>"><a href="verifikasiSudah.php">Sudah Verifikasi</a></li>
                        </ul>
                    </li>

                    <!-- TAMBAH SIDEBAR -->
                    
                
                   
                    <li class="nav-item dropdown <?= ($page == 'admin' || $page == 'users' ) ? 'active' : '' ?>">
                        <a href="#" class="has-dropdown"><i class="bi bi-globe2"></i><span>Management Page</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="price.php">Prices</a></li>
                            <li class="<?= $page == 'admin' ? 'active' : '' ?>"><a href="videos.php">Videos</a></li>
                            <li class="<?= $page == 'users' ? 'active' : '' ?>"><a href="mentor.php">Mentor</a></li>
                            
                        </ul>
                    </li>

                    <li class="nav-item dropdown <?= ($page == 'admin' || $page == 'users' ) ? 'active' : '' ?>">
                        <a href="#" class="has-dropdown"><i class="fas fa-users"></i><span>Management Akun</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?= $page == 'admin' ? 'active' : '' ?>"><a href="masterAdmin.php">Admin</a></li>
                            <li class="<?= $page == 'users' ? 'active' : '' ?>"><a href="masterUsers.php">Users</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="menu-header">Data</li>
                
             
               
                <?php if($_SESSION['role'] == 1){ ?>
                <li class="<?= $page == 'dokumen' ? 'active' : '' ?>"><a href="dokumen.php"><i class="fas fa-folder-open"></i><span>Data Dokumen</span></a></li>
                <?php } ?>
               
            </ul>
            </aside>
      </div>