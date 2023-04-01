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
    
    <style>
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

<!-- ==== MAIN MENU START === -->
<div class="lg:mt-12 sm:mb-24 sm:mx-auto sm:max-w-7xl">
        <div class="text-black mx-2 mb-4 mt-14 sm:mx-5 hover:text-black text-start sm:px-2 py-2 rounded-xl bg-[#FFF] text-base shadow-lg transition-all duration-300 shadow-slate-500"
            data-aos="fade-left" data-aos-duration="1500">
            
            <p class="flex flex-row ml-10 mr-10 mt-5 mb-10 items-center justify-center text-sm">Untuk mempermudah pelaku
                usaha
                menentukan
                kategori Bidang
                Usaha yang akan
                dikembangkan
                di Indonesia,
                pemerintah melalui Badan Pusat Statistik (BPS) menyusun Klasifikasi Baku Lapangan Usaha Indonesia (KBLI)
                sebagai panduan penentuan jenis kegiatan usaha/bisnis. Acuan ini diperbarui pada September 2020 sesuai
                dengan Peraturan BPS Nomor 2 Tahun 2020 tentang Klasifikasi Baku Lapangan Usaha Indonesia, dengan
                penambahan
                216 kode KBLI 5 digit dari KBLI 2017, sehingga total saat ini ada 1.790 kode KBLI.</p>
            <p class="flex flex-row ml-10 mr-10 mt-5 mb-10 items-center justify-center text-sm">KBLI adalah
                pengklasifikasian aktivitas/kegiatan ekonomi Indonesia yang menghasilkan produk/output, baik berupa
                barang maupun jasa, berdasarkan lapangan usaha untuk memberikan keseragaman konsep, definisi, dan
                klasifikasi lapangan usaha dalam perkembangan dan pergeseran kegiatan ekonomi di Indonesia.
            </p>

            <!-- Search Start -->
            <form  class="flex items-center md:ml-96 justify-end md:mr-26">
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

            <!-- Search End -->

            <div class="overflow-x-auto p-3">
                <table class="w-full text-black mt-10 hover:text-black text-start px-2 py-2 rounded-lg bg-[#E6E7E8]  shadow-slate-500 mb-8 ">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">

                    <?php	
                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        $query = "SELECT * FROM category WHERE category_id like '%$cari%' OR kode_category like '%$cari%' OR category like '%$cari%' ORDER BY kode_category DESC";
                    }else{
                            $query = "SELECT * FROM category WHERE status = 'on'";
                        }
                        $query = mysqli_query($koneksi, $query); 
                            
                    while ($row = mysqli_fetch_array($query))
                    echo "

                            <a href='" . BASE_URL . "index.php?page=detail_category&category_id=$row[category_id]'>

                            <div class='text-black mt-8 hover:text-black text-start px-2 py-2 rounded-lg bg-[#E6E7E8] shadow-slate-500 mx-6'
                             data-aos='fade-left' data-aos-duration='1500'>
                            <div class='relative mb-2.5'>
                             <p class='bg-[#9B1F15] mt-5 sm:mt-0 flex justify-center items-center p-2 sm:mr-3 sm:mr-0 mx-auto sm:mx-0 mb-5 sm:mb-0 text-[14px] text-white w-10 rounded-lg text-center'>$row[kode_category]</p>
                             <p class='sm:-mt-7 sm:ml-[60px] text-center sm:text-left mx-auto text-[15px] leading-5 text-[#252525]'>$row[category]</p>
                            </div>
                         </div>
                                 </a>"           
?>
                        <!-- record 3 -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>  

        </div>
    </div>

