<?php include('connect.php') ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="front-assets/bs5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="front-assets/css/navbar.css">
    <link rel="stylesheet" href="front-assets/css/theme.css">
    <link rel="stylesheet" href="front-assets/css/body.css">
    <link rel="stylesheet" href="front-assets/css/responsive.css">
    <link rel="stylesheet" href="front-assets/icon/css/all.min.css">

    <link rel="stylesheet" href="assets/css/datatables.css">

    <link rel="icon" href="images/airnav.png" type="image/icon type">

    <title>Banjarmasin Air Traffic Services Information System</title>
</head>

<body>

    <!--============================================================================ BG ==============================================================-->
    <img src="front-assets/assets/header-bg.svg" class="position-absolute top-0 end-0 d-none d-lg-block">
    <img src="front-assets/assets/header-vector.svg" class="position-absolute img-header top-0 end-0 d-none d-lg-block">
    <img src="front-assets/assets/header-vector.svg" width="100%" class="display-header">

    <!--============================================================================ NAVBAR ==========================================================-->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="front-assets/airnav.png" alt="" width="50%">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="nav nav-pills navbar-position">
                    <li class="nav-item me-2">
                        <a class="nav-link active bg-active link-navbar" href="#home">Home</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-navbar" href="#documents">Documents</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-navbar" href="#ojt">Collection OJT</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-navbar" href="#article">Article</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link link-navbar" href="#about">About</a>
                    </li>
                </ul>
                <ul class="nav nav-pills">
                    <li class="nav-item me-2">
                        <a href="admin/login.php" class="nav-link btn-custom rounded shadow" id="btn-sign">Login</a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>

    <!--============================================================================1. Home ==========================================================-->
    <div id="home" class="container position-relative">

        <div class="display-space">
            <br><br><br>
        </div>

        <div class="row my-5">

            <div class="col-lg-6">
                <br><br><br><br>
                <div class="row">

                    <h1 class="bold-1 mt-5 mb-3 h2">Banjarmasin Air Traffic Services <br> Information System.
                    </h1>
                    <div class="d-flex my-4">
                        <a href="admin/register.php" class="btn btn-md btn-success rounded shadow">Register</a>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <br><br><br><br>
    <!--============================================================================2. Documents ==========================================================-->
    <div id="documents" class="container">
        <br>
        <div class="row justify-content-center my-5">
            <h1 class="h2 text-center bold-2 mt-2 mb-5">Documents</h1>
            <div id="accordion">
                <div class="card bg-light">
                    <div class="card-header" id="headingOne">

                        <h5 class="mb-0">
                            <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h6 style="font-weight:bold">SOP</h6>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <?php
                            $detail = showDetailDokumen($connect, "id_jenis_dokumen", "1");
                            $no = 1;
                            foreach ($detail as $data) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <img src="front-assets/pdf.png"> <?= $data['file']; ?>
                                    </div>
                                    <div class="col-md-2" style="margin-bottom: 10px;">
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-success rounded shadow" download><i class="fas fa-download"></i></a>
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-warning rounded shadow" target="_blank"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h6 style="font-weight:bold">ANNEXES</h6>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <?php
                            $detail = showDetailDokumen($connect, "id_jenis_dokumen", "3");
                            $no = 1;
                            foreach ($detail as $data) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <img src="front-assets/pdf.png"> <?= $data['file']; ?>
                                    </div>
                                    <div class="col-md-2" style="margin-bottom: 10px;">
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-success rounded shadow" download><i class="fas fa-download"></i></a>
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-warning rounded shadow" target="_blank"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h6 style="font-weight:bold">AIP</h6>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <?php
                            $detail = showDetailDokumen($connect, "id_jenis_dokumen", "2");
                            $no = 1;
                            foreach ($detail as $data) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <img src="front-assets/pdf.png"> <?= $data['file']; ?>
                                    </div>
                                    <div class="col-md-2" style="margin-bottom: 10px;">
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-success rounded shadow" download><i class="fas fa-download"></i></a>
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-warning rounded shadow" target="_blank"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <h6 style="font-weight:bold">LOCA</h6>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <?php
                            $detail = showDetailDokumen($connect, "id_jenis_dokumen", "5");
                            $no = 1;
                            foreach ($detail as $data) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <img src="front-assets/pdf.png"> <?= $data['file']; ?>
                                    </div>
                                    <div class="col-md-2" style="margin-bottom: 10px;">
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-success rounded shadow" download><i class="fas fa-download"></i></a>
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-warning rounded shadow" target="_blank"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <h6 style="font-weight:bold">RELATED DOCUMENTS</h6>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            <?php
                            $detail = showDetailDokumen($connect, "id_jenis_dokumen", "4");
                            $no = 1;
                            foreach ($detail as $data) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <img src="front-assets/pdf.png"> <?= $data['file']; ?>
                                    </div>
                                    <div class="col-md-2" style="margin-bottom: 10px;">
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-success rounded shadow" download><i class="fas fa-download"></i></a>
                                        <a href="files/dokumen/<?= $data['file']; ?>" class="btn btn-md btn-warning rounded shadow" target="_blank"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <!--============================================================================ 3. Collection OJT ==========================================================-->
    <div id="ojt" class="bg-clients">
        <br><br><br>
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="h2 text-center bold-2 text-white mb-1">Collection OJT</h1>
                <div class="col-lg-12 col-md-6 my-5">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered data">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Author</th>
                                            <th style="text-align: center;">File OJT</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ojt = showOjtDokumen($connect, "all", "");
                                        $no = 1;
                                        foreach ($ojt as $data) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no ?>.</td>
                                                <td align="center"><?= $data['nama'] ?></td>
                                                <td align="center"><?= $data['file'] ?></td>
                                                <td align="center">
                                                    <a href="files/ojt/<?= $data['file']; ?>" class="btn btn-sm btn-success" download><i class="fas fa-download"></i></a>
                                                    <a href="files/ojt/<?= $data['file']; ?>" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12"><br><br><br><br><br><br><br><br></div>
            </div>
        </div>
    </div>

    <!--============================================================================ 3. Article ==========================================================-->
    <div id="article" class="container">
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="h2 text-center  bold-2 mt-5">Article</h1>
                <center>
                    <p class="text-center bold-0 mt-2 mb-3  max-width-4x">These are some of the latest articles.</p>
                </center>
                <?php
                $artikel = showArtikel($connect, "terkini", "");
                foreach ($artikel as $data) {
                ?>
                    <div class="col-lg-4 col-md-6 my-5">
                        <div class="card border-0 shadow">

                            <div class="card-body">
                                <center>
                                    <p style="font-weight: bold;"><?= $data['judul'] ?></p>
                                </center>
                                <p style="color:grey; text-align:left; font-size:small;">Di posting pada <?= date_format(date_create($data['created_at']), "d/m/Y"); ?></p>
                                <?php
                                $encrypted_txt = encrypt_decrypt('encrypt', $data['id']);
                                ?>
                                <p class="fw-light fst-italic"><?= substr($data['isi'], 0, 200); ?>...<a href="user/detail_artikel.php?detail=<?= $encrypted_txt ?>" target="_blank">read complete</a></p>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex">
                                    <img src="images/user.png" width="15%">
                                    <p class="mt-3 ms-3"><?= $data['nama'] ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="col-lg-12 my-5 d-lg-flex d-md-flex justify-content-center">
                    <a href="user/all_artikel.php" class="btn btn-md btn-success">All Article</a>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <!--============================================================================ 4. About ==========================================================-->
    <div id="about" class="bg-clients">
        <br><br>
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="h2 text-center bold-2 mt-4" style="color:white">About</h1>
                <h1 class="h3 text-center bold-1" style="color:white">AirNav Indonesia</h1>
                <div class="col-lg-6">
                    <div class="row">
                        <h1 class="bold-2 mt-5 mb-3 h2" style="color:white">Follow us on Social Media
                            <hr>
                        </h1>
                        <a href="https://www.facebook.com/LPPNPI.AirNav/" style="font-size: 1.5rem;">
                            <i class="fab fa-facebook text-light"> Perum LPPNPI</i>
                        </a>
                        <a href="https://twitter.com/airnav_official" style="font-size: 1.5rem;">
                            <i class="fab fa-twitter text-light"> Airnav Indonesia</i>
                        </a>
                        <a href="https://www.instagram.com/airnavindonesia/" style="font-size: 1.5rem;">
                            <i class="fab fa-instagram text-light"> AirNav Indonesia Official</i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCEDk6KK7WPWrBp_BlVZbPFA" style="font-size: 1.5rem;">
                            <i class="fab fa-youtube text-light"> AirNav Indonesia</i>
                        </a>
                        <a href="https://www.linkedin.com/company/airnav-indonesia/" style="font-size: 1.5rem;">
                            <i class="fab fa-linkedin text-light"> AirNav Indonesia</i>
                        </a>
                    </div>


                </div>
                <div class="col-lg-6">
                    <img src="front-assets/assets/content-vector.svg" width="100%">
                </div>
                <div class="col-lg-12"><br><br></div>
            </div>
        </div>
    </div>

    <!--============================================================================ 4.1 Modal Popoup Image ==========================================================-->
    <div class="modal fade" role="dialog" id="imgmodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"></div>
            <img class="img-responsive" src="" id="show-img" width="100%">
        </div>
    </div>

    <!--============================================================================ 5. Footer ==========================================================-->
    <div class="container">
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
    <script src="front-assets/bs5/dist/js/bootstrap.bundle.js"></script>
    <script src="front-assets/jquery/dist/jquery.min.js"></script>
    <script src="front-assets/js/onscroll.js"></script>
    <script src="front-assets/js/popupimage.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <!-- Datatables -->
    <script type="text/javascript" src="assets/js/datatables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.data').DataTable();
        });
    </script>