<?php 
include '../../connect.php';
if(isset($_POST['ubah_jd'])){
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $nama = htmlentities(strip_tags(trim($_POST['nama'])));
    
            $where= array(
                "id"=>$_POST['id']
            );
            $myvalue= array(
                "nama" => $nama,
            );
            updateMasterJD($connect,$where,$myvalue);
            $message="Data Berhasil diubah";
            $_SESSION['sukses'] = $message;
            header("location:../masterJenisDokumen.php");

} elseif(isset($_POST['hapus_jd'])){
    $id =  htmlentities(strip_tags(trim($_POST['id'])));
    
    if($id != null){
        deleteMasterJD($connect,"id",$id);
        $message="Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message="Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    header("location:../masterJenisDokumen.php");

} elseif(isset($_POST['ubah_dk'])){
    $id_jenis_dokumen = htmlentities(strip_tags(trim($_POST['id_jenis_dokumen'])));
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $name_dokumen = $_FILES['dokumen']['name'];
    
    if(!empty($name_dokumen)){
        // Mengambil data file didalam table detail_dokumen
        $get_dokumen= "SELECT * FROM detail_dokumen where id ='$id'";
		$data_dokumen = mysqli_query($connect, $get_dokumen); 
        // Mengubah data yang diambil menjadi Array
		$dokumen_lama = mysqli_fetch_array($data_dokumen);
        // Menghapus File lama didalam folder
		unlink("../../files/dokumen/".$dokumen_lama['file']); 

        $file_tmp = $_FILES['dokumen']['tmp_name'];   
        // Membuat angka/huruf acak berdasarkan waktu diupload
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $file = $name_dokumen; 
        // Memindahkan File kedalam Folder
        move_uploaded_file($file_tmp, '../../files/dokumen/'.$file);
        $where= array(
            "id"=> $id
        );
        $myvalue= array(
            "id_jenis_dokumen" => $id_jenis_dokumen,
            "file" => $file,
        );
        updateDetailDokumen($connect,$where,$myvalue);
        $message="Data Berhasil diubah";
        $_SESSION['sukses'] = $message;
    } else {
        $where= array(
            "id"=>$id
        );
        $myvalue= array(
            "id_jenis_dokumen" => $id_jenis_dokumen,
        );
        updateDetailDokumen($connect,$where,$myvalue);
        $message="Data Berhasil diubah";
        $_SESSION['sukses'] = $message;
    }
    header("location:../dokumen.php");

} elseif(isset($_POST['hapus_dk'])){
    $id =  htmlentities(strip_tags(trim($_POST['id'])));
		// Mengambil data file didalam table detail_dokumen
		$get_dokumen= "SELECT * FROM detail_dokumen where id ='$id'";
		$data_dokumen = mysqli_query($connect, $get_dokumen); 
        // Mengubah data yang diambil menjadi Array
		$dokumen_lama = mysqli_fetch_array($data_dokumen);

        // Menghapus File lama didalam folder
		unlink("../../files/dokumen/".$dokumen_lama['file']);    
    
    if($id != null){
        deleteDetailDokumen($connect,"id",$id);
        $message="Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message="Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    header("location:../dokumen.php");

} elseif(isset($_POST['simpan_dk'])){
  
        $id_jenis_dokumen = htmlentities(strip_tags(trim($_POST['id_jenis_dokumen'])));
        $name_dokumen = $_FILES['dokumen']['name'];
        $file_tmp = $_FILES['dokumen']['tmp_name'];   
		// Membuat angka/huruf acak berdasarkan waktu diupload
		// Menyatukan angka/huruf acak dengan nama file aslinya
		$file = $name_dokumen; 
		// Memindahkan File kedalam Folder "FOTO"
        move_uploaded_file($file_tmp, '../../files/dokumen/'.$file);

    if(addDetailDokumen($connect,$id_jenis_dokumen,$file)){
        $message = "Data berhasil disimpan";
        $_SESSION['sukses'] = $message;
        header("location:../dokumen.php");
    } else {
         $message = "Data gagal disimpan, silahkan ulangi lagi";
        $_SESSION['gagal'] = $message;
        header("location:../dokumen.php");
    }
} else {
    $nama = htmlentities(strip_tags(trim($_POST['nama'])));

    if(addMasterJD($connect,$nama)){
        $message = "Data berhasil disimpan";
        $_SESSION['sukses'] = $message;
        header("location:../masterJenisDokumen.php");
    } else {
         $message = "Data gagal disimpan, silahkan ulangi lagi";
        $_SESSION['gagal'] = $message;
        header("location:../masterJenisDokumen.php");
    }
}
?>