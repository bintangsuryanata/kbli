<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=tiket4&action=form"; ?>" class="tombol-action">+ Add Data IV</a>
</div>

<?php

$query = mysqli_query($koneksi, "SELECT tiket4.*, tiket3.kode_3 FROM tiket4 JOIN tiket3 ON tiket4.tiket3_id=tiket3.tiket3_id ORDER BY status ASC,kode_3 ASC");

    if(mysqli_num_rows($query) == 0){
        echo "<h3>Saat ini belum ada tiket di dalam table tiket </h3>";
    }else{

        echo "<table class='table-list'>";

        echo "<tr class='baris-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kolom-nomor'>Kode</th>
                <th class='kiri'>Kasus</th>
                <th class='kiri'>Uraian</th>
                <th class='kiri'>Turunan</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Action</th>
            </tr>";

            $no=1;
            while($row=mysqli_fetch_assoc($query)){

                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td class='kiri'>$row[kode_4]</td>
                        <td class='kiri'>$row[nama_tiket_4]</td>
                        <th class='kiri'>
                        <a class='text-garisbawah' href='".BASE_URL."index.php?page=my_profile&module=tiket4&action=form&tiket_id=$row[tiket4_id]'>See More</a>
                        </th>
                        <td class='kiri'>$row[kode_3]</td>
                        <td class='tengah'>$row[status]</td>
                        <td class='tengah'>
                            <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=tiket4&action=form&tiket_id=$row[tiket4_id]'>Edit</a>
                        </td>
                    </tr>";

                $no++;
            }

            echo "</table>";

    }

?>