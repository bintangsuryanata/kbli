<?php

session_start();

include_once("function/koneksi.php");
include_once("function/helper.php");

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

?>

<?php
    include_once("function/helper.php");
    $page = isset($_GET['page']) ? $_GET['page'] : false;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>KBLI - 2020</title>
        <!-- favicon link -->
        <link rel="shortcut icon" href="https://dataumkm.com/assets/images/icon2.png" type="image/x-icon">
        <!-- google font link -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Signika:wght@700&display=swap" rel="stylesheet">
        <!-- tailwind css cdn -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- ionicons cdn -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <!-- alpine js cdn -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <style>

body {
    font-family: Montserrat;
    font-size: 12px;
    color: #f7f7f7;
}

#container {
    width: 1100px;
    height: auto;
    margin: 0px auto;
    padding: 10px;
}

#container #header{
    margin-top: 20px;
}

#container #header #menu{
    background: rgb(214, 140, 1);
    padding: 5px 10px;
    overflow: hidden;
}

#container #header #menu #user{
    float: left;
    color: white;
}

#container #header #menu #user a {
    color: white;
    padding: 5px;
    margin-top: 5px;
    display: inline-block;
    text-decoration: none;
}

#container #header #menu #button-Keranjang {
    float: right;
    background: darkred;
    padding: 2px 10px;
    border-radius: 3px;
    text-decoration: none;
}

#container #header #menu #button-keranjang img {
    vertical-align: bottom;
}

#container #footer {
    background: rgb(214, 140, 1);
    padding: 10px;
    margin-top: 100px;
}

#container #footer p {
    color: white;
    text-align: right;
    font-size: 10px;
    font-style: italic;
    margin: 0px;
}

#container #content {
    padding: 10px 0px;
    overflow: hidden;
}

#container-user-akses {
    width: 350px;
    height: auto;
    margin: 50px auto;
}

.element-form {
    margin-bottom: 15px;
}

.element-form label {
    display: block;
    font-weight: bold;
    color: black;
}

.element-form span {
    display: block;
    color: black;
}

.element-form span {
    display: block;
    color: black;
}

.element-form span input[type="text"],
.element-form span input[type="password"],
.element-form span textarea,
.element-form span select {
    width: 100%;
    padding: 5px;
    box-sizing: border-box;
    color:black;
} 

.element-form span input[type="submit"] {
    background: #1e5474;
    border: none;
    color: white;
    padding: 7px 20px;
    border-radius: 3px;
    font-size: 9px;
    cursor: pointer;
}

.element-form span input[type="submit"]:hover{
    background: orange;
}

.notif {
    background: rgb(214, 140, 1);
    color: white;
    padding: 10px;
    margin-bottom: 10px;
    font-size: 11px;
}

#bg-page-profile {
    overflow: hidden;
}

#menu-profile {
    float: left;
    width: 955px;
    margin-left: 50px;
    background: #1e5474;
}

#menu-profile ul {
    margin: 0px;
    padding: 0px;
    list-style: none;
}

#menu-profile ul li a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 20px 30px;
    font-size: 15px;
}

#menu-profile ul li a:hover,
#menu-profile ul li a.active {
    background: orange;
}

#profile-content {
    margin-left: 50px;
    float: left;
    width: 955px;
    padding: 10px;
    background: grey;
}

.table-list {
    width: 100%;
    border-collapse: collapse;
}

.table-list tr {
    border-bottom: 3px solid orange;
    background: grey;
}

.table-list tr.baris-title {
    background: orange;
}

.table-list tr th,
.table-list tr td  {
    padding: 25px 30px;
    font-size: 13px;
}

.kolom-nomor {
    width: 20px;
    text-align: center;
}

.tengah {
    text-align: center;
}

.kiri {
    text-align: left;
}

.kanan {
    text-align: right;
}

#frame-tambah {
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: right;
}

.tombol-action {
    background: #1e5474;
    color: white;
    padding: 12px 28px;
    border-radius: 3px;
    cursor: pointer;
    text-decoration: none;
    margin-right: 3px;
    font-size: 13px;
}

.tombol-action:hover {
	background:orange;
}

#kiri {
    width: 245px;
    height: auto;
    float: left;
}

#menu-kategori ul {
    list-style: none;
    margin: 0px;
    padding: 0px;
}

