<?php 
include '../../connect.php';
if(isset($_POST['ubah_ojt'])){
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $name_dokumen = $_FILES['dokumen']['name'];
    
        // Mengambil data file didalam table detail_dokumen
        $get_dokumen= "SELECT * FROM ojt_dokumen where id ='$id'";
		$data_dokumen = mysqli_query($connect, $get_dokumen); 
        // Mengubah data yang diambil menjadi Array
		$dokumen_lama = mysqli_fetch_array($data_dokumen);
        // Menghapus File lama didalam folder
		unlink("../../files/ojt/".$dokumen_lama['file']); 

        $file_tmp = $_FILES['dokumen']['tmp_name'];   
        // Membuat angka/huruf acak berdasarkan waktu diupload
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $file = $name_dokumen; 
        // Memindahkan File kedalam Folder
        move_uploaded_file($file_tmp, '../../files/ojt/'.$file);
        $where= array(
            "id"=> $id
        );
        $myvalue= array(
            "file" => $file,
        );
        updateOjtDokumen($connect,$where,$myvalue);
        $message="Data Berhasil diubah";
        $_SESSION['sukses'] = $message;
        header("location:../ojt.php");

} elseif(isset($_POST['hapus_ojt'])){
        $id =  htmlentities(strip_tags(trim($_POST['id'])));
		// Mengambil data file didalam table detail_dokumen
		$get_dokumen= "SELECT * FROM ojt_dokumen where id ='$id'";
		$data_dokumen = mysqli_query($connect, $get_dokumen); 
        // Mengubah data yang diambil menjadi Array
		$dokumen_lama = mysqli_fetch_array($data_dokumen);

        // Menghapus File lama didalam folder
		unlink("../../files/ojt/".$dokumen_lama['file']);    
    
    if($id != null){
        deleteOjtDokumen($connect,"id",$id);
        $message="Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message="Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    header("location:../ojt.php");

} elseif(isset($_POST['simpan_ojt'])){
  
        $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));
        $name_dokumen = $_FILES['dokumen']['name'];
        $file_tmp = $_FILES['dokumen']['tmp_name'];   
		// Membuat angka/huruf acak berdasarkan waktu diupload
		// Menyatukan angka/huruf acak dengan nama file aslinya
		$file = $name_dokumen; 
		// Memindahkan File kedalam Folder "FOTO"
        move_uploaded_file($file_tmp, '../../files/ojt/'.$file);

    if(addOjtDokumen($connect,$id_akun,$file)){
        $message = "Data berhasil disimpan";
        $_SESSION['sukses'] = $message;
        header("location:../ojt.php");
    } else {
         $message = "Data gagal disimpan, silahkan ulangi lagi";
        $_SESSION['gagal'] = $message;
        header("location:../ojt.php");
    }
} 
?>