<?php
include '../../connect.php';
if (isset($_POST['ubah_artikel'])) {
    $judul = htmlentities(strip_tags(trim($_POST['judul'])));
    $isi = $_POST['isi'];
    $id = htmlentities(strip_tags(trim($_POST['id'])));
    $name_artikel = $_FILES['artikel']['name'];

    if (!empty($name_artikel)) {
        // Mengambil data file didalam table detail_dokumen
        $get_artikel = "SELECT * FROM artikel where id ='$id'";
        $data_artikel = mysqli_query($connect, $get_artikel);
        // Mengubah data yang diambil menjadi Array
        $artikel_lama = mysqli_fetch_array($data_artikel);
        // Menghapus File lama didalam folder
        unlink("../../files/artikel/" . $artikel_lama['file']);

        $file_tmp = $_FILES['artikel']['tmp_name'];
        // Membuat angka/huruf acak berdasarkan waktu diupload
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $gambar_artikel = $name_artikel;
        // Memindahkan File kedalam Folder
        move_uploaded_file($file_tmp, '../../files/artikel/' . $gambar_artikel);
        $where = array(
            "id" => $id
        );
        $myvalue = array(
            "judul" => $judul,
            "isi" => $isi,
            "gambar_artikel" => $gambar_artikel,
        );
        updateArtikel($connect, $where, $myvalue);
        $message = "Data Berhasil diubah";
        $_SESSION['sukses'] = $message;
    } else {
        $where = array(
            "id" => $id
        );
        $myvalue = array(
            "judul" => $judul,
            "isi" => $isi,
        );
        updateArtikel($connect, $where, $myvalue);
        $message = "Data Berhasil diubah";
        $_SESSION['sukses'] = $message;
    }
    header("location:../artikel.php");
} elseif (isset($_POST['hapus_artikel'])) {
    $id =  htmlentities(strip_tags(trim($_POST['id'])));
    // Mengambil data file didalam table detail_dokumen
    $get_artikel = "SELECT * FROM artikel where id ='$id'";
    $data_artikel = mysqli_query($connect, $get_artikel);
    // Mengubah data yang diambil menjadi Array
    $artikel_lama = mysqli_fetch_array($data_artikel);

    // Menghapus File lama didalam folder
    unlink("../../files/artikel/" . $artikel_lama['gambar_artikel']);

    if ($id != null) {
        deleteArtikel($connect, "id", $id);
        $message = "Berhasil menghapus data";
        $_SESSION['sukses'] = $message;
    } else {
        $message = "Gagal menghapus data !!!";
        $_SESSION['gagal'] = $message;
    }
    header("location:../artikel.php");
} elseif (isset($_POST['simpan_artikel'])) {

    $id_akun = htmlentities(strip_tags(trim($_POST['id_akun'])));
    $judul = htmlentities(strip_tags(trim($_POST['judul'])));
    $isi = $_POST['isi'];

    $name_artikel = $_FILES['artikel']['name'];
    $file_tmp = $_FILES['artikel']['tmp_name'];
    // Menyatukan angka/huruf acak dengan nama file aslinya
    $gambar_artikel = $name_artikel;
    // Memindahkan File kedalam Folder "FOTO"
    move_uploaded_file($file_tmp, '../../files/artikel/' . $gambar_artikel);

    if (addArtikel($connect, $judul, $isi, $gambar_artikel, $id_akun)) {
        $message = "Data berhasil disimpan";
        $_SESSION['sukses'] = $message;
    } else {
        $message = "Data gagal disimpan, silahkan ulangi lagi";
        $_SESSION['gagal'] = $message;
    }
    header("location:../artikel.php");
    // } elseif ($_POST['ubah_komentar']) {
    //     $nama = htmlentities(strip_tags(trim($_POST['nama'])));
    //     $email = htmlentities(strip_tags(trim($_POST['email'])));
    //     $komentar = htmlentities(strip_tags(trim($_POST['komentar'])));
    //     $id = htmlentities(strip_tags(trim($_POST['id'])));

    //     $where = array(
    //         "id" => $id
    //     );
    //     $myvalue = array(
    //         "nama" => $nama,
    //         "email" => $email,
    //         "komentar" => $komentar,
    //     );
    //     updateKomentar($connect, $where, $myvalue);
    //     $message = "Data Berhasil diubah";
    //     $_SESSION['sukses'] = $message;
    //     header("location:../detail_artikel.php");
    // } elseif (isset($_POST['hapus_komentar'])) {
    //     $id =  htmlentities(strip_tags(trim($_POST['id'])));
    //     // Mengambil data file didalam table detail_dokumen
    //     $get_komentar = "SELECT * FROM komentar_artikel where id ='$id'";
    //     $data_komentar = mysqli_query($connect, $get_komentar);

    //     if ($id != null) {
    //         deleteKomentar($connect, "id", $id);
    //         $message = "Berhasil menghapus data";
    //         $_SESSION['sukses'] = $message;
    //     } else {
    //         $message = "Gagal menghapus data !!!";
    //         $_SESSION['gagal'] = $message;
    //     }
    //     header("location:../detail_artikel.php");
} elseif (isset($_POST['simpan_komentar'])) {
    // print_r($_POST);
    // exit();
    $id_artikel = htmlentities(strip_tags(trim($_POST['id_artikel'])));
    $nama = htmlentities(strip_tags(trim($_POST['nama'])));
    $email = htmlentities(strip_tags(trim($_POST['email'])));
    $komentar = htmlentities(strip_tags(trim($_POST['komentar'])));

    $encrypted_txt = encrypt_decrypt('encrypt', $id_artikel);

    if(simpanKomentar($connect, $nama, $email, $komentar, $id_artikel)) {
        $message = "Komentar Berhasil dikirim";
        $_SESSION['sukses'] = $message;
    } else {
        $message = "Komentar gagal dikirim, silahkan ulangi lagi";
        $_SESSION['gagal'] = $message;
    }
    header("location:../../user/detail_artikel.php?detail=".$encrypted_txt);
}
