<?php   
  $page = "users";  
  include('layout/Home.php');
  include('layout/Navtop.php'); 
  include('layout/Sidebar.php');
?>
<body>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Users</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Management Akun</a></div>
              <div class="breadcrumb-item">Users</div>
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                  <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Users </button>
                  </div>
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#tambah" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-md data">
                        <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Detail Akun</th>
                          <th>Status Akun</th>
                          <th>Tanggal Daftar</th>
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $data_user=showUsers($connect,"role_id","2");
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
          <!-- modal tambah -->
          <div class="modal fade"  role="dialog" id="tambah">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="controller/MasterAkunController.php" method="post" >
                <div class="row">
                  <input id="role" type="hidden" class="form-control" name="role" value="2">
                  <input id="akun" type="hidden" class="form-control" name="akun" value="users">
                    <div class="form-group col-12">
                      <label for="nama">Nama Lengkap <span style="color: red; font-weight: bold">*</span></label>
                      <input id="nama" type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group col-12">
                      <label for="nomer">No Hp <span style="color: red; font-weight: bold">*</span></label>
                      <input id="nomer" type="number" class="form-control" name="nomer" required>
                    </div>
                    <div class="form-group  col-12">
                      <label for="username">Username <span style="color: red; font-weight: bold">*</span></label>
                      <input id="username" type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group  col-12">
                      <label for="email">Email <span style="color: red; font-weight: bold">*</span></label>
                      <input id="email" type="email" class="form-control" name="email" required>
                  </div>
                    <div class="form-group col-12">
                      <label for="password" class="d-block">Password <span style="color: red; font-weight: bold">*</span></label>
                      <input oninput="isCorrect()" id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                    </div>
                    <div class="form-group col-12">
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
                  </div>
              <div class="modal-footer">
                <button type="submit" name="simpan" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal tambah -->
      <!-- modal ubah -->
      <div class="modal fade"  role="dialog" id="ubah">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ubah Data </h5>
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
                <button type="submit" name="ubah" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal ubah -->
     <!-- modal hapus -->
     <div class="modal fade"  role="dialog" id="hapus">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Data </h5>
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
                <button type="submit" name="hapus" value="hapus" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal hapus -->
     
  <?php   
  include('layout/Footer.php');
  include('layout/SweetAlert.php');
?>
     