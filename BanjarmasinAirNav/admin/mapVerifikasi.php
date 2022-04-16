<?php 
  $page = "mapverifikasi";  
  include('layout/Home.php');
  include('layout/Navtop.php'); 
  include('layout/Sidebar.php');
?>
<body>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Verifikasi Tukar Dinas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Verifikasi Tukar Dinas</a></div>
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                  <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Verifikasi Tukar Dinas </button>
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
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            $data_maps=showMap($connect,"verifikasi","");
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
                            <br> Tgl. Verifikasi : <?=  $data['tgl_verifikasi'] ?? 'Belum diverifikasi' ?>
                          </td>
                          <td align="center">
                             <?php if($data['status_verifikasi'] == 1){ ?>
                            <button data-toggle="modal" data-target="#mapSetuju" data-id="<?= $data['id']?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Setuju</button>
                            <button data-toggle="modal" data-target="#mapTolak" data-id="<?= $data['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</button> 
                            <?php } else { ?>
                                 Tidak Ada Aksi
                            <?php }  ?>
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
     <!-- modal setuju -->
     <div class="modal fade"  role="dialog" id="mapSetuju">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Setujui Data </h5>
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
                <button type="submit" name="mapSetuju" value="mapSetuju" class="btn btn-success"><i class="fas fa-check"></i> Setuju</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal setuju -->
     <!-- modal tolak -->
     <div class="modal fade"  role="dialog" id="mapTolak">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tolak Data </h5>
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
                <button type="submit" name="mapTolak" value="mapTolak" class="btn btn-danger"><i class="fas fa-times"></i> Tolak</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </form>     
            </div>
          </div>
        </div>
    <!-- end modal tolak -->
     
  <?php   
  include('layout/Footer.php');
  include('layout/SweetAlert.php');
?>
     