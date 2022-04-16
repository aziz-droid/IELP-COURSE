<?php 
include '../../connect.php';
if(isset($_POST['ubah'])){
    $nama_data = htmlentities(strip_tags(trim($_POST['nama'])));

    $nama = mysqli_real_escape_string($connect,$nama_data);
    $nomer = htmlentities(strip_tags(trim($_POST['nomer'])));
    $username = htmlentities(strip_tags(trim($_POST['username'])));
    $email = htmlentities(strip_tags(trim($_POST['email'])));
    $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));
    $akun = htmlentities(strip_tags(trim($_POST['akun'])));
    
        //cek email is unik
        if(isEmailAvailable($email,$connect) || $email==$_SESSION['email']){
            $where= array(
                "id"=>$_POST['id_akun']
            );
            $myvalue= array(
                "nama" => $nama,
                "no_hp" => $nomer,
                "username" => $username,
                "email" => $email,
            );
            updateUsers($connect,$where,$myvalue);
            $message="Data Akun Berhasil diubah";
            $_SESSION['sukses'] = $message;
            $akun == 'admin' ? header("location:../masterAdmin.php") : header("location:../masterUsers.php");
            
        } else {
            $message="Maaf email sudah pernah digunakan, pastikan email belum digunakan di website";
            $_SESSION['gagal'] = $message;
            header("location:../masterAdmin.php");
        }

} elseif(isset($_POST['hapus'])){
    $id =  htmlentities(strip_tags(trim($_POST['id_akun'])));
    $akun = htmlentities(strip_tags(trim($_POST['akun'])));
    
    if($id != null){
        deleteUsers($connect,"id",$id);
        $message="Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message="Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    $akun == 'admin' ? header("location:../masterAdmin.php") : header("location:../masterUsers.php");

} elseif(isset($_POST['verifikasi'])){
    date_default_timezone_set("Asia/Bangkok");
    $status_akun = htmlentities(strip_tags(trim($_POST['status_akun'])));
    $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));
        //cek email is unik
            $where= array(
                "id"=>$_POST['id_akun']
            );
            $myvalue= array(
                "status_akun" => $status_akun,
                "tgl_verifikasi" => date('Y-m-d H:i:s'),
            );
            updateUsers($connect,$where,$myvalue);
            $message="Akun Berhasil Diverifikasi";
            $_SESSION['sukses'] = $message;
            header("location:../verifikasiBelum.php");

} elseif(isset($_POST['unverifikasi'])){
    date_default_timezone_set("Asia/Bangkok");
    $status_akun = htmlentities(strip_tags(trim($_POST['status_akun'])));
    $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));
        //cek email is unik
            $where= array(
                "id"=>$_POST['id_akun']
            );
            $myvalue= array(
                "status_akun" => $status_akun,
                "tgl_verifikasi" => date('Y-m-d H:i:s'),
            );
            updateUsers($connect,$where,$myvalue);
            $message="Akun Berhasil Diunverifikasi";
            $_SESSION['sukses'] = $message;
            header("location:../verifikasiSudah.php");

} elseif(isset($_POST['update_profile'])){
   
    $nama_data = htmlentities(strip_tags(trim($_POST['nama'])));

    $nama = mysqli_real_escape_string($connect,$nama_data);
    $nomer = htmlentities(strip_tags(trim($_POST['nomer'])));
    $username = htmlentities(strip_tags(trim($_POST['username'])));
    $email = htmlentities(strip_tags(trim($_POST['email'])));
    $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));

    $name_foto = $_FILES['foto']['name'];
    

    if (!empty($name_foto)) {
        // Mengambil data file didalam table detail_dokumen
        $get_foto = "SELECT * FROM users where id ='$id'";
        $data_foto = mysqli_query($connect, $get_foto);
        // Mengubah data yang diambil menjadi Array
        $foto_lama = mysqli_fetch_array($data_foto);
        // Menghapus File lama didalam folder
        unlink("../../files/profile/" . $foto_lama['foto_profil']);

        $file_tmp = $_FILES['foto']['tmp_name'];
        // Membuat angka/huruf acak berdasarkan waktu diupload
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $foto_profile = $name_foto;
        // Memindahkan File kedalam Folder
        move_uploaded_file($file_tmp, '../../files/profile/' . $foto_profile);
        $where= array(
            "id"=>$_POST['id_akun']
        );
        $myvalue= array(
            "nama" => $nama,
            "no_hp" => $nomer,
            "username" => $username,
            "email" => $email,
            "foto_profil" => $foto_profile,
        );
    } else {
        $where= array(
            "id"=>$_POST['id_akun']
        );
        $myvalue= array(
            "nama" => $nama,
            "no_hp" => $nomer,
            "username" => $username,
            "email" => $email,
        );
    }
        updateUsers($connect,$where,$myvalue);
        $message="Data Profile Berhasil diubah";
        $_SESSION['sukses'] = $message;
       
        header("location:../home.php");

}  elseif(isset($_POST['update_password'])){
    //get data form
  $old_pass =  $_POST['old_pass'];
  $new_pass =  $_POST['new_pass'];
  $cek_pass =  $_POST['cek_pass'];

    $dataArray=showUsers($connect,"id",$_SESSION['idUsers']);
    $data=$dataArray[0];
    //get data password user
    $db_pass = $data['password'];

    //cek data password user
    if(password_verify($old_pass, $db_pass)){
        if($new_pass == $cek_pass){
            $password = password_hash($new_pass, PASSWORD_DEFAULT);
            $where = array(
                "id" => $_SESSION['idUsers']
            );
            $myvalue = array(
                "password" => $password
            );
            updateUsers($connect,$where,$myvalue);
            $message = "Berhasil Mengubah Password";
            $_SESSION['sukses'] = $message;
             header("location:../home.php");
        } else {
            $message = "Password Baru dan Password Konfirmasi Tidak Cocok !! Cek kembali saat mengisikan Password Baru dan Password Konfirmasi";
            // $_SESSION['pesan']=$message;
            $_SESSION['gagal'] = $message;
            header("location:../home.php");
        }
    } else {
        $message = "Password Lama Anda Salah !!!";
        $_SESSION['gagal'] = $message;
        header("location:../home.php");
    }
} else {
    $nama_data = htmlentities(strip_tags(trim($_POST['nama'])));
    
    $nama = mysqli_real_escape_string($connect,$nama_data);
    $nomer = htmlentities(strip_tags(trim($_POST['nomer'])));
    $username = htmlentities(strip_tags(trim($_POST['username'])));
    $email = htmlentities(strip_tags(trim($_POST['email'])));
    $pass = htmlentities(strip_tags(trim($_POST['password'])));
    $role = htmlentities(strip_tags(trim($_POST['role'])));
    $akun = htmlentities(strip_tags(trim($_POST['akun'])));
    
    $statEmail=isEmailAvailable($email,$connect);
        //cek email is unik
        if($statEmail=="free"){
                    $password=password_hash($pass, PASSWORD_DEFAULT);
                    $akun == 'admin' ? $status = 1 :  $status = 0 ;
                    $date = date('Y-m-d');
                    // print_r($connect);
                    //save data in database
                    if(addUsers($connect,$nama,$nomer,$username,$email,$password,$status,$role)){
                        $where= array(
                            "nama"=>$nama,
                            "no_hp"=>$email,
                            "username"=>$username,
                            "email"=>$email,
                            "password"=>$password,
                            "status_akun"=>$status,
                            "role_id"=>$role,
                        );
                        $message = "Akun berhasil dibuat, silahkan Login untuk masuk ke dalam website";
                        $_SESSION['sukses'] = $message;
                        $akun == 'admin' ? header("location:../masterAdmin.php") : header("location:../masterUsers.php");
                    }
                    else {
                        $message = "Akun gagal dibuat, silahkan ulangi lagi";
                        $_SESSION['gagal'] = $message;
                        $akun == 'admin' ? header("location:../masterAdmin.php") : header("location:../masterUsers.php");
                    }
        } else {
            $message="Maaf email sudah pernah digunakan, pastikan email belum digunakan di website";
            $_SESSION['gagal'] = $message;
            $akun == 'admin' ? header("location:../masterAdmin.php") : header("location:../masterUsers.php");
        }
    }
?>