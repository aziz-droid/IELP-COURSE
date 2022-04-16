<?php

function isEmailAvailable($email,$connect){
  $queri= "Select * from users where email='$email'";
  $process=mysqli_query ($connect,$queri);
  $rows = mysqli_num_rows($process);
  if($rows>0)
    return "ada";
  
  return "free";
}

function isPasswordCorrect($pass, $email, $previlage, $connect){

  $queri= "Select * from users where email='$email'";

  $process=mysqli_query ($connect,$queri);
  $data = mysqli_fetch_array($process);
  $pass2=$data['password'];

  if(password_verify($pass, $pass2)){
    return true;
  } else {
    return false;
  }
  // echo password_verify($pass, $pass2)." ".$pass." ".$pass2." ".$previlage;
  // exit;
}

function setUserSession($previlage, $email, $connect){

  $queri= "Select * from users where email='$email' and status_akun='1'";
    
  $process=mysqli_query ($connect,$queri);
  $data = mysqli_fetch_array ($process);
  
  $_SESSION['idUsers']=$data['id'];
  $_SESSION["email"]=$data['email'];
  $_SESSION["nama"]=$data['nama'];
  $_SESSION["role"]=$data['role_id'];
  $_SESSION["previlage"]=$previlage;

  return true;
}

?>