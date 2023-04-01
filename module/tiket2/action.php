<?php

    include("../../function/koneksi.php");
    include("../../function/helper.php");


    $kode_2 = $_POST['kode_2'];
    $nama_tiket_2 = $_POST['nama_tiket_2'];
    $tiket_id = $_POST['tiket_id'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];
    $button = $_POST['button'];


    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO tiket2 (kode_2, nama_tiket_2, tiket_id, keterangan, status)
        VALUES('$kode_2','$nama_tiket_2', '$tiket_id', '$keterangan', '$status')");
    }
    else if ($button == "Update"){
        $tiket2_id = $_GET['tiket2_id'];
    
        mysqli_query($koneksi, "UPDATE tiket2 SET tiket_id='$tiket_id',
                                                  kode_2='$kode_2',
                                                  nama_tiket_2='$nama_tiket_2',
                                                  keterangan='$keterangan',
                                                  status='$status' WHERE tiket2_id='$tiket2_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=tiket2&action=list");
?>