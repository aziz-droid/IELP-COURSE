<?php   
  include('layout/Home.php');
  include('layout/Navtop.php'); 
  include('layout/Sidebar.php');
?>
 <?php 
      $encrypted_txt = encrypt_decrypt('decrypt',$_GET['detail']);
      $data_map_arr=showMap($connect,"id", $encrypted_txt);
      $data_map=$data_map_arr[0];
    ?>
<body>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Data Tukar Dinas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Detail Form Tukar Dinas </a></div>
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                  <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Detail Form Tukar Dinas </button>
                  </div>
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#tambah_form" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    Nama Pembuat Form = <?= $data_map['nama']; ?><br>
                    Alasan = <?= $data_map['alasan']; ?><br> <br>
                      <table class="table table-striped table-md data">
                        <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Jadwal Asli</th>
                          <th>Perubahan</th>
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $data_form=showForm($connect,"id_map", $encrypted_txt);
                          $no=1;
                          foreach($data_form as $data ){
                      ?>
                        <tr>
                          <td><?= $no++ ?>.</td>
                          <td><?= $data['nama']; ?></td>
                          <td><?= $data['tanggal']; ?></td>
                          <td><?= $data['jadwal_asli']; ?></td>
                          <td><?= $data['perubahan']; ?></td>
                          <td><button data-toggle="modal" data-target="#ubah_form" data-id="<?= $data['id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>  <button data-toggle="modal" data-target="#hapus_form" data-id="<?= $data['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></td>
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
          <!-- modal tambah -->
          <div class="modal fade"  role="dialog" id="tambah_form">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="controller/MapTukarDinasController.php" method="post" >
                <div class="row">
                  <input id="id_map" type="hidden" class="form-control" name="id_map" value="<?= $encrypted_txt ?>">
                    <div class="form-group col-12">
                      <label for="nama">Nama <span style="color: red; font-weight: bold">*</span></label>
                      <input id="nama" type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group col-12">
                      <label for="tgl">Tanggal <span style="color: red; font-weight: bold">*</span></label>
                      <input id="tgl" type="date" class="form-control" name="tgl" required>
                    </div>
                    <div class="form-group  col-12">
                      <label for="jadwal">Jadwal Asli <span style="color: red; font-weight: bold">*</span></label>
                      <input id="jadwal" type="text" class="form-control" name="jadwal" required>
                    </div>
                    <div class="form-group  col-12">
                      <label for="perubahan">Perubahan <span style="color: red; font-weight: bold">*</span></label>
                      <input id="perubahan" type="perubahan" class="form-control" name="perubahan" required>
                  </div>
                  </div>
              <div class="modal-footer">
                <button type="submit" name="simpan_form" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal tambah -->
      </div>
        
      <!-- modal ubah -->
      <div class="modal fade"  role="dialog" id="ubah_form">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ubah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="controller/MapTukarDinasController.php" method="post" >
                <div class="hasil-data">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="ubah_form" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal ubah -->
     <!-- modal hapus -->
     <div class="modal fade"  role="dialog" id="hapus_form">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="controller/MapTukarDinasController.php" method="post" >
                <div class="hasil-data">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="hapus_form" value="hapus_form" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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
     