<?php 
include '../../connect.php';

if(isset($_POST['login'])){
    $email = htmlentities(strip_tags(trim($_POST['email'])));
    $pass = htmlentities(strip_tags(trim($_POST['password'])));

    $previlage=isEmailAvailable($email,$connect);
    //cek apakah email terdaftar
    if($previlage=="free"){
        $message = "Maaf anda belum terdaftar";
        $_SESSION['gagal'] = $message;
        header("location:../register.php");
    } else{
        $data= array();

        $data= showUsers($connect,"email",$email);
        //cek status masyarakat yang akun aktif/nonaktifkan
        if($data[0]['status_akun'] != '0'){
            //cek username dan password
            if(isPasswordCorrect($pass, $email, $previlage, $connect)){
                setUserSession($previlage, $email, $connect);
              
                if(isset($_SESSION['nama'])&&isset($_SESSION['email'])&&isset($_SESSION['idUsers'])&&isset($_SESSION['previlage'])&&isset($_SESSION['role'])){
                    //cek role user
                    if($_SESSION['role'] == 2){
                        $message = "Anda Berhasil Login";
                        $_SESSION['sukses'] = $message ;
                        header("location:../home.php");
                    }  else {
                        $message = "Anda Berhasil Login";
                        $_SESSION['sukses'] = $message ;
                        header("location:../home.php");
                    }  
                }
            } else{
                $message = "Maaf email atau password yang anda gunakan salah";
                $_SESSION['gagal'] = $message;
                header("location:../login.php");
            } 
        } else{
            $message = "Maaf akun anda belum diverifikasi";
            $_SESSION['gagal'] = $message;
            header("location:../login.php");
        }
    }
}
?>