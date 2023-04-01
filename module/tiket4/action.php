<?php

    include("../../function/koneksi.php");
    include("../../function/helper.php");


    $kode_4 = $_POST['kode_4'];
    $nama_tiket_4 = $_POST['nama_tiket_4'];
    $tiket3_id = $_POST['tiket3_id'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];
    $button = $_POST['button'];


    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO tiket4 (kode_4, nama_tiket_4, tiket3_id, keterangan, status)
        VALUES('$kode_4','$nama_tiket_4', '$tiket3_id', '$keterangan', '$status')");
    }
    else if ($button == "Update"){
        $tiket4_id = $_GET['tiket4_id'];
    
        mysqli_query($koneksi, "UPDATE tiket4 SET tiket3_id='$tiket3_id',
                                                  kode_4='$kode_4',
                                                  nama_tiket_4='$nama_tiket_4',
                                                  keterangan='$keterangan',
                                                  status='$status' WHERE tiket4_id='$tiket4_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=tiket4&action=list");
?>