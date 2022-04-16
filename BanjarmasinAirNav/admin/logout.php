<?php
session_start();
// apabila ditekan tombol logout paka session username & level akan hilang
unset($_SESSION['idUsers']);
unset($_SESSION['email']);
unset($_SESSION['nama']);
unset($_SESSION['role']);
unset($_SESSION['previlage']);
$message="Anda Berhasil Logout";
$_SESSION['sukses'] = $message;
header("location:login.php");
?>