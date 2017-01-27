<?php
include 'koneksi.php';
?>
<style>
	tbody > tr:nth-child(2n+1) > td, tbody > tr:nth-child(2n+1) > th {
		background-color: #ededed;
	}
	table {
		width: 70%;
		margin: auto;
		border-collapse: collapse;
		box-shadow: darkgrey 3px;
	}
	thead tr {
		background-color: #36c2ff;
	}
</style>
<h1 align="center">List Data Buku</h1>
<center><a href="tambahdata.php"></a></center>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Judul</th>
			<th>Tahun Terbit</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th></th>
	</thead>

	<tbody>
	<?php
	$sql = "SELECT * FROM tb_buku";
	foreach ($koneksi->query($sql) as $data):
	?>
		<tr>
			<td><?php echo $data['id'] ?></td>
			<td><?php echo $data['judul'] ?></td>
			<td><?php echo $data['tahun_terbit'] ?></td>
			<td><?php echo $data['pengarang'] ?></td>
			<td><?php echo $data['penerbit'] ?></td>
			<td align="center">
				<a href="updatebuku.php?id=<?php echo $data['id'] ?>"> Edit</a>
				<a href="classbuku.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Anda yakin akan menghapus data?')">Delete</a>
			</td>
		</tr>
		<?php
		endforeach;
		?>
		</tbody>
		</table>