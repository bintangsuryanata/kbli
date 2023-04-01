<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=tiket3&action=form"; ?>" class="tombol-action">+ Add Data III</a>
</div>

<?php

$query = mysqli_query($koneksi, "SELECT tiket3.*, tiket2.kode_2 FROM tiket3 JOIN tiket2 ON tiket3.tiket2_id=tiket2.tiket2_id ORDER BY status ASC,kode_2 ASC");

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
                        <td class='kiri'>$row[kode_3]</td>
                        <td class='kiri'>$row[nama_tiket_3]</td>
                        <th class='kiri'>
                        <a class='text-garisbawah' href='".BASE_URL."index.php?page=my_profile&module=tiket3&action=form&tiket_id=$row[tiket3_id]'>See More</a>
                        </th>
                        <td class='kiri'>$row[kode_2]</td>
                        <td class='tengah'>$row[status]</td>
                        <td class='tengah'>
                            <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=tiket3&action=form&tiket_id=$row[tiket3_id]'>Edit</a>
                        </td>
                    </tr>";

                $no++;
            }

            echo "</table>";

    }

?>