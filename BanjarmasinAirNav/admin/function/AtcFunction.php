<?php

function addAtc($connect,$id_akun,$dns,$ctr,$ass,$gambar,$tanggal,$bulan,$tahun){
    if(!empty($ass) && !empty($ass)){
        $queri= "INSERT INTO log_book_detail(`id_akun`,`dns`,`ctr`,`ass`,`gambar`,`tanggal`,`bulan`,`tahun`)
        VALUES ('$id_akun','$dns','$ctr','$ass','$gambar','$tanggal','$bulan','$tahun')";
    } elseif(!empty($ass)){
        $queri= "INSERT INTO log_book_detail(`id_akun`,`dns`,`ass`,`gambar`,`tanggal`,`bulan`,`tahun`)
        VALUES ('$id_akun','$dns','$ass','$gambar','$tanggal','$bulan','$tahun')";
    } elseif(!empty($ctr)){
        $queri= "INSERT INTO log_book_detail(`id_akun`,`dns`,`ctr`,`gambar`,`tanggal`,`bulan`,`tahun`)
        VALUES ('$id_akun','$dns','$ctr','$gambar','$tanggal','$bulan','$tahun')";
    } else {
        $queri= "INSERT INTO log_book_detail(`id_akun`,`dns`,`gambar`,`tanggal`,`bulan`,`tahun`)
        VALUES ('$id_akun','$dns','$gambar','$tanggal','$bulan','$tahun')";
    }
    $process=mysqli_query($connect,$queri);
    if($process){
        return true;
      }
      return false;
  }

  
function updateAtc($connect,$where,$myvalue){
    $queri =" UPDATE log_book_detail SET";

    $par=array_keys($myvalue);

    
    for($a=0; $a<(sizeof($myvalue)-1);$a++){
        $queri = $queri." ".$par[$a]."= '".$myvalue[$par[$a]]."',";
    }

    $queri = $queri." ".$par[$a]."= '".$myvalue[$par[$a]]."' WHERE ";

    $par=array_keys($where);

    
    for($a=0; $a<(sizeof($where)-1);$a++){
        $queri = $queri." ".$par[$a]."= '".$where[$par[$a]]."' and ";
    }

    $queri = $queri." ".$par[$a]."= '".$where[$par[$a]]."' ";
    
    $process=mysqli_query ($connect,$queri);
   
    if($process)
     return true;

    return false;
}


