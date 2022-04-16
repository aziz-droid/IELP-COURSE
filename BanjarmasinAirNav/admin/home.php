<?php   
  // session_start();
  $page = "Home";
  include('layout/Home.php');
  include('layout/Navtop.php'); 
  include('layout/Sidebar.php');

?>

<body>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>IELP TRAINING FOR POLTEKBANG SURABAYA</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <!-- <div class="breadcrumb-item">Profile</div> -->
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                  <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Dashboard</button>
                  </div>
                  <div class="card-body">
                      <center>
                        <img src="../images/logo.png" style="margin-bottom:30px">
                        <h5 style="color:black">IELP TRAINING FOR POLTEKBANG SURABAYA</h5>
                      </center>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
  <?php   
    include('layout/Footer.php');
    include('layout/SweetAlert.php');
  ?>
     