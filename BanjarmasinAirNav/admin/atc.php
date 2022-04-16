<?php
$page = "atc";
include('layout/Home.php');
include('layout/Navtop.php');
include('layout/Sidebar.php');

?>

<body>
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah ATC Log Book</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Tambah Log Book</a></div>
        </div>
      </div>
      <!-- Main Content -->
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Tambah ATC Log Book</button>
              </div>
              <div class="card-body">
              <ul class="nav nav-tabs" id="myTab3" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="atc-tab2" data-toggle="tab" href="#atc" role="tab" aria-controls="atc" aria-selected="true">Data ATC</a>
                 </li>
                 <?php if ($_SESSION['role'] == 1) { ?>
                <li class="nav-item">
                  <a class="nav-link" id="keterangan-tab2" data-toggle="tab" href="#keterangan" role="tab" aria-controls="keterangan" aria-selected="false">Keterangan ATC</a>
                 </li>
                 <?php } ?>
              </ul>
              <div class="tab-content tab-bordered" id="myTab4Content">
                <div class="tab-pane fade show active" id="atc" role="tabpanel" aria-labelledby="atc-tab2">
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#tambah_atc" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-md data">
                      <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Users</th>
                          <th width="30%">Detail ATC Log Book</th>
                          <?php if ($_SESSION['role'] == 1) { ?>
                            <th>Gambar</th>
                          <?php }  ?>
                          <th width="30%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                        <?php
                        if ($_SESSION['role'] == 1) {
                          $atc = showAtc($connect, "all", "");
                        } else {
                          $atc = showAtc($connect, "id_akun", $_SESSION['idUsers']);
                        }
                        $no = 1;
                        foreach ($atc as $data) {
                        ?>
                          <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data['nama']; ?></td>
                            <td align="left">
                              DNS : <?= $data['dns']; ?><br>
                              CTR : <?= $data['ctr']; ?><br>
                              ASS : <?= $data['ass']; ?><br>
                              Tanggal : <?= $data['tanggal']; ?>-<?= $data['bulan']; ?>-<?= $data['tahun']; ?><br>
                            </td>
                            <?php if ($_SESSION['role'] == 1) { ?>
                              <td>
                                <?php if (!empty($data['gambar'])) { ?>
                                  <a href="../files/atc/<?= $data['gambar']; ?>" target="_blank"><?= $data['gambar']; ?></a>
                                <?php
                                }
                                ?>
                              </td>
                            <?php }  ?>
                            <td align="center">
                              <button data-toggle="modal" data-target="#ubah_atc" data-id="<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>
                              <button data-toggle="modal" data-target="#hapus_atc" data-id="<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <div class="tab-pane fade" id="keterangan" role="tabpanel" aria-labelledby="keterangan-tab2">
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#tambah_keterangan_atc" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah</button>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-md data">
                      <thead align="center">
                        <tr>
                          <th>No</th>
                          <th>Users</th>
                          <th>Keterangan</th>
                          <th>Status</th>
                          <th>Detail Data</th>
                          <th width="30%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                        <?php
                          $keterangan_atc = showKeteranganAtc($connect, "all","","");
                        $no = 1;
                        foreach ($keterangan_atc as $data) {
                        ?>
                          <tr>
                            <td><?= $no++ ?>.</td>
                            <td align="center"><?= $data['nama']; ?></td>
                            <td align="center"> <?= $data['keterangan']; ?></td>
                            <td align="center"><?= $data['status']; ?></td>
                            <td align="center"> Bulan = <?= $data['bulan']; ?><br> Tahun = <?= $data['tahun']; ?></td>
                            <td align="center">
                              <button data-toggle="modal" data-target="#ubah_keterangan_atc" data-id="<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Ubah</button>
                              <button data-toggle="modal" data-target="#hapus_keterangan_atc" data-id="<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
              </div>
                
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- modal keterangan atc tambah -->
    <div class="modal fade" role="dialog" id="tambah_keterangan_atc">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="controller/KeteranganAtcController.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-12">
                  <label for="nama">Users <span style="color: red; font-weight: bold">*</span></label>
                  <select class="custom-select" id="id_users" name="id_users" required>
                    <option value="" selected disabled>Pilih Users</option>
                    <?php
                    $data_user = showUsers($connect, "users_atc", "");
                    foreach ($data_user as $data) {
                    ?>
                      <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-12">
                  <label for="nama">Bulan <span style="color: red; font-weight: bold">*</span></label>
                  <select class="custom-select" id="bulan" name="bulan" required>
                    <option value="" selected disabled>Pilih Bulan</option>
                    <?php for($i=1 ; $i<=12 ; $i++){ ?>
                        <option value="<?= $i ?>">Bulan <?= $i ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group col-12">
                  <label for="keterangan"> Keterangan </label>
                  <textarea type="text" class="form-control" style="height:100px" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
                </div>
                <div class="form-group col-12">
                  <label for="status"> Status <span style="color: red; font-weight: bold">*</span></label>
                  <input type="text" step="any" class="form-control" id="status" name="status" placeholder="Status" required>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="simpan_keterangan_atc" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end modal keterangan atc tambah -->
  </div>
  <!-- modal keterangan atc ubah -->
  <div class="modal fade" role="dialog" id="ubah_keterangan_atc">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/KeteranganAtcController.php" method="post" enctype="multipart/form-data">
            <div class="hasil-data">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="ubah_keterangan_atc" value="ubah_keterangan_atc" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal keterangan atc ubah -->
  <!-- modal keterangan atc hapus -->
  <div class="modal fade" role="dialog" id="hapus_keterangan_atc">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/keteranganAtcController.php" method="post">
            <div class="hasil-data">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="hapus_keterangan_atc" value="hapus_keterangan_atc" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal keterangan atc hapus -->
    <!-- modal tambah -->
    <div class="modal fade" role="dialog" id="tambah_atc">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="controller/AtcController.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <?php if($_SESSION['role'] == 1) { ?>
                <div class="form-group col-12">
                  <label for="nama">Users <span style="color: red; font-weight: bold">*</span></label>
                  <select class="custom-select" id="id_akun" name="id_akun" required>
                    <option value="" selected disabled>Pilih Users</option>
                    <?php
                    $data_user = showUsers($connect, "users_atc", "");
                    foreach ($data_user as $data) {
                    ?>
                      <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <?php }else { ?>
                  <input type="hidden" class="form-control" id="id_akun" name="id_akun" value="<?= $_SESSION['idUsers'] ?>">
                <?php } ?>
                <div class="form-group col-12">
                  <label for="dns"> DNS <span style="color: red; font-weight: bold">*</span></label>
                  <input type="text" class="form-control" id="dns" name="dns" placeholder="DNS" required>
                </div>
                <div class="form-group col-12">
                  <label for="ctr"> CTR </label>
                  <input type="number" step="any" class="form-control" id="ctr" name="ctr" placeholder="CTR">
                </div>
                <div class="form-group col-12">
                  <label for="ass"> ASS </label>
                  <input type="number" step="any" class="form-control" id="ass" name="ass" placeholder="ASS">
                </div>
                <div class="form-group col-12">
                  <label for="tgl"> Tanggal <span style="color: red; font-weight: bold">*</span></label>
                  <input type="date" class="form-control" id="tgl" name="tgl" required>
                </div>
                <div class="form-group col-12">
                  <label for="gambar"> Gambar </label>
                  <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="simpan_atc" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end modal tambah -->
  </div>
  <!-- modal ubah -->
  <div class="modal fade" role="dialog" id="ubah_atc">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/AtcController.php" method="post" enctype="multipart/form-data">
            <div class="hasil-data">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="ubah_atc" value="Simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal ubah -->
  <!-- modal hapus -->
  <div class="modal fade" role="dialog" id="hapus_atc">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="controller/AtcController.php" method="post">
            <div class="hasil-data">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="hapus_atc" value="hapus_atc" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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