#menu-kategori ul li {
    margin-bottom: 5px;
}

#menu-kategori ul li a {
    display: block;
    padding: 10px;
    background: white;
    color: #1e5474;
    text-decoration: none;
}

#menu-kategori ul li a:hover,
#menu-kategori ul li a.active {
	background:#e8e8e8;
}

#kanan {
    width: 840px;
    margin-left: 15px;
    height: auto;
    float: left;
}

#kanan #frame-barang ul {
    list-style: none;
    margin: 0px;
    padding: 0px;
    overflow: hidden;
}

#kanan #frame-barang ul li {
    width: 240px;
    background: grey;
    padding: 10px 15px;
    margin-bottom: 15px;
    margin-right: 15px;
    float: left;
}

#kanan #frame-barang ul li .price {
    font-size: 15px;
    font-weight: bold;
    text-align: right;
    margin-bottom: 10px;
}

#kanan #frame-barang ul li a img {
    display: block;
    width: 240px;
}

#kanan #frame-barang ul li .keterangan-gambar {
    border-top: 1px solid #E6E6E6;
    border-bottom: 1px solid #E6E6E6;
    padding: 10px 0px;
    height: 50px;
}

#kanan #frame-barang ul li .keterangan-gambar p {
    text-align: center;
    margin: 5px 0px;
}

#kanan #frame-barang ul li .keterangan-gambar p a {
    font-weight: bold;
    text-decoration: none;
}

#kanan #frame-barang ul li .keterangan-gambar span {
    display: block;
    text-align: center;
}

#kanan #frame-barang ul li .button-add-cart {
    text-align: center;
}

#kanan #frame-barang ul li .button-add-cart a {
    background: #1e5474;
    color: white;
    text-decoration: none;
    padding: 5px 10px;
    display: inline-block;
    margin-top: 10px;
    border-radius: 3px;
}

#kanan #frame-barang ul li .button-add-cart a:hover {
    background:orange;
}

#detail-barang {
    background: purple;
    padding: 15px;
}

#detail-barang h2 {
    margin-top: 0px;
}

#detail-barang #frame-gambar {
    background: grey;
    padding: 20px;
}

#detail-barang #frame-gambar img {
    display: block;
    margin: 0px auto;
}

#detail-barang #frame-harga {
    margin: 15px 0px;
}

#detail-barang #frame-harga span {
    font-size: 15px;
    font-weight: bold;
    color: red;
}

#detail-barang #frame-harga a {
    background: #1e5474;
    color: white;
    text-decoration: none;
    padding: 5px 10px;
    display: inline-block;
    float: right;
    border-radius: 3px;
}

#detail-barang #frame-harga a:hover {
    background:orange;
}

#detail-barang #keterangan {
    margin: 20px 0px;
}

.total-barang {
    color: white;
    text-decoration: none;
    font-size: 10px;
    font-weight: bold;
    vertical-align: top;
}

.update-quantity {
    width: 30px;
    text-align: center;
}

.kanan.hapus_item {
    position: relative;
}

.kanan.hapus_item a {
    position: absolute;
    top: 0px;
    right: 0px;
    text-decoration: none;
    color: #1e5474;
}

.kanan.hapus_item a:hover {
    color:orange;
}

#frame-button-keranjang a {
    background: #1e5474;
    color: white;
    text-decoration: none;
    padding: 7px 20px;
    display: inline-block;
    margin-top: 15px;
}

#lanjut-belanja {
    float: left;
}

#lanjut-pemesanan {
    float: right;
}

#frame-data-pengiriman {
    float: left;
    width: 500px;
    margin-right: 20px;
    margin-left: 10px;
}

#frame-data-detail {
    float: left;
    width: 560px;
}

#frame-detail-order {
	border: 1px solid grey;
	padding-inline: 10px;
	display: flex;
	flex-direction: row;
	justify-content: space-between;
}

#frame-form-pengiriman {
    border: 1px solid grey;
    padding: 25px;
}

h3.label-data-pengiriman {
    border: 1px solid grey;
    padding: 10px 7px;
    margin: 0px;
}

.standart-img {
    width: 275px;
    height: 350px;
    object-fit: cover;
}

.image-standard2 {
    width: 820px;
    height: 350px;
    object-fit: cover;
}
.text-garisbawah{
    text-decoration: underline;
}
        </style>
    </head>

    <body>

