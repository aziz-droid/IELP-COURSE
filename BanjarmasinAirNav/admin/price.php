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
            <h1>Price</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Price</div>
            </div>
          </div>
      <!-- Main Content -->
          <div class="section-body">
            <div class="row">
              <div class="col-12">

              
                <div class="card card-primary">
                
                  <div class="card-body">

                  <p>
                  <label>Deskripsi:</label>
                  </p>
            <textarea style="width:700px; height: 200px" name="biografi"></textarea>
        
                  <div class="table-responsive">
                      <table class="table table-bordered table-striped table-md data">
                        <thead align="center">
                        <tr>
                          <th rowspan="2">No</th>
                          <th rowspan="2" >Mata Pelajaran</th>
                          <th colspan="2">Jam Pelajaran</th>
                          <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                          <th>t</th>
                          <th>p</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?= $no++ ?>.</td>
                          <td> mata pelajaran</td>
                          <td align="center">
                            30 jam
                          </td>
                          <td align="center">
                            30 jam
                          </td>
                          <td align="center"><button data-toggle="modal" data-target="#ubah" data-id="<?= $data['id']?>" data-akun="users" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>  <button data-toggle="modal" data-target="#hapus"  data-id="<?= $data['id']?>" data-akun="users" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></td>
                        </tr>
                        <?php
                             
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
      