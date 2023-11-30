<h2 style="text-align: center;">Laporan Layanan Pengaduan Masyarakat</h2>
<table border="2" style="width: 100%; height: 10%;">
	<tr style="text-align: center;">
		<td>No</td>
		<th>Nama Kegiatan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Foto Kegiatan</th>
                        <th>Sertifikat Kegiatan</th>
                        <th>Status</th>
		<td>Status</td>
	</tr>
	<?php 
		include 'koneksi.php';
		 { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['id']; ?></td>
			<td><?php echo $r['tanggal_mulai']; ?></td>
			<td><?php echo $r['tanggal_selesai']; ?></td>
			<td><?php echo $r['foto_kegiatan']; ?></td>
			<td><?php echo $r['sertifikat_kegiatan']; ?></td>
			<td><?php echo $r['status']; ?></td>
		</tr>
	<?php	}
	 ?>
</table>
<script type="text/javascript">
	window.print();
</script>