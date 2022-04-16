<?php
include('../connect.php');
?>

<?php
$encrypted_txt = encrypt_decrypt('decrypt', $_GET['detail']);
$data_art_arr = showArtikel($connect, "id", $encrypted_txt);
$data_art = $data_art_arr[0];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../front-assets/bs5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../front-assets/css/navbar.css">
    <link rel="stylesheet" href="../front-assets/css/theme.css">
    <link rel="stylesheet" href="../front-assets/css/body.css">
    <link rel="stylesheet" href="../front-assets/css/responsive.css">
    <link rel="stylesheet" href="../front-assets/icon/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/sweetalert2.css">

    <title>Banjarmasin Air Traffic Services Information System</title>
    <link rel="icon" href="../images/airnav.png" type="image/icon type">
</head>

<body>
    <img src="../front-assets/assets/header-vector.svg" class="position-absolute top-0 end-0 d-none d-lg-block">
    <img src="../front-assets/assets/header-vector.svg" width="100%" class="display-header">

    <!--============================================================================ NAVBAR ==========================================================-->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../front-assets/airnav.png" alt="" width="50%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="nav nav-pills navbar-position">
                    <li class="nav-item me-2">
                        <a class="nav-link link-navbar" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-navbar" href="../index.php#document">Documents</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-navbar" href="../index.php#ojt">Collection OJT</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link active bg-active  link-navbar" href="../index.php#article">Article</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-navbar" href="../index.php#about">About</a>
                    </li>
                </ul>
                <ul class="nav nav-pills">
                    <li class="nav-item me-2">
                        <a href="../admin/login.php" class="nav-link btn-custom rounded shadow" id="btn-sign">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--============================================================================ 3. Article ==========================================================-->
    <div id="article" class="container">
        <br><br><br>
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="h2 text-center bold-2 mt-5">Detail Article</h1>
                <div class="col-lg-12 col-md-6 my-2">
                    <div class="card border-0 shadow">
                        <div class="card-footer">
                            <center>
                                <p class="h5" style="font-weight: bold;"><?= $data_art['judul'] ?></p>
                            </center>
                            <center><img src="../files/artikel/<?= $data_art['gambar_artikel'] ?>" width="50%"></center>
                            <p style="color:grey; text-align:left; font-size:small;">Di posting pada <?= date_format(date_create($data_art['created_at']), "d/m/Y"); ?></p>
                            <p class="fw-light fst-italic"><?= $data_art['isi'] ?></p>
                        </div>
                        <div class="card-footer">
                            <form action="../admin/controller/ArtikelController.php" enctype="multipart/form-data" method="POST">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Nama Lengkap <span style=" color: red;">*</span></label>
                                    </div>
                                    <div class=" col-md-4">
                                        <input class="form-control" type="text" id="id_artikel" name="id_artikel" value="<?= $encrypted_txt ?>" hidden>
                                        <input class="form-control" type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap anda" required>
                                    </div>
                                    <div class="col-md-1 ml-5"><label>Email <span style="color: red;">*</span></label></div>
                                    <div class=" col-md-4">
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Masukkan email anda" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Komentar <span style="color:red">*</span></label>
                                        <textarea class="form-control" id="komentar" name="komentar" placeholder="Masukkan komentar anda" rows="4" required></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button class="btn btn-md btn-success" type="submit" name="simpan_komentar" value="Simpan" refresh>Send <i class="fa fa-paper-plane" style="color: white;"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 my-2" style="padding-bottom:50px">
                    <div class="card border-0 shadow">
                        <div class="card-footer">
                            <?php
                            $id = $encrypted_txt;
                            $komentar = showKomentar($connect, "id_artikel", $id);
                            ?>
                            <center>
                                <p class="h5" style="font-weight: bold;">Komentar (<?php echo sizeof($komentar); ?> )</p>
                            </center>
                            <div class="col-lg-12" style="height: 550px;overflow-x: hidden;overflow-y: auto;">
                                <?php
                                foreach ($komentar as $data) {
                                ?>
                                    <div class="row">
                                        <div class="card">
                                            <div class="d-flex">
                                                <img src="../front-assets/assets/avatar/avatar1.svg">
                                                <p class="mt-3 ms-3" style="font-weight: bold;"><?= $data['nama'] ?><br><span style="color: grey; font-size:small"> <?= $data['created_at'] ?></span></p>
                                            </div>
                                            <p class="mt-3 ms-3"><?= $data['komentar'] ?></p>
                                        </div>
                                    </div>
                                    <br>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--============================================================================ 5. Footer ==========================================================-->
    <div class="bg-clients">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between">
                    <span class="color-theme mb-3">Copyright © 2022 Design By ABRE</span>
                    <span class="color-theme mb-3 d-none d-lg-block d-md-block" style="font-weight:bold"> Banjarmasin Air Traffic Services Information System</span>
                </div>
            </div>
        </div>
        <br>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../front-assets/bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="../front-assets/jquery/dist/jquery.min.js"></script>
    <script src="../front-assets/js/onscroll.js"></script>
    <script src="../front-assets/js/popupimage.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/sweetalert2.js"></script>
    <?php include('../admin/layout/SweetAlert.php'); ?>
</body>

</html>