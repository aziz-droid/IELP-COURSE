<?php 
include '../../connect.php';
if(isset($_POST['ubah_map'])){
    $alasan = htmlentities(strip_tags(trim($_POST['alasan'])));
    $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    
            $where= array(
                "id"=>$_POST['id']
            );
            $myvalue= array(
                "alasan" => $alasan,
            );
            updateMap($connect,$where,$myvalue);
            $message="Data Berhasil diubah";
            $_SESSION['sukses'] = $message;
            header("location:../mapTukarDinas.php");

} elseif(isset($_POST['hapus_map'])){
    $id =  htmlentities(strip_tags(trim($_POST['id'])));
    
    if($id != null){
        deleteMap($connect,"id",$id);
        $message="Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message="Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    header("location:../mapTukarDinas.php");

} elseif(isset($_POST['ubah_form'])){
    $nama = htmlentities(strip_tags(trim($_POST['nama'])));
    $tanggal = htmlentities(strip_tags(trim($_POST['tgl'])));
    $jadwal_asli = htmlentities(strip_tags(trim($_POST['jadwal'])));
    $perubahan = htmlentities(strip_tags(trim($_POST['perubahan'])));
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $id_map = htmlentities(strip_tags(trim($_POST['id_map'])));
    $encrypted_txt = encrypt_decrypt('encrypt',$id_map);
    
            $where= array(
                "id"=>$_POST['id']
            );
            $myvalue= array(
                "nama" => $nama,
                "tanggal" => $tanggal,
                "jadwal_asli" => $jadwal_asli,
                "perubahan" => $perubahan,
            );
            updateForm($connect,$where,$myvalue);
            $message="Data Berhasil diubah";
            $_SESSION['sukses'] = $message;
            header("location:../formTukarDinas.php?detail=".$encrypted_txt);

} elseif(isset($_POST['hapus_form'])){
    $id =  htmlentities(strip_tags(trim($_POST['id'])));
    $id_map = htmlentities(strip_tags(trim($_POST['id_map'])));
    $encrypted_txt = encrypt_decrypt('encrypt',$id_map);
    
    if($id != null){
        deleteForm($connect,"id",$id);
        $message="Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message="Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    header("location:../formTukarDinas.php?detail=".$encrypted_txt);

} elseif(isset($_POST['simpan_form'])){
  
    $id_map = htmlentities(strip_tags(trim($_POST['id_map'])));
    $nama = htmlentities(strip_tags(trim($_POST['nama'])));
    $tanggal = htmlentities(strip_tags(trim($_POST['tgl'])));
    $jadwal_asli = htmlentities(strip_tags(trim($_POST['jadwal'])));
    $perubahan = htmlentities(strip_tags(trim($_POST['perubahan'])));


    $encrypted_txt = encrypt_decrypt('encrypt',$id_map);

    if(addForm($connect,$id_map,$nama,$tanggal,$jadwal_asli,$perubahan)){
        $message = "Data berhasil disimpan";
        $_SESSION['sukses'] = $message;
        header("location:../formTukarDinas.php?detail=".$encrypted_txt);
    } else {
         $message = "Data gagal disimpan, silahkan ulangi lagi";
        $_SESSION['gagal'] = $message;
        header("location:../formTukarDinas.php?detail=".$encrypted_txt);
    }
} elseif(isset($_POST['mapPengajuan'])){
    $status_verifikasi = htmlentities(strip_tags(trim($_POST['status_verifikasi'])));
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    
            $where= array(
                "id"=>$_POST['id']
            );
            $myvalue= array(
                "status_verifikasi" => $status_verifikasi,
            );
            updateMap($connect,$where,$myvalue);
            $message="Data Berhasil diajukan";
            $_SESSION['sukses'] = $message;
            header("location:../mapTukarDinas.php");
} elseif(isset($_POST['mapSetuju'])){
    $status_verifikasi = htmlentities(strip_tags(trim($_POST['status_verifikasi'])));
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $tgl = date('Y-m-d');
    
            $where= array(
                "id"=>$_POST['id']
            );
            $myvalue= array(
                "status_verifikasi" => $status_verifikasi,
                "tgl_verifikasi" => $tgl,
            );
            updateMap($connect,$where,$myvalue);
            $message="Data Berhasil disetujui";
            $_SESSION['sukses'] = $message;
            header("location:../mapVerifikasi.php");
} elseif(isset($_POST['mapTolak'])){
    $status_verifikasi = htmlentities(strip_tags(trim($_POST['status_verifikasi'])));
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $tgl = date('Y-m-d');
    
            $where= array(
                "id"=>$_POST['id']
            );
            $myvalue= array(
                "status_verifikasi" => $status_verifikasi,
                "tgl_verifikasi" => $tgl,
            );
            updateMap($connect,$where,$myvalue);
            $message="Data Berhasil ditolak";
            $_SESSION['sukses'] = $message;
            header("location:../mapVerifikasi.php");
} else {
    $alasan = htmlentities(strip_tags(trim($_POST['alasan'])));
    $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));

    if(addMap($connect,$id_akun,$alasan)){
        $message = "Data berhasil disimpan";
        $_SESSION['sukses'] = $message;
        header("location:../mapTukarDinas.php");
    } else {
         $message = "Data gagal disimpan, silahkan ulangi lagi";
        $_SESSION['gagal'] = $message;
        header("location:../mapTukarDinas.php");
    }
}
?>