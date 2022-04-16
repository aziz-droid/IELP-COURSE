<?php   
 $page = "verifikasisudah"; 
  include('layout/Home.php');
  include('layout/Navtop.php'); 
  include('layout/Sidebar.php');
?>
<body>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Sudah Verifikasi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Verifikasi Akun</a></div>
              <div class="breadcrumb-item">Sudah Verifikasi</div>
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                      <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Sudah Verifikasi </button><br>
                    </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-md data">
                        <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Detail Akun</th>
                          <th>Program</th>
                          <th>Tanggal Daftar</th>
                          <th>Tanggal Expired</th>
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $data_user=showUsers($connect,"status_akun",1);
                          $no=1;
                          foreach($data_user as $data ){
                      ?>
                        <tr>
                          <td><?= $no++ ?>.</td>
                          <td>
                           Nama : <?= $data['nama']; ?><br>
                           Username : <?= $data['username']; ?><br>
                           Email : <?= $data['email']; ?><br>
                           No. Hp : <?= $data['no_hp']; ?>
                          </td>
                          <td align="center">
                            <?php if($data['status_akun'] == 1){ ?>
                                <div class="badge badge-success">Sudah Verifikasi</div>
                            <?php }else{ ?>
                                <div class="badge badge-danger">Belum Verifikasi</div>
                            <?php } ?>
                          </td>
                          <td align="center"><?= $data['created_at'] ?></td>
                          <td align="center"><?= $data['tgl_verifikasi'] ?></td>
                          <td align="center"><button data-toggle="modal" data-target="#unverifikasi" data-id="<?= $data['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Unverifikasi</button> </td>
                        </tr>
                        <?php
                             }
                          ?>
                        </tbody>
                      </table>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      
      <!-- modal unverifikasi -->
      <div class="modal fade"  role="dialog" id="unverifikasi">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Unverifikasi Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="controller/MasterAkunController.php" method="post" >
                <div class="hasil-data">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="unverifikasi" value="unverifikasi" class="btn btn-danger"><i class="fas fa-times"></i> Unverifikasi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal unverifikasi -->

  <?php   
  include('layout/Footer.php');
  include('layout/SweetAlert.php');
?>
     