<?php

    $tiket2_id = isset($_GET['tiket_id']) ? $_GET['tiket_id'] : false;

    $kode_2 = "";
    $nama_tiket_2 = "";
    $tiket_id = "";
    $keterangan = "";
    $status = "";
    $button = "Add";

    if($tiket2_id){
        $query = mysqli_query($koneksi, "SELECT * FROM tiket2 WHERE tiket2_id='$tiket2_id'");
        $row = mysqli_fetch_assoc($query);

        $kode_2 = $row['kode_2'];
        $nama_tiket_2 = $row['nama_tiket_2'];
        $tiket_id = $row['tiket_id'];
        $keterangan = $row['keterangan'];
        $status = $row['status'];
        $button = "Update";
    }

?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL."module/tiket2/action.php?tiket2_id=$tiket2_id"; ?>" method="POST" enctype="multipart/form-data">

    <div class="element-form">
            <label>Data I</label>
            <span>

            <select name="tiket_id">
                   <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tiket WHERE status='on' ORDER BY kode_1 ASC");
                    while($row=mysqli_fetch_array($query)){
                        if($tiket_id == $row['tiket_id']){
                            echo "<option value='$row[tiket_id]' selected='true'>[$row[kode_1]] $row[nama_tiket_1]</option>";
                        }else{
                            echo "<option value='$row[tiket_id]'>[$row[kode_1]] $row[nama_tiket_1]</option>";
                        }
                    }
                ?>
            </select>

        </span>
    </div>
    
    <div class="element-form">
        <label>Kode</label>
        <span><input type="text" name="kode_2" value="<?php echo $kode_2; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Nama Data</label>
        <span><input type="text" name="nama_tiket_2" value="<?php echo $nama_tiket_2; ?>" /></span>
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