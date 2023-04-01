
<?php

    if($user_id){
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
    }else{
        header("location: ".BASE_URL."index.php?page=login");
    }

?>
<div id="container">
<div id="bg-page-profile">

    <div id="menu-profile">

        <ul>
            <?php
                if($level == "superadmin"){
            ?>
                <li>
                    <a <?php if($module == "category"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=category&action=list"; ?>">Category</a>
                </li>
                <li>
                    <a <?php if($module == "data"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=data&action=list"; ?>">Turunan I</a>
                </li>
                <li>
                    <a <?php if($module == "tiket2"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=tiket2&action=list"; ?>">Turunan II</a>
                </li>
                <li>
                    <a <?php if($module == "tiket3"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=tiket3&action=list"; ?>">Turunan III</a>
                </li>
                <li>
                    <a <?php if($module == "tiket4"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=tiket4&action=list"; ?>">Turunan IV</a>
                </li>
                <li>
                    <a <?php if($module == "user"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>">User</a>
                </li>
                <?php
                    }
                ?>
        </ul>

    </div>

    <div id="profile-content">
        <?php
        $file = "module/$module/$action.php";
        if(file_exists($file)){
            include_once($file);
        }else{
            echo "<h3>Maaf, halaman tersebut tidak ditemukan</h3>";
        }
    ?>
    </div>
</div>
</div>