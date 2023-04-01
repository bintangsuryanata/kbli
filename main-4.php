<?php

    $tiket4_id = isset($_GET['tiket4_id']) ? $_GET['tiket4_id'] : false;

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
		$tiket4_id = $_GET['tiket4_id'];

		$query = mysqli_query($koneksi, "SELECT * FROM tiket4 WHERE tiket4_id='$tiket4_id' AND status='on'");
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
                    <p class="bg-[#525252] flex justify-center items-center p-2 mr-3 text-[14px] text-white w-[90px] h-[50px] rounded-sm text-center -mt-[50px] ml-[110px] text-[12px]  font-black"><?php echo $row[ 'kode_4' ]?></p>
            </div>
        

            <!-- PHP SEARCH -->

            <?php 
                 if(isset($_GET['search'])){
	             $search = $_GET['search'];
                 }
            ?>

             <!-- PHP SEARCH END -->

            <p class="text-[15px] font-light  ml-8 mt-3 "><?php echo $row[ 'nama_tiket_4' ]?></p>

            <p class="mt-6 ml-8 text-[16px] font-black">URAIAN</p>

            <p class="mt-4 ml-8 text-[14px] tracking-tighter"><?php echo $row[ 'keterangan' ]?></p>

            <p class="mt-7 ml-8 text-[16px] font-black">SEBELUMNYA</p>

            <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM tiket3 WHERE status='on' ORDER BY kode_3 ASC");
                    while($row=mysqli_fetch_array($query)){
                        if($tiket3_id == $row['tiket3_id']){
                            echo "
                    <a href='" . BASE_URL . "index.php?page=main-3&tiket3_id=$row[tiket3_id]'>
                        <div class='text-black border border-black  mt-3 hover:text-black text-start px-2 py-2 rounded-lg shadow-slate-500 mb-8 mx-6'
                        data-aos='fade-left' data-aos-duration='1500'>
                           <div class='relative mb-2.5'>
                                <p class='bg-[#D4D4D4] flex justify-center items-center font-black p-2 mr-3 text-[14px] text-black w-10 rounded-lg text-center'>$row[kode_3]</p>
                                <p class='-mt-7 ml-[60px] text-[15px] font-black leading-5 text-[#252525]'>$row[nama_tiket_3]</p>
                           </div>
                        </div>
                    </a>";
                        }
                    }
                ?>



            </div>
    </div>

    <!-- === MAIN MENU END === -->