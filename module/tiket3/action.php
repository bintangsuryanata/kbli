<?php

    include("../../function/koneksi.php");
    include("../../function/helper.php");


    $kode_3 = $_POST['kode_3'];
    $nama_tiket_3 = $_POST['nama_tiket_3'];
    $tiket2_id = $_POST['tiket2_id'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];
    $button = $_POST['button'];


    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO tiket3 (kode_3, nama_tiket_3, tiket2_id, keterangan, status)
        VALUES('$kode_3','$nama_tiket_3', '$tiket2_id', '$keterangan', '$status')");
    }
    else if ($button == "Update"){
        $tiket3_id = $_GET['tiket3_id'];
    
        mysqli_query($koneksi, "UPDATE tiket3 SET tiket2_id='$tiket2_id',
                                                  kode_3='$kode_3',
                                                  nama_tiket_3='$nama_tiket_3',
                                                  keterangan='$keterangan',
                                                  status='$status' WHERE tiket3_id='$tiket3_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=tiket3&action=list");
?>