<?php

    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

    $button = "Update";
    $queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");

    $row=mysqli_fetch_array($queryUser);

    $nama = $row["nama"];
    $email = $row["email"];
    $status = $row["status"];
    $level = $row["level"];
?>
<form action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST">

    <div class="element-form">
        <label>Nama Lengkap</label>
        <span><input type="text" name="nama" value="<?php echo $nama; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Email</label>
        <span><input type="text" name="email" value="<?php echo $email; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Password</label>
        <span><input type="text" name="password" value="<?php echo $password; ?>" /></span>
    </div>
    
    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if($status == "on"){ echo "checked"; } ?> /> On
            <input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked"; } ?> /> Off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>" class="submit-my-profile" /></span>
    </div>
</form>