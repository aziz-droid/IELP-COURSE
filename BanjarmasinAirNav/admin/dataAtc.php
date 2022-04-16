<?php
$page = "dataatc";
include('layout/Home.php');
include('layout/Navtop.php');
include('layout/Sidebar.php');

?>

<body>
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data ATC Log Book</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Data ATC Log Book</a></div>
        </div>
      </div>
      <!-- Main Content -->
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Data ATC Log Book</button>
              </div>
              <div class="card-header">
                <!--  table -->
                <div style="overflow-x:auto;">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <?php 
                    for($i=1 ; $i<=12 ; $i++){
                            $active = "";
                            if($i == date('m')*1){
                                $active = "active";
                            }
                      ?>
                     <li class="nav-item">
                        <a class="nav-link <?= $active ?>" id="<?= $i ?>" data-toggle="tab" href="#navtabs<?= $i ?>" role="tab" aria-controls="<?= $i ?>">  Bulan <?= $i ?></a>
                    </li>
                    <?php
                          }
                    ?>
                </ul>
                <div class="tab-content" id="myTab3Content">
                <?php 
                    for($i=1 ; $i<=12 ; $i++){
                            $active = "";
                            if($i == date('m')*1){
                                $active = "show active";
                            }
                            $hari = dates_month($i, date('Y'));
                          // $query_date = date('Y-m-d');
                          
                          // // First day of the month.
                          // $begin = date('01', strtotime($query_date));
                          
                          // // Last day of the month.
                          // $end = date('t', strtotime($query_date));
                      ?>
                      <div class="tab-pane fade <?= $active ?>" id="navtabs<?= $i ?>" role="tabpanel" aria-labelledby="<?= $i ?>">
                      <table class="table table-bordered">
                        <thead align="center">
                          <tr>
                            <th style="min-width: 300px;" class="fixed freeze">Tanggal</th>
                            <?php
                            // foreach (range($begin, $end) as $number) {
                              foreach ($hari as $number) {
                            ?>
                              <th colspan="3" class="fixed freeze_vertical"><?= $number; ?></th>
                            <?php
                            }
                            ?>
                            <th colspan="2">TOTAL</th>
                            <th rowspan="2">HARI KERJA</th>
                            <th rowspan="2">KETERANGAN</th>
                            <th rowspan="2">STATUS</th>
                          </tr>
                          <tr>
                            <th class="fixed freeze_horizontal">Nama</th>
                            <?php
                            foreach ($hari as $number) {
                            ?>
                              <th class="fixed freeze_vertical">DNS</th>
                              <th class="fixed freeze_vertical">CTR</th>
                              <th class="fixed freeze_vertical">ASS</th>
                            <?php
                            }
                            ?>
                            <th>CTR</th>
                            <th>ASS</th>
                          </tr>
                        </thead>
                        <tbody align="center">
                          <?php
                          $data_user = showUsers($connect, "users_atc", "");
                          $no = 1;
                          foreach ($data_user as $data) {
                          ?>
                            <tr>
                              <td align="left" class="fixed freeze_horizontal"><?= $data['nama']; ?> </td>
                              <?php
                              foreach ($hari as $number) {
                                $act = showAtcDetail($connect, "id_akun", $data['id'], $number, $i);
                                if (!empty($act)) {
                                  foreach ($act as $datas) {
                              ?>
                                    <td align="left"><?= $datas['dns']; ?></td>
                                    <td align="left"><?= $datas['ctr']; ?></td>
                                    <td align="left"><?= $datas['ass']; ?></td>
                                  <?php
                                  }
                                } else { ?>
                                  <td align="left"></td>
                                  <td align="left"></td>
                                  <td align="left"></td>
                              <?php
                                }
                              }
                              $keterangan_atc = showKeteranganAtc($connect,'id_users',$data['id'],$i);
                              if(!empty($keterangan_atc)){
                                $data_keterangan = $keterangan_atc[0];
                              } else{
                                $data_keterangan = null;
                              }
                              ?>
                                <td align="left"><?= $users_ctr = showAtcTotalNew($connect,'users_ctr',$i,$data['id']); ?></td>
                                <td align="left"><?= $users_ass = showAtcTotalNew($connect,'users_ass',$i,$data['id']); ?></td>
                                <td align="left"><?= $users_hari_kerja = showAtcTotalNew($connect,'users_hari_kerja',$i,$data['id']); ?></td>
                                <td align="left"><?= $data_keterangan['keterangan'] ?? ''; ?></td>
                                <td align="left"><?= $data_keterangan['status']?? ''; ?></td>
                            </tr>
                          <?php
                          }
                          ?>
                          <tr>
                            <td>TOTAL PER HARI</td>
                            <?php foreach ($hari as $number) {
                              $data_ctr = showAtcTotal($connect, "ctr", $number, $i);
                              $data_ass = showAtcTotal($connect, "ass", $number, $i);
                            ?>
                              <td></td>
                              <td><?= $data_ctr; ?></td>
                              <td><?= $data_ass; ?></td>
                            <?php } ?>
                              <td><?= $all_ctr = showAtcTotalNew($connect,'all_ctr',$i,"null"); ?></td>
                              <td><?= $all_ctr = showAtcTotalNew($connect,'all_ass',$i,"null"); ?></td>
                              <td><?= $all_ctr = showAtcTotalNew($connect,'users_hari_kerja_all',$i,"null"); ?></td>
                              <td></td>
                              <td></td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                      <?php
                          }
                    ?>
                    </div>
                </div>
              </div>
              <!-- end table -->
  <?php
  include('layout/Footer.php');
  include('layout/SweetAlert.php');
  ?>