<?php 
include '../../connect.php';
if(isset($_POST['ubah_keterangan_atc'])){
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $id_users = htmlentities(strip_tags(trim($_POST['id_users'])));
    $keterangan = htmlentities(strip_tags(trim($_POST['keterangan']))) ;
    $status = htmlentities(strip_tags(trim($_POST['status'])));
    $bulan = htmlentities(strip_tags(trim($_POST['bulan'])));
    
        $where= array(
            "id"=> $id
        );
        $myvalue= array(
            "id_users" => $id_users,
            "keterangan" => $keterangan,
            "status" => $status,
            "bulan" => $bulan,
        );
        
        updateKeteranganAtc($connect,$where,$myvalue);
        $message="Data Berhasil diubah";
        $_SESSION['sukses'] = $message;
        header("location:../atc.php");

} elseif(isset($_POST['hapus_keterangan_atc'])){
        $id =  htmlentities(strip_tags(trim($_POST['id'])));
    
    if($id != null){
        deleteKeteranganAtc($connect,"id",$id);
        $message="Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message="Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    header("location:../atc.php");

} elseif(isset($_POST['simpan_keterangan_atc'])){

        $id_users = htmlentities(strip_tags(trim($_POST['id_users'])));
        $keterangan = htmlentities(strip_tags(trim($_POST['keterangan']))) ;
        $status = htmlentities(strip_tags(trim($_POST['status'])));
        $bulan = htmlentities(strip_tags(trim($_POST['bulan'])));
        $tahun = date('Y');

    if(addKeteranganAtc($connect,$id_users,$keterangan,$status,$bulan,$tahun)){
        $message = "Data berhasil disimpan";
        $_SESSION['sukses'] = $message;
        header("location:../atc.php");
    } else {
         $message = "Data gagal disimpan, silahkan ulangi lagi";
        $_SESSION['gagal'] = $message;
        header("location:../atc.php");
    }
} 
?>