<?php

    include("../../function/koneksi.php");
    include("../../function/helper.php");


   $kode_1 = $_POST['kode_1'];
   $nama_tiket_1 = $_POST['nama_tiket_1'];
   $category_id = $_POST['category_id'];
   $keterangan = $_POST['keterangan'];
   $status = $_POST['status'];
   $button = $_POST['button'];


    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO tiket (kode_1, nama_tiket_1, category_id, keterangan, status)
                                            VALUES('$kode_1','$nama_tiket_1', '$category_id', '$keterangan', '$status')");
    }
    else if ($button == "Update"){
        $tiket_id = $_GET['tiket_id'];
    
        mysqli_query($koneksi, "UPDATE tiket SET  category_id='$category_id',
                                                  kode_1 = '$kode_1',
                                                  nama_tiket_1='$nama_tiket_1',
                                                  keterangan='$keterangan',
                                                  status='$status' WHERE tiket_id='$tiket_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=data&action=list");
?>