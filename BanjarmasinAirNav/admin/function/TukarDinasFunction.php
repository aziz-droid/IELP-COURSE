<?php

function addMap($connect,$id_akun,$alasan){
    $queri= "INSERT INTO map_tukar_dinas(`id_akun`,`alasan`)
            VALUES ('$id_akun','$alasan')";
    $process=mysqli_query($connect,$queri);
    if($process){
        return true;
      }
      return false;
  }

  
function updateMap($connect,$where,$myvalue){
    $queri =" UPDATE map_tukar_dinas SET";

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


function deleteMap($connect,$where,$myvalue){
    $where= strtolower($where);
    if($where =="all")
        $queri= "DELETE FROM map_tukar_dinas WHERE 1";
    else 
        $queri= "DELETE FROM map_tukar_dinas where $where = $myvalue";

    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

  
function showMap($connect,$where,$myvalue){
  
  $where= strtolower($where);
  if($where =="all")
      $queri= "SELECT * FROM map_tukar_dinas ";
  elseif($where =="verifikasi")
      $queri= "SELECT * FROM map_tukar_dinas where status_verifikasi is not null order by status_verifikasi = 1 desc";
  else
      $queri= "SELECT * FROM map_tukar_dinas where $where = '$myvalue'";

  $info = array();
  $a=0;
  $process=mysqli_query ($connect,$queri);
  while($data=mysqli_fetch_array($process)){
    $users=showUsers($connect,'id', $data['id_akun']);
      $info [$a]= array(
          "id" => $data['id'],
          "nama" => $users[0]['nama'],
          "id_akun" => $data['id_akun'],
          "alasan" => $data['alasan'],
          "status_verifikasi" => $data['status_verifikasi'],
          "tgl_verifikasi" => $data['tgl_verifikasi'],
          "created_at"=>$data['created_at'],
      );
      $a++;
  }
  return $info;
}


function addForm($connect,$id_map,$nama,$tanggal,$jadwal_asli,$perubahan){
    $queri= "INSERT INTO form_tukar_dinas (`id_map`,`nama`,`tanggal`,`jadwal_asli`,`perubahan`)
            VALUES ('$id_map','$nama','$tanggal','$jadwal_asli','$perubahan')";
    $process=mysqli_query($connect,$queri);
    if($process){
        return true;
      }
      return  false;
  }

  
function updateForm($connect,$where,$myvalue){
    $queri =" UPDATE form_tukar_dinas SET";

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


function deleteForm($connect,$where,$myvalue){
    $where= strtolower($where);
    if($where =="all")
        $queri= "DELETE FROM form_tukar_dinas WHERE 1";
    else 
        $queri= "DELETE FROM form_tukar_dinas where $where = $myvalue";

    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

  
function showForm($connect,$where,$myvalue){
  
  $where= strtolower($where);
  if($where =="all")
      $queri= "SELECT * FROM form_tukar_dinas ";
  else
      $queri= "SELECT * FROM form_tukar_dinas where $where = '$myvalue'";

  $info = array();
  $a=0;
  $process=mysqli_query ($connect,$queri);
  while($data=mysqli_fetch_array($process)){
    $map=showMap($connect,'id', $data['id_map']);
      $info [$a]= array(
          "id" => $data['id'],
          "alasan" => $map[0]['alasan'],
          "id_map" => $data['id_map'],
          "nama" => $data['nama'],
          "tanggal" => $data['tanggal'],
          "jadwal_asli" => $data['jadwal_asli'],
          "perubahan" => $data['perubahan'],
          "created_at"=>$data['created_at'],
      );
      $a++;
  }
  return $info;
}