<!-- ====== header ====== -->

    <header class="absolute sticky left-0 top-0 z-50 bg-[#2f3b59] w-full">
        <div class="mx-auto h-[90px] max-w-7xl px-8 md:px-6">
            <div class="relative flex h-full items-center justify-between border-b border-slate-500/10">
                <!-- logo -->
                <div class="w-[20rem] max-w-full">
                    <a href="index.php">
                        <img src="https://dataumkm.com/assets/images/icon2.png" alt="logo" class="w-full">
                    </a>
                </div>

                <?php
                if($user_id){
                    echo"
                <!-- menu -->
            <div class='flex w-full items-center justify-between sm:ml-96'>
                <ul class='flex flex-col justify-center gap-8 lg:flex-row'>
                        <p href='#' class='text-[10px] sm:text-lg ml-10 font-medium text-white duration-200 lg:text-base'>Hi, <b>$nama</a>
                        <a href='".BASE_URL."index.php?page=my_profile&module=category&action=list' class='text-[10px] sm:text-lg font-medium text-white ml-11 duration-200 hover:text-blue-600 lg:text-base'>My Profile</a>
                </ul>
            </nav>
        </div>
                <!-- menu btn -->
                <div class='flex'>
                    
                    <a href='".BASE_URL."logout.php'
                        class='sm:mr-10 rounded-md bg-red-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 duration-200 hover:bg-blue-600 sm:block lg:mr-0'>Logout</a>
                </div>
            </div>";
        }else{

            echo "

            <div class='flex w-full items-center justify-between'>
        </div>
            <!-- menu btn -->
                <div class='flex'>
                    
                    <a href='".BASE_URL."index.php?page=login'
                        class='sm:mr-10 rounded-md bg-blue-500 px-8 py-2.5 font-semibold text-white shadow-md shadow-blue-500/20 duration-200 hover:bg-blue-600 sm:block lg:mr-0'>Login</a>
                </div>
            </div>";
        }
            ?>
        </div>
    </header>
        
<!-- ====== END header ====== -->
    
            <div id="header">
        </div>
        <div id="content">
            <?php
            $filename = "$page.php";

            if(file_exists($filename)){
                include_once($filename);
            } else {
                include_once("main.php");
            }
            ?>
        </div>
        <div id="footer">
        <footer class="bg-[#2F3B59] pt-28">
        <div class="mx-auto max-w-7xl px-8 md:px-6">

            <!-- footer top -->
            <div class="grid gap-16 row-gap-10 mb-8 lg:grid-cols-6">
                <div class="md:max-w-md lg:col-span-2">
                    <img src="https://dataumkm.com/assets/images/icon2.png"
                        alt="footer logo" class="w-36">
                    <div class="mt-4 lg:max-w-sm">
                        <p class="text-sm text-slate-500">Dataumkm.com adalah Aplikasi Basis Data dan Pemetaan untuk Usaha Mikro, Usaha Kecil dan Menengah, dan Pelaku Ekonomi Kreatif se Indonesia.</p>
                    </div>
                </div>

            </div>
            <!-- End footer top -->

                <!-- footer bottom -->
                <div class="flex flex-col justify-between border-t py-8 sm:flex-row">
                    <p class="text-sm text-slate-500">© Copyright 2023 <a href="#"
                            class="text-white hover:text-red-700 transition-all">PT Jawara Data Nusantara</a> All rights reserved.</p>
                    <div class="mt-4 flex items-center space-x-4 sm:mt-0">
                        <a href="https://www.facebook.com/dataumkm">
                            <ion-icon name="logo-facebook" class="text-2xl text-slate-500 hover:text-blue-500 duration-300">
                            </ion-icon>
                        </a>
                        <a href="https://twitter.com/dataumkm">
                            <ion-icon name="logo-twitter" class="text-2xl text-slate-500 hover:text-blue-500 duration-300">
                            </ion-icon>
                        </a>
                        <a href="https://www.instagram.com/dataumkm/">
                            <ion-icon name="logo-instagram" class="text-2xl text-slate-500 hover:text-blue-500 duration-300">
                            </ion-icon>
                        </a>
                    </div>
                </div>
                <!-- End footer bottom -->

        </div>
    </footer>
        </div>
        </div>
    </body>
</html>