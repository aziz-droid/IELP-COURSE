<?php   
  $page = "master";  
  include('layout/Home.php');
  include('layout/Navtop.php'); 
  include('layout/Sidebar.php');
?>
<body>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Jenis Dokumen</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Master</a></div>
              <div class="breadcrumb-item">Jenis Dokumen</div>
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                  <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Jenis Dokumen</button>
                  </div>
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#tambah_jd" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-md data">
                        <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th width="30%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                      <?php
                          $data_master=showMasterJD($connect,"all","");
                          $no=1;
                          foreach($data_master as $data ){
                      ?>
                        <tr>
                          <td><?= $no++ ?>.</td>
                          <td><?= $data['nama']; ?></td>
                          <td align="center">
                            <button data-toggle="modal" data-target="#ubah_jd" data-id="<?= $data['id']?>"  class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>  
                            <button data-toggle="modal" data-target="#hapus_jd"  data-id="<?= $data['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></td>
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
          <div class="modal fade"  role="dialog" id="tambah_jd">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="controller/DokumenController.php" method="post" >
                <div class="row">
                    <div class="form-group col-12">
                      <label for="nama">Nama <span style="color: red; font-weight: bold">*</span></label>
                      <input type="text" id="nama" name="nama" class="form-control"  required>
                    </div>
                  </div>
                  </div>
              <div class="modal-footer">
                <button type="submit" name="simpan_jd" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal tambah -->
      </div>
      <!-- modal ubah -->
      <div class="modal fade"  role="dialog" id="ubah_jd">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ubah Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="controller/DokumenController.php" method="post" >
                <div class="hasil-data">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="ubah_jd" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal ubah -->
     <!-- modal hapus -->
     <div class="modal fade" role="dialog" id="hapus_jd">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="controller/DokumenController.php" method="post" >
                <div class="hasil-data">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="hapus_jd" value="hapus_jd" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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
     