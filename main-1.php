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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data UMKM</title>
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
    <!-- style css -->
    <style type="text/tailwindcss">
        body{
            font-family: 'Montserrat', sans-serif;
            background-color: #F2F2F2;
        }
        /* CUSTOM SCROLLBAR START*/

/* width */
::-webkit-scrollbar {
  width: 15px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #14A0F9; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #2F3B59; 
}

/* CUSTOM SCROLLBAR END*/
    </style>
</head>
<?php	
		$tiket_id = $_GET['tiket_id'];

		$query = mysqli_query($koneksi, "SELECT * FROM tiket WHERE tiket_id='$tiket_id' AND status='on'");
		$row = mysqli_fetch_assoc($query);
?>

<div class="lg:mt-12 sm:mb-24 sm:mx-auto sm:max-w-7xl">
        <div class="text-black mx-2 mb-4 mt-14 sm:mx-5 hover:text-black text-start sm:px-2 py-2 rounded-xl bg-[#FFF] text-base shadow-lg transition-all duration-300 shadow-slate-500"
            data-aos="fade-left" data-aos-duration="1500">

            <form  class="flex items-center mt-10 mr-10 md:ml-96 justify-end md:mr-26">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-72">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" name="cari" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search" required>
                </div>
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-500 rounded-lg border border-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>

        
            <div class="sm:mb-4.5 sm:-mt-[44px] ml-[31px] mt-8 mb-5 ">
                    <p class="bg-[#9B1F15] flex justify-center items-center p-2 mr-3 text-[14px] text-white w-[120px] h-[50px] rounded-sm text-center font-black">KBLI 2020</p>
                    <p class="bg-[#525252] flex justify-center items-center p-2 mr-3 text-[14px] text-white w-[90px] h-[50px] rounded-sm text-center -mt-[50px] ml-[110px] text-[12px]  font-black"><?php echo $row[ 'kode_1' ]?></p>
            </div>
            
        

            <!-- PHP SEARCH -->

            <?php 
                 if(isset($_GET['search'])){
	             $search = $_GET['search'];
                 }
            ?>

             <!-- PHP SEARCH END -->

            <p class="text-[15px] font-light  ml-8 mt-3 "><?php echo $row[ 'nama_tiket_1' ]?></p>

            <p class="mt-6 ml-8 text-[16px] font-black">URAIAN</p>

            <p class="mt-4 ml-8 text-[14px] tracking-tighter"><?php echo $row[ 'keterangan' ]?></p>

            <p class="mt-7 ml-7 text-[16px] font-black">SEBELUMNYA</p>

            <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM category WHERE status='on' ORDER BY kode_category ASC");
                    while($row=mysqli_fetch_array($query)){
                        if($category_id == $row['category_id']){
                            echo "
                    <a href='" . BASE_URL . "index.php?page=detail_category&category_id=$row[category_id]'>
                        <div class='text-black border border-black  mt-3 hover:text-black text-start px-2 py-2 rounded-lg shadow-slate-500 mb-8 mx-6'
                        data-aos='fade-left' data-aos-duration='1500'>
                           <div class='relative mb-2.5'>
                                <p class='bg-[#D4D4D4] flex justify-center items-center font-black p-2 mr-3 text-[14px] text-black w-10 rounded-lg text-center'>$row[kode_category]</p>
                                <p class='-mt-7 ml-[60px] text-[15px] font-black leading-5 text-[#252525]'>$row[category]</p>
                           </div>
                        </div>
                    </a>";
                        }
                    }
                ?>


            <p class="mt-7 ml-8 text-[16px] font-black">TURUNAN</p>


            <!-- PHP SHOW DATA -->
            <?php
                     if ($tiket_id) {
                        $queryTiket = mysqli_query($koneksi, "SELECT * FROM tiket2 WHERE tiket_id='$tiket_id' AND status='on' ORDER BY kode_2 ASC");
                    } else {
                        $queryTiket = mysqli_query($koneksi, "SELECT * FROM tiket2 WHERE status='on' ORDER BY kode_2 ASC");
                    }
        
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($queryTiket)){
                        $style  =   false;
                        if($no == 3){
                            $style  = "style='margin-right:0px'";
                            $no     = 0;
                        }
                        

                echo "
                    <a href='" . BASE_URL . "index.php?page=main-2&tiket2_id=$row[tiket2_id]'>
                        <div class='text-black border border-black  mt-3 hover:text-black text-start px-2 py-2 rounded-lg shadow-slate-500 mb-8 mx-6'
                        data-aos='fade-left' data-aos-duration='1500'>
                           <div class='relative mb-2.5'>
                                <p class='bg-[#D4D4D4] flex justify-center items-center font-black p-2 mr-3 text-[14px] text-black w-10 rounded-lg text-center'>$row[kode_2]</p>
                                <p class='-mt-7 ml-[60px] text-[15px] font-black leading-5 text-[#252525]'>$row[nama_tiket_2]</p>
                           </div>
                        </div>
                    </a>";
                    }
            ?>

            <!-- PHP SHOW DATA END -->


            </div>
    </div>

    <!-- === MAIN MENU END === -->



    
    <!-- ====== footer ====== -->

    <footer class="bg-[#2F3B59] pt-16">
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

    <!-- ====== END footer ====== -->

