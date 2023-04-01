<?php

    $tiket4_id = isset($_GET['tiket_id']) ? $_GET['tiket_id'] : false;

    $kode_4 = "";
    $nama_tiket_4 = "";
    $tiket3_id = "";
    $keterangan = "";
    $status = "";
    $button = "Add";

    if($tiket4_id){
        $query = mysqli_query($koneksi, "SELECT * FROM tiket4 WHERE tiket4_id='$tiket4_id'");
        $row = mysqli_fetch_assoc($query);

        $kode_4 = $row['kode_4'];
        $nama_tiket_4 = $row['nama_tiket_4'];
        $tiket3_id = $row['tiket3_id'];
        $keterangan = $row['keterangan'];
        $status = $row['status'];
        $button = "Update";
    }

?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL."module/tiket4/action.php?tiket4_id=$tiket4_id"; ?>" method="POST" enctype="multipart/form-data">

    <div class="element-form">
            <label>Data IV</label>
            <span>

            <select name="tiket3_id">
                   <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tiket3 WHERE status='on' ORDER BY kode_3 ASC");
                    while($row=mysqli_fetch_array($query)){
                        if($tiket3_id == $row['tiket3_id']){
                            echo "<option value='$row[tiket3_id]' selected='true'>[$row[kode_3]] $row[nama_tiket_3]</option>";
                        }else{
                            echo "<option value='$row[tiket3_id]'>[$row[kode_3]] $row[nama_tiket_3]</option>";
                        }
                    }
                ?>
            </select>

        </span>
    </div>
    
    <div class="element-form">
        <label>Kode</label>
        <span><input type="text" name="kode_4" value="<?php echo $kode_4; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Nama Data</label>
        <span><input type="text" name="nama_tiket_4" value="<?php echo $nama_tiket_4; ?>" /></span>
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