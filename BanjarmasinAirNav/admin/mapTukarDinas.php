<?php 
  $page = "map";  
  include('layout/Home.php');
  include('layout/Navtop.php'); 
  include('layout/Sidebar.php');
?>
<body>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Tukar Dinas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Form Tukar Dinas</a></div>
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                  <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Form Tukar Dinas </button>
                  </div>
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#tambah_map" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-md data">
                        <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Nama Pembuat Form</th>
                          <th>Alasan</th>
                          <th>Status Verifikasi</th>
                          <th width="40%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       if($_SESSION['role'] == 1){
                            $data_maps=showMap($connect,"all","");
                        } else {
                            $data_maps=showMap($connect,"id_akun", $_SESSION['idUsers']);
                        }
                          $no=1;
                          foreach($data_maps as $data ){
                      ?>
                        <tr>
                          <td><?= $no++ ?>.</td>
                          <td>
                           Nama : <?= $data['nama']; ?><br>
                          </td>
                          <td>
                               <?= $data['alasan']; ?><br>
                          </td>
                          <td align="center">
                            <?php if($data['status_verifikasi'] == 1){ ?>
                                <div class="badge badge-info">Pengajuan</div>
                            <?php }elseif($data['status_verifikasi'] == 2){ ?>
                                <div class="badge badge-success">Verifikasi disetujui</div>
                            <?php }elseif($data['status_verifikasi'] == 3){ ?>
                                <div class="badge badge-danger">Verifikasi Ditolak</div>
                            <?php }else{ ?>
                                <div class="badge badge-warning">Draft</div>
                            <?php } ?>
                            <br> Tgl. Verifikasi : <?= $data['tgl_verifikasi'] ?? 'Belum verifikasi' ?>
                          </td>
                          <td align="center">
                            <?php 
                              $encrypted_txt = encrypt_decrypt('encrypt',$data['id']);
                            ?>
                             <?php if($data['status_verifikasi'] != 2 && $data['status_verifikasi'] != 1){ ?>
                            <button data-toggle="modal" data-target="#mapPengajuan" data-id="<?= $data['id']?>" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Ajukan</button> 
                            <?php } ?>
                            <a href="formTukarDinas.php?detail=<?= $encrypted_txt; ?>" target="_blank" class="btn btn-warning btn-sm" ><i class="fas fa-eye"></i> Detail</a> 
                            <button data-toggle="modal" data-target="#ubah_map" data-id="<?= $data['id']?>"  class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>  
                            <button data-toggle="modal" data-target="#hapus_map"  data-id="<?= $data['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></td>
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
          <div class="modal fade"  role="dialog" id="tambah_map">
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
                  <input id="id_akun" type="hidden" class="form-control" name="id_akun" value="<?= $_SESSION['idUsers'] ?>">
                    <div class="form-group col-12">
                      <label for="alasan">Alasan <span style="color: red; font-weight: bold">*</span></label>
                      <textarea id="alasan" name="alasan" style="height:100px"  class="form-control"  required></textarea>
                    </div>
                  </div>
                  </div>
              <div class="modal-footer">
                <button type="submit" name="simpan_map" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal tambah -->
      </div>
        
      <!-- modal ubah -->
      <div class="modal fade"  role="dialog" id="ubah_map">
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
                <button type="submit" name="ubah_map" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal ubah -->
     <!-- modal hapus -->
     <div class="modal fade" role="dialog" id="hapus_map">
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
                <button type="submit" name="hapus_map" value="hapus_map" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal hapus -->
     <!-- modal pengajuan -->
     <div class="modal fade"  role="dialog" id="mapPengajuan">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Pengajuan Data </h5>
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
                <button type="submit" name="mapPengajuan" value="mapPengajuan" class="btn btn-success"><i class="fas fa-paper-plane"></i> Ajukan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal pengajuan -->
     
  <?php   
  include('layout/Footer.php');
  include('layout/SweetAlert.php');
?>
     