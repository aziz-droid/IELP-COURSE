<?php 

$host ="localhost"; 
$user ="root";
$pass =""; 
$database ="proyek";

$connect=mysqli_connect($host,$user,$pass,$database) or die ("gagal");

$URL="http://localhost:8080/project/";

session_start();
if (isset($_SESSION['pesan'])) {
    $msg=$_SESSION['pesan'];
    
    unset($_SESSION['pesan']);
    echo "
    <script>alert('" .$msg. "');</script>
  ";
}

include 'admin/function/GeneralFunction.php';
include 'admin/function/UsersFunction.php';
include 'admin/function/TukarDinasFunction.php';
include 'admin/function/DokumenFunction.php';
include 'admin/function/ArtikelFunction.php';
include 'admin/function/AtcFunction.php';

?>
