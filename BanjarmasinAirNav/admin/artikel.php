<?php
  $page = "artikel";
  include('layout/Home.php');
  include('layout/Navtop.php');
  include('layout/Sidebar.php');
?>

<body>
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Artikel</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Artikel</a></div>
        </div>
      </div>
      <!-- Main Content -->
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Artikel</button>
              </div>
              <div class="card-header">
                <button data-toggle="modal" data-target="#tambah_artikel" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-md data">
                    <thead align="center">
                      <tr>
                        <th>No</th>
                        <th>Users</th>
                        <th width="50%">Artikel</th>
                        <th>Gambar</th>
                        <th width="30%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody align="center">
                      <?php
                       if($_SESSION['role'] == 1){
                        $artikel = showArtikel($connect, "all", "");
                      } else {
                        $artikel=showArtikel($connect,"id_akun", $_SESSION['idUsers']);
                      }
                      $no = 1;
                      foreach ($artikel as $data) {
                      ?>
                        <tr>
                          <td><?= $no++ ?>.</td>
                          <td><?= $data['nama']; ?></td>
                          <td>
                            <b>Judul</b><br>
                            <?= $data['judul']; ?><br>
                            <b>Isi</b><br>
                            <?= substr($data['isi'], 0, 200); ?>
                          </td>
                          <td><a href="../files/artikel/<?= $data['gambar_artikel']; ?>" target="_blank"><?= $data['gambar_artikel']; ?></a></td>
                          <td align="center">
                            <button data-toggle="modal" data-target="#ubah_artikel" data-id="<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>
                            <button data-toggle="modal" data-target="#hapus_artikel" data-id="<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
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
    <div class="modal fade " role="dialog" id="tambah_artikel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="controller/ArtikelController.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" class="form-control" id="id_akun" name="id_akun" value="<?= $_SESSION['idUsers'] ?>">
                <div class="form-group col-12">
                  <label for="judul"> Judul <span style="color: red; font-weight: bold">*</span></label>
                  <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="form-group col-12">
                  <label>Isi Artikel <span style="color: red; font-weight: bold">*</span></label>
                  <textarea style="height:250px" class="form-control" id="isi" name="isi" required></textarea>
                </div>
                <div class="form-group col-12">
                  <label for="nama"> Gambar </label>
                  <input type="file" class="form-control" id="artikel" name="artikel" accept="image/*">
                  <!-- <div class="custom-file">
                    <input type="file" class="custom-file-input" id="artikel" name="artikel" accept="image/*">
                    <label class="custom-file-label" for="dokumen">Pilih Gambar</label>
                  </div> -->
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="simpan_artikel" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end modal tambah -->
  </div>
  <!-- modal ubah -->
  <div class="modal fade" role="dialog" id="ubah_artikel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/ArtikelController.php" method="post" enctype="multipart/form-data">
            <div class="hasil-data">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="ubah_artikel" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal ubah -->
  <!-- modal hapus -->
  <div class="modal fade" role="dialog" id="hapus_artikel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/ArtikelController.php" method="post">
            <div class="hasil-data">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="hapus_artikel" value="hapus_artikel" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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