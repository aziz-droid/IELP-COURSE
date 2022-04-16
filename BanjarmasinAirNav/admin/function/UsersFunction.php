<?php

function addUsers($connect,$nama,$nomer,$username,$email,$password,$status,$role){
    // $date = date('Y-m-d H:i:s');
    $queri= "INSERT INTO users(`nama`,`no_hp`,`username`,`email`,`password`,`status_akun`,`role_id`)
            VALUES ('$nama','$nomer','$username','$email','$password','$status','$role')";
    $process=mysqli_query($connect,$queri);
    if($process){
        return true;
      }
      return false;
  }

  
function updateUsers($connect,$where,$myvalue){
    $queri =" UPDATE users SET";

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


function deleteUsers($connect,$where,$myvalue){
    $where= strtolower($where);
    if($where =="all")
        $queri= "DELETE FROM users WHERE 1";
    else 
        $queri= "DELETE FROM users where $where = $myvalue";

    $process=mysqli_query ($connect,$queri);
    if($process)
     return true;

    return false;
}

  
function showUsers($connect,$where,$myvalue){
  
  $where= strtolower($where);
  if($where =="all")
      $queri= "SELECT * FROM users where status_akun != '2' ";
 elseif($where =="users_atc")
      $queri= "SELECT * FROM users where status_akun != '2' and role_id = '2' order by id asc ";
  else
      $queri= "SELECT * FROM users where $where = '$myvalue'";

  $info = array();
  $a=0;
  $process=mysqli_query ($connect,$queri);
  while($data=mysqli_fetch_array($process)){
      $info [$a]= array(
          "id" => $data['id'],
          "email" => $data['email'],
          "password" => $data['password'],
          "nama" => $data['nama'],
          "username" => $data['username'],
          "role_id" => $data['role_id'],
          "status_akun" => $data['status_akun'],
          "no_hp" => $data['no_hp'],
          "foto_profil" => $data['foto_profil'],
          "created_at"=>$data['created_at'],
          "tgl_verifikasi"=>$data['tgl_verifikasi'],
      );
      $a++;
  }
  return $info;
}


function encrypt_decrypt($action, $string)
{
  $output = false;
 
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'This is my secret key';
  $secret_iv = 'This is my secret iv';
 
  // hash
  $key = hash('sha256', $secret_key);
 
  // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a
  // warning
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
 
  if ($action == 'encrypt')
  {
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  }
  else
  {
    if ($action == 'decrypt')
    {
      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
  }
 
  return $output;
}

function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}
