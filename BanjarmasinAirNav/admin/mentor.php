<?php   
  $page = "verifikasibelum";  
  include('layout/Home.php');
  include('layout/Navtop.php'); 
  include('layout/Sidebar.php');
?>
<body>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Mentor</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Mentor</div>
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                  <button data-toggle="modal" data-target="#tambah" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-md data">
                        <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Nama Lengkap</th>
                          <th>Biodata</th>
                          <th>foto</th>
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $data_user=showUsers($connect,"status_akun",0);
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
                          <td><button data-toggle="modal" data-target="#ubah" data-id="<?= $data['id']?>" data-akun="users" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>  <button data-toggle="modal" data-target="#hapus"  data-id="<?= $data['id']?>" data-akun="users" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></td>
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
      
      <!-- modal verifikasi -->
      <div class="modal fade"  role="dialog" id="verifikasi">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Verifikasi Data </h5>
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
                <button type="submit" name="verifikasi" value="verifikasi" class="btn btn-success"><i class="fas fa-check"></i> Verifikasi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal verifikasi -->

  <?php   
  include('layout/Footer.php');
  include('layout/SweetAlert.php');
?>
     