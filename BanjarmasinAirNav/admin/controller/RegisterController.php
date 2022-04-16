<?php
include '../../connect.php';

if (isset($_POST['register'])) {
    $nama_data = htmlentities(strip_tags(trim($_POST['nama'])));

    $nama = mysqli_real_escape_string($connect, $nama_data);
    $nomer = htmlentities(strip_tags(trim($_POST['nomer'])));
    $username = htmlentities(strip_tags(trim($_POST['username'])));
    $email = htmlentities(strip_tags(trim($_POST['email'])));
    $pass = htmlentities(strip_tags(trim($_POST['password'])));

    $statEmail = isEmailAvailable($email, $connect);
    //cek email is unik
    if ($statEmail == "free") {
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $status = 1;
        $role = 2;
        $date = date('Y-m-d');
        // print_r($connect);
        //save data in database
        if (addUsers($connect, $nama, $nomer, $username, $email, $password, $status, $role)) {
            $where = array(
                "nama" => $nama,
                "no_hp" => $email,
                "username" => $username,
                "email" => $email,
                "password" => $password,
                "status_akun" => $status,
                "role_id" => $role,
            );
            $message = "Akun berhasil dibuat, silahkan Login untuk masuk ke dalam website";
            $_SESSION['sukses'] = $message;
            header("location:../register.php");
        } else {
            $message = "Akun gagal dibuat, silahkan ulangi lagi";
            $_SESSION['gagal'] = $message;
            header("location:../register.php");
        }
    } else {
        $message = "Maaf email sudah pernah digunakan, pastikan email belum digunakan di website";
        $_SESSION['gagal'] = $message;
        header("location:../register.php");
    }
}
