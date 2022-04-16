<?php
  $page = "dokumen";
  include('layout/Home.php');
  include('layout/Navtop.php');
  include('layout/Sidebar.php');
?>

<body>
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Dokumen</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dokumen</a></div>
        </div>
      </div>
      <!-- Main Content -->
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Data Dokumen</button>
              </div>
              <div class="card-header">
                <button data-toggle="modal" data-target="#tambah_dk" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-md data">
                    <thead align="center">
                      <tr>
                        <th>No</th>
                        <th>Nama File</th>
                        <th>File</th>
                        <th width="30%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody align="center">
                      <?php
                      $detail = showDetailDokumen($connect, "all", "");
                      $no = 1;
                      foreach ($detail as $data) {
                      ?>
                        <tr>
                          <td><?= $no++ ?>.</td>
                          <td><?= $data['nama']; ?></td>
                          <td><a href="../files/dokumen/<?= $data['file']; ?>" target="_blank"><?= $data['file']; ?></a></td>
                          <td align="center">
                            <button data-toggle="modal" data-target="#ubah_dk" data-id="<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>
                            <button data-toggle="modal" data-target="#hapus_dk" data-id="<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</button>
                          </td>
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
    <div class="modal fade" role="dialog" id="tambah_dk">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="controller/DokumenController.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-12">
                  <label for="nama">Jenis Dokumen <span style="color: red; font-weight: bold">*</span></label>
                  <select class="custom-select" id="id_jenis_dokumen" name="id_jenis_dokumen">
                    <option value="" selected disabled>Pilih Jenis Dokumen</option>
                    <?php
                    $master = showMasterJD($connect, "all", "");
                    foreach ($master as $data) {
                    ?>
                      <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-12">
                  <label for="nama"> Dokumen <span style="color: red; font-weight: bold">*</span></label>
                  <input type="file" class="form-control" id="dokumen" name="dokumen" required accept="application/pdf">
                  <!-- <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="dokumen" required accept="application/pdf">
                          <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div> -->
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="simpan_dk" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end modal tambah -->
  </div>
  <!-- modal ubah -->
  <div class="modal fade" role="dialog" id="ubah_dk">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/DokumenController.php" method="post" enctype="multipart/form-data">
            <div class="hasil-data">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="ubah_dk" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal ubah -->
  <!-- modal hapus -->
  <div class="modal fade" role="dialog" id="hapus_dk">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/DokumenController.php" method="post">
            <div class="hasil-data">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="hapus_dk" value="hapus_dk" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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