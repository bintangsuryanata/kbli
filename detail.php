<div id="kiri">

	<div id="menu-kategori">
	
			<?php
				echo stadiun($stadiun_id);
			?>
		
	</div>
</div>

<div id="kanan">
	<?php	
		$tiket_id = $_GET['tiket_id'];

		$query = mysqli_query($koneksi, "SELECT * FROM tiket WHERE tiket_id='$tiket_id' AND status='on'");
		$row = mysqli_fetch_assoc($query);

		echo "<div id='detail-barang'>
					<h2>$row[nama_tiket]</h2>
					<div id='frame-gambar'>
						<img src='".BASE_URL."image/tiket/$row[gambar]' class='standart-img'\/>
					</div>
					<div id='frame-harga'>
						<span>$row[kode]</span>
						<a href='" . BASE_URL . "index.php?page=main-1&tiket_id=$row[tiket_id]'>TURUNAN</a>
					</div>
					<div id='keterangan'>
						<b>Keterangan : </b> $row[keterangan]
					</div>
				</div>";

	?>
</div>