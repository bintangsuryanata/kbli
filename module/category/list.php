<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=category&action=form"; ?>" class="tombol-action">+ Add Category</a>
</div>

<?php

    $queryStadiun = mysqli_query($koneksi, "SELECT * FROM category ORDER BY  status ASC,kode_category ASC");

    if(mysqli_num_rows($queryStadiun) == 0){
        echo "<h3>Saat ini belum ada Category di dalam table Category</h3>";
    }else{

        echo "<table class='table-list'>";

        echo "<tr class='baris-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kolom-nomor'>Kode</th>
                <th class='kiri'>Nama Kategori</th>
                <th class='kiri'>Uraian</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Action</th>
            </tr>";

        $no=1;
        while($row=mysqli_fetch_assoc($queryStadiun)){

            echo "<tr>
                    <th class='kolom-nomor'>$no</th>
                    <th class='kolom-nomor'>$row[kode_category]</th>
                    <th class='kiri'>$row[category]</th>
                    <th class='kiri'>
                        <a class='text-garisbawah' href='".BASE_URL."index.php?page=my_profile&module=category&action=form&category_id=$row[category_id]'>See More</a>
                    </th>
                    <th class='tengah'>$row[status]</th>
                    <th class='tengah'>
                        <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=category&action=form&category_id=$row[category_id]'>Edit</a>
                    </th>
                </tr>";

                $no++;
        }

        echo "</table>";
        
    }

?>