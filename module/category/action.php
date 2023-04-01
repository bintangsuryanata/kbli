<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");

    $kode_category = $_POST['kode_category'];
    $category = $_POST['category'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];
    $button = $_POST['button'];

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO category (kode_category, category, keterangan, status) VALUES('$kode_category', '$category', '$keterangan', '$status')");
    }
    else if($button == "Update"){
        $category_id = $_GET['category_id'];

        mysqli_query($koneksi, "UPDATE category SET category='$category',
                                                   kode_category='$kode_category',
                                                   keterangan='$keterangan',
                                                   status='$status' WHERE category_id='$category_id'");
    }
    
    header("location:" .BASE_URL."index.php?page=my_profile&module=category&action=list");
?>