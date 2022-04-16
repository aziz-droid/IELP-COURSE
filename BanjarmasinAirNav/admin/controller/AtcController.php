<?php 
include '../../connect.php';
if(isset($_POST['ubah_atc'])){
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));
    $dns = htmlentities(strip_tags(trim($_POST['dns'])));
    $ctr = htmlentities(strip_tags(trim($_POST['ctr'])));
    $ass = htmlentities(strip_tags(trim($_POST['ass'])));
    $tanggal = date('d', strtotime($_POST['tgl']));
    $bulan = date('m', strtotime($_POST['tgl']));
    $tahun = date('Y', strtotime($_POST['tgl']));
    $name_gambar = $_FILES['gambar']['name'];
    
    if(!empty($name_gambar)){
        // Mengambil data file didalam table detail_dokumen
        $get_gambar= "SELECT * FROM log_book_detail where id ='$id'";
        $data_gambar = mysqli_query($connect, $get_gambar); 
        // Mengubah data yang diambil menjadi Array
        $gambar_lama = mysqli_fetch_array($data_gambar);
        // Menghapus File lama didalam folder
        unlink("../../files/atc/".$gambar_lama['gambar']); 

        $file_tmp = $_FILES['gambar']['tmp_name'];   
        // Membuat angka/huruf acak berdasarkan waktu diupload
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $file = $name_gambar; 
        // Memindahkan File kedalam Folder
        move_uploaded_file($file_tmp, '../../files/atc/'.$file);

        $where= array(
            "id"=> $id
        );
        if(!empty($ass) && !empty($ass)){
            $myvalue= array(
                "dns" => $dns,
                "ctr" => $ctr,
                "ass" => $ass,
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "gambar" => $file,
            );
        } elseif(!empty($ass)){
            $myvalue= array(
                "dns" => $dns,
                "ass" => $ass,
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "gambar" => $file,
            );
        } elseif(!empty($ctr)){
            $myvalue= array(
                "dns" => $dns,
                "ctr" => $ctr,
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "gambar" => $file,
            );
        } else {
            $myvalue= array(
                "dns" => $dns,
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
                "gambar" => $file,
            );
        }
    } else {
        $where= array(
            "id"=> $id
        );
        if(!empty($ass) && !empty($ass)){
            $myvalue= array(
                "dns" => $dns,
                "ctr" => $ctr,
                "ass" => $ass,
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
            );
        } elseif(!empty($ass)){
            $myvalue= array(
                "dns" => $dns,
                "ass" => $ass,
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
            );
        } elseif(!empty($ctr)){
            $myvalue= array(
                "dns" => $dns,
                "ctr" => $ctr,
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
            );
        } else {
            $myvalue= array(
                "dns" => $dns,
                "tanggal" => $tanggal,
                "bulan" => $bulan,
                "tahun" => $tahun,
            );
        }
    }
        updateAtc($connect,$where,$myvalue);
        $message="Data Berhasil diubah";
        $_SESSION['sukses'] = $message;
        header("location:../atc.php");

} elseif(isset($_POST['hapus_atc'])){
        $id =  htmlentities(strip_tags(trim($_POST['id'])));
		// Mengambil data file didalam table detail_dokumen
		$get_gambar= "SELECT * FROM log_book_detail where id ='$id'";
		$data_gambar = mysqli_query($connect, $get_gambar); 
        // Mengubah data yang diambil menjadi Array
		$gambar_lama = mysqli_fetch_array($data_gambar);

        // Menghapus File lama didalam folder
        if(!empty($gambar_lama['gambar'])){
            unlink("../../files/atc/".$gambar_lama['gambar']);    
        }
    
    if($id != null){
        deleteAtc($connect,"id",$id);
        $message="Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message="Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    header("location:../atc.php");

} elseif(isset($_POST['simpan_atc'])){
  
        $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));
        $dns = htmlentities(strip_tags(trim($_POST['dns']))) ;
        $ctr = htmlentities(strip_tags(trim($_POST['ctr'])));
        $ass = htmlentities(strip_tags(trim($_POST['ass'])));
        $tanggal = date('d', strtotime($_POST['tgl']));
        $bulan = date('m', strtotime($_POST['tgl']));
        $tahun = date('Y', strtotime($_POST['tgl']));

        $name_gambar = $_FILES['gambar']['name'];
        // if(!empty($name_gambar )){
            $file_tmp = $_FILES['gambar']['tmp_name'];   
            // Membuat angka/huruf acak berdasarkan waktu diupload
            // Menyatukan angka/huruf acak dengan nama file aslinya
            $gambar = $name_gambar; 
            // Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, '../../files/atc/'.$gambar);
        // }
        

    if(addAtc($connect,$id_akun,$dns,$ctr,$ass,$gambar,$tanggal,$bulan,$tahun)){
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