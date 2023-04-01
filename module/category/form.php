<?php

    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : false;

    $kode_category = "";
    $category = "";
    $keterangan = "";
    $status = "";
    $button = "Add";

    if($category_id){
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM category WHERE category_id='$category_id'");
        $row = mysqli_fetch_assoc($queryKategori);

        $kode_category = $row['kode_category'];
        $category = $row['category'];
        $keterangan = $row['keterangan'];
        $status = $row['status'];
        $button = "Update";
    }

?>
<form action="<?php echo BASE_URL."module/category/action.php?category_id=$category_id"; ?>" method="POST">

    <div class="element-form">
        <label>Kode</label>
        <span><input type="text" name="kode_category" value="<?php echo $kode_category; ?>" /></span>
    </div>

    <div class="element-form">
            <label>Kategori</label>
            <span><input type="text" name="category" value="<?php echo $category; ?>" /></span>
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