function deleteAtc($connect,$where,$myvalue){
    $where= strtolower($where);
    if($where =="all")
        $queri= "DELETE FROM log_book_detail WHERE 1";
    else 
        $queri= "DELETE FROM log_book_detail where $where = $myvalue";

    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

  
function showAtc($connect,$where,$myvalue){
  
  $where= strtolower($where);
  if($where =="all")
      $queri= "SELECT * FROM log_book_detail ";
  else
      $queri= "SELECT * FROM log_book_detail where $where = '$myvalue'";

  $info = array();
  $a=0;
  $process=mysqli_query ($connect,$queri);
  while($data=mysqli_fetch_array($process)){
    $users=showUsers($connect,'id', $data['id_akun']);
      $info [$a]= array(
          "id" => $data['id'],
          "nama" => $users[0]['nama'],
          "id_akun" => $data['id_akun'],
          "dns" => $data['dns'],
          "ctr" => $data['ctr'],
          "ass" => $data['ass'],
          "tanggal" => $data['tanggal'],
          "bulan" => $data['bulan'],
          "tahun" => $data['tahun'],
          "gambar" => $data['gambar'],
          "created_at" => $data['created_at'],
      );
      $a++;
  }
  return $info;
}
  

function showAtcDetail($connect,$where,$myvalue,$myvalue2,$myvalue3){
  
    $where= strtolower($where);
    if($where =="all")
        $queri= "SELECT * FROM log_book_detail ";
    else
        $queri= "SELECT * FROM log_book_detail where $where = '$myvalue' and tanggal = '$myvalue2' and bulan = '$myvalue3' and tahun = date('Y')";
  
    $info = array();
    $a=0;
    $process=mysqli_query ($connect,$queri);
    while($data=mysqli_fetch_array($process)){
      $users=showUsers($connect,'id', $data['id_akun']);
        $info [$a]= array(
            "id" => $data['id'],
            "nama" => $users[0]['nama'],
            "id_akun" => $data['id_akun'],
            "dns" => $data['dns'],
            "ctr" => $data['ctr'],
            "ass" => $data['ass'],
            "tanggal" => $data['ass'],
            "bulan" => $data['ass'],
            "tahun" => $data['ass'],
            "created_at" => $data['created_at'],
        );
        $a++;
    }
    return $info;
  }

  
function showAtcTotal($connect,$where,$myvalue,$myvalue2){
    $date = date('Y');
    $where= strtolower($where);
    if($where == "all")
        $queri= "SELECT COUNT(id) as total FROM log_book_detail where status = '1'";
    elseif($where == "ctr")
        $queri= "SELECT SUM(ctr) as total FROM log_book_detail where dns is not null and tanggal = '$myvalue' and bulan = '$myvalue2' and tahun = '$date' ";
    elseif($where == "ass")
        $queri= "SELECT SUM(ass) as total FROM log_book_detail where dns is not null and tanggal = '$myvalue' and bulan = '$myvalue2' and tahun = '$date' ";
    else 
        $queri= "SELECT SUM(id) as total
        FROM log_book_detail
        WHERE $where = '$myvalue'";

    $process=mysqli_query ($connect,$queri);
    $data=mysqli_fetch_array($process);
    $jumlah=$data['total'];
    
    return $jumlah;
}


function showAtcTotalNew($connect,$where,$bulan,$id_akun){
    $date = date('Y');
    $where= strtolower($where);
    if($where == "users_hari_kerja")
        $queri= "SELECT COUNT(id) as total FROM log_book_detail where id_akun = '$id_akun' and bulan = '$bulan' and tahun = '$date' and ctr is not null";
    elseif($where == "users_hari_kerja_all")
    $queri= "SELECT COUNT(id) as total FROM log_book_detail where bulan = '$bulan' and tahun = '$date' and ctr is not null";
    elseif($where == "users_ctr")
        $queri= "SELECT SUM(ctr) as total FROM log_book_detail where id_akun = '$id_akun' and ctr is not null and bulan = '$bulan' and tahun = '$date' ";
    elseif($where == "all_ctr")
        $queri= "SELECT SUM(ctr) as total FROM log_book_detail where ctr is not null and bulan = '$bulan' and tahun = '$date' ";
    elseif($where == "users_ass")
        $queri= "SELECT SUM(ass) as total FROM log_book_detail where id_akun = '$id_akun' and ass is not null and bulan = '$bulan' and tahun = '$date' ";
    elseif($where == "all_ass")
        $queri= "SELECT SUM(ass) as total FROM log_book_detail where ass is not null and bulan = '$bulan' and tahun = '$date' ";
    else 
        $queri= "SELECT SUM(id) as total
        FROM log_book_detail
        WHERE $where = '$myvalue'";

    $process=mysqli_query ($connect,$queri);
    $data=mysqli_fetch_array($process);
    $jumlah=$data['total'];
    
    return $jumlah;
}

function dates_month($month, $year) {
    $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dates_month = array();

    for ($i = 1; $i <= $num; $i++) {
        $mktime = mktime(0, 0, 0, $month, $i, $year);
        $date = date("d", $mktime);
        $dates_month[$i] = $date;
    }

    return $dates_month;
}


//keterangan atc
function addKeteranganAtc($connect,$id_users,$keterangan,$status,$bulan,$tahun){

    $queri= "INSERT INTO keterangan_log_atc(`id_users`,`keterangan`,`status`,`bulan`,`tahun`)
    VALUES ('$id_users','$keterangan','$status','$bulan','$tahun')";
    $process=mysqli_query($connect,$queri);
    if($process){
        return true;
      }
      return false;
  }

function updateKeteranganAtc($connect,$where,$myvalue){
    $queri =" UPDATE keterangan_log_atc SET";

    $par=array_keys($myvalue);

    
    for($a=0; $a<(sizeof($myvalue)-1);$a++){
        $queri = $queri." ".$par[$a]."= '".$myvalue[$par[$a]]."',";
    }

    $queri = $queri." ".$par[$a]."= '".$myvalue[$par[$a]]."' WHERE ";

    $par=array_keys($where);

    
    for($a=0; $a<(sizeof($where)-1);$a++){
        $queri = $queri." ".$par[$a]."= '".$where[$par[$a]]."' and ";
    }

    $queri = $queri." ".$par[$a]."= '".$where[$par[$a]]."' ";
    
    $process=mysqli_query ($connect,$queri);
   
    if($process)
     return true;

    return false;
}


function deleteKeteranganAtc($connect,$where,$myvalue){
    $where= strtolower($where);
    if($where =="all")
        $queri= "DELETE FROM keterangan_log_atc WHERE 1";
    else 
        $queri= "DELETE FROM keterangan_log_atc where $where = $myvalue";

    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

function showKeteranganAtc($connect,$where,$myvalue,$myvalue2){
  
  $where= strtolower($where);
  if($where =="all")
      $queri= "SELECT * FROM keterangan_log_atc order by bulan asc";
  elseif($where =="id")
        $queri= "SELECT * FROM keterangan_log_atc where $where = '$myvalue'";
  else
      $queri= "SELECT * FROM keterangan_log_atc where $where = '$myvalue' and bulan = '$myvalue2' and tahun = date('Y')";

  $info = array();
  $a=0;
  $process=mysqli_query ($connect,$queri);
  while($data=mysqli_fetch_array($process)){
    $users=showUsers($connect,'id', $data['id_users']);
      $info [$a]= array(
          "id" => $data['id'],
          "nama" => $users[0]['nama'],
          "id_users" => $data['id_users'],
          "keterangan" => $data['keterangan'],
          "status" => $data['status'],
          "bulan" => $data['bulan'],
          "tahun" => $data['tahun'],
          "created_at" => $data['created_at'],
      );
      $a++;
  }
  return $info;
}
    