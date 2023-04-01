<?php

    $tiket_id = isset($_GET['tiket_id']) ? $_GET['tiket_id'] : false;

    $kode_1 = "";
    $nama_tiket_1 = "";
    $category_id = "";
    $keterangan = "";
    $status = "";
    $keterangan_gambar = "";
    $button = "Add";

    if($tiket_id){
        $query = mysqli_query($koneksi, "SELECT * FROM tiket WHERE tiket_id='$tiket_id'");
        $row = mysqli_fetch_assoc($query);

        $kode_1 = $row['kode_1'];
        $nama_tiket_1 = $row['nama_tiket_1'];
        $category_id = $row['category_id'];
        $keterangan = $row['keterangan'];
        $status = $row['status'];
        $button = "Update";
    }

?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL."module/data/action.php?tiket_id=$tiket_id"; ?>" method="POST" enctype="multipart/form-data">

    <div class="element-form">
            <label>Kategori</label>
            <span>

               <select name="category_id">
                   <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM category WHERE status='on' ORDER BY kode_category ASC");
                    while($row=mysqli_fetch_array($query)){
                        if($category_id == $row['category_id']){
                            echo "<option value='$row[category_id]' selected='true'>[$row[kode_category]] $row[category]</option>";
                        }else{
                            echo "<option value='$row[category_id]'>[$row[kode_category]] $row[category]</option>";
                        }
                    }
                ?>
            </select>

        </span>
    </div>
    
    <div class="element-form">
        <label>Kode</label>
        <span><input type="text" name="kode_1" value="<?php echo $kode_1; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Nama Data</label>
        <span><input type="text" name="nama_tiket_1" value="<?php echo $nama_tiket_1; ?>" /></span>
    </div>

    <div class="element-form">
        <label style="font-weight:bold">Uraian</label>
        <span><textarea name="keterangan" id="editor"><?php echo $keterangan; ?></textarea></span>
    </div>

    <div class="element-form">
            <label>Status</label>
            <span>
                <input type="radio" name="status" value="on" <?php if($status == "on"){ echo "checked='true'"; } ?> /> On
                <input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked='true'"; } ?> />Off
            </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
    </div>

</form>

<script>
    CKEDITOR.replace("editor");
</script>