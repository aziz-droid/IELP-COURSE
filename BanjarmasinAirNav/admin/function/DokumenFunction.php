<?php

function addMasterJD($connect,$nama){
    $queri= "INSERT INTO master_jenis_dokumen(`nama`)
            VALUES ('$nama')";
    $process=mysqli_query($connect,$queri);
    if($process){
        return true;
      }
      return false;
  }

  
function updateMasterJD($connect,$where,$myvalue){
    $queri =" UPDATE master_jenis_dokumen SET";

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


function deleteMasterJD($connect,$where,$myvalue){
    $where= strtolower($where);
    if($where =="all")
        $queri= "DELETE FROM master_jenis_dokumen WHERE 1";
    else 
        $queri= "DELETE FROM master_jenis_dokumen where $where = $myvalue";

    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

  
function showMasterJD($connect,$where,$myvalue){
  
  $where= strtolower($where);
  if($where =="all")
      $queri= "SELECT * FROM master_jenis_dokumen ";
  else
      $queri= "SELECT * FROM master_jenis_dokumen where $where = '$myvalue'";

  $info = array();
  $a=0;
  $process=mysqli_query ($connect,$queri);
  while($data=mysqli_fetch_array($process)){
      $info [$a]= array(
          "id" => $data['id'],
          "nama" => $data['nama'],
          "created_at" => $data['created_at'],
      );
      $a++;
  }
  return $info;
}


function addDetailDokumen($connect,$id_jenis_dokumen,$file){
    $queri= "INSERT INTO detail_dokumen (`id_jenis_dokumen`,`file`)
            VALUES ('$id_jenis_dokumen','$file')";
    $process=mysqli_query($connect,$queri);
    if($process){
        return true;
      }
      return  false;
  }

  
function updateDetailDokumen($connect,$where,$myvalue){
    $queri =" UPDATE detail_dokumen SET";

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


function deleteDetailDokumen($connect,$where,$myvalue){
    $where= strtolower($where);
    if($where =="all")
        $queri= "DELETE FROM detail_dokumen WHERE 1";
    else 
        $queri= "DELETE FROM detail_dokumen where $where = $myvalue";

    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

  
function showDetailDokumen($connect,$where,$myvalue){
  
  $where= strtolower($where);
  if($where =="all")
      $queri= "SELECT * FROM detail_dokumen";
  else
      $queri= "SELECT * FROM detail_dokumen where $where = '$myvalue'";

  $info = array();
  $a=0;
  $process=mysqli_query ($connect,$queri);
  while($data=mysqli_fetch_array($process)){
    $master=showMasterJD($connect,'id', $data['id_jenis_dokumen']);
      $info [$a]= array(
          "id" => $data['id'],
          "nama" => $master[0]['nama'],
          "id_jenis_dokumen" => $data['id_jenis_dokumen'],
          "file" => $data['file'],
          "created_at"=>$data['created_at'],
      );
      $a++;
  }
  return $info;
}


function addOjtDokumen($connect,$id_akun,$file){
    $queri= "INSERT INTO ojt_dokumen (`id_akun`,`file`)
            VALUES ('$id_akun','$file')";
    $process=mysqli_query($connect,$queri);
    if($process){
        return true;
      }
      return  false;
  }

  
function updateOjtDokumen($connect,$where,$myvalue){
    $queri =" UPDATE ojt_dokumen SET";

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


function deleteOjtDokumen($connect,$where,$myvalue){
    $where= strtolower($where);
    if($where =="all")
        $queri= "DELETE FROM ojt_dokumen WHERE 1";
    else 
        $queri= "DELETE FROM ojt_dokumen where $where = $myvalue";

    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

  
function showOjtDokumen($connect,$where,$myvalue){
  
  $where= strtolower($where);
  if($where =="all")
      $queri= "SELECT * FROM ojt_dokumen";
  else
      $queri= "SELECT * FROM ojt_dokumen where $where = '$myvalue'";

  $info = array();
  $a=0;
  $process=mysqli_query ($connect,$queri);
  while($data=mysqli_fetch_array($process)){
    $users=showUsers($connect,'id', $data['id_akun']);
      $info [$a]= array(
          "id" => $data['id'],
          "nama" => $users[0]['nama'],
          "id_akun" => $data['id_akun'],
          "file" => $data['file'],
          "created_at"=>$data['created_at'],
      );
      $a++;
  }
  return $info;
}