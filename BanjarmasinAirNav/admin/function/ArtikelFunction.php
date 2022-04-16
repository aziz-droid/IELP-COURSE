<?php

function addArtikel($connect, $judul, $isi, $gambar_artikel, $id_akun)
{
    $queri = "INSERT INTO artikel(`judul`,`isi`,`gambar_artikel`,`id_akun`)
            VALUES ('$judul','$isi','$gambar_artikel','$id_akun')";
    $process = mysqli_query($connect, $queri);
    if ($process) {
        return true;
    }
    return false;
}


function updateArtikel($connect, $where, $myvalue)
{
    $queri = " UPDATE artikel SET";

    $par = array_keys($myvalue);


    for ($a = 0; $a < (sizeof($myvalue) - 1); $a++) {
        $queri = $queri . " " . $par[$a] . "= '" . $myvalue[$par[$a]] . "',";
    }

    $queri = $queri . " " . $par[$a] . "= '" . $myvalue[$par[$a]] . "' WHERE ";

    $par = array_keys($where);


    for ($a = 0; $a < (sizeof($where) - 1); $a++) {
        $queri = $queri . " " . $par[$a] . "= '" . $where[$par[$a]] . "' and ";
    }

    $queri = $queri . " " . $par[$a] . "= '" . $where[$par[$a]] . "' ";

    $process = mysqli_query($connect, $queri);

    if ($process)
        return true;

    return false;
}


function deleteArtikel($connect, $where, $myvalue)
{
    $where = strtolower($where);
    if ($where == "all")
        $queri = "DELETE FROM artikel WHERE 1";
    else
        $queri = "DELETE FROM artikel where $where = $myvalue";

    $process = mysqli_query($connect, $queri);
    if ($process)
        return true;

    return false;
}


function showArtikel($connect, $where, $myvalue)
{

    $where = strtolower($where);
    if ($where == "terkini")
        $queri = "SELECT * FROM artikel ORDER BY id DESC LIMIT 3";
    elseif ($where == "all")
        $queri = "SELECT * FROM artikel ORDER BY id DESC ";
    else
        $queri = "SELECT * FROM artikel where $where = '$myvalue'";

    $info = array();
    $a = 0;
    $process = mysqli_query($connect, $queri);
    while ($data = mysqli_fetch_array($process)) {
        $users = showUsers($connect, 'id', $data['id_akun']);
        $info[$a] = array(
            "id" => $data['id'],
            "nama" => $users[0]['nama'],
            "judul" => $data['judul'],
            "isi" => $data['isi'],
            "gambar_artikel" => $data['gambar_artikel'],
            "id_akun" => $data['id_akun'],
            "foto_profil" => $users[0]['foto_profil'],
            "created_at" => $data['created_at'],
        );
        $a++;
    }
    return $info;
}

function simpanKomentar($connect, $nama, $email, $komentar, $id_artikel)
{
    $queri = "INSERT INTO komentar_artikel(`nama`,`email`,`komentar`,`id_artikel`)
            VALUES ('$nama','$email','$komentar', '$id_artikel')";
    $process = mysqli_query($connect, $queri);
    if ($process)
        return true;

    return false;
}

function showKomentar($connect, $where, $myvalue)
{
    $where = strtolower($where);
    if ($where == "all")
        $queri = "SELECT * FROM komentar_artikel";
    else
        $queri = "SELECT * FROM komentar_artikel where $where = '$myvalue' order by id desc";

    $info = array();
    $a = 0;
    $process = mysqli_query($connect, $queri);
    while ($data = mysqli_fetch_array($process)) {
        $artikel = showArtikel($connect, 'id', $data['id_artikel']);
        $info[$a] = array(
            "id" => $data['id'],
            "nama" => $data['nama'],
            "email" => $data['email'],
            "komentar" => $data['komentar'],
            "id_artikel" => $data['id_artikel'],
            "created_at" => $data['created_at'],
        );
        $a++;
    }
    return $info;
}
