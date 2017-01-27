<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
	$query = $koneksi->query("SELECT * FROM tb_buku WHERE id = '$_GET[id]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
} else {
	echo "ID tidak tersedia!
	<a href='menuutamabuku.php'>Kembali</a>";
    exit();
}
if ($data === false) {
	echo "Data Tidak Ditemukan! <a href='menuutamabuku.php'>Kembali</a>";
	exit();
}
?>
<h1 align="center">Edit Data Buku</h1>
<fieldset style="width:50%; margin: auto;">
	<legend>Form Input Buku</legend>

	<form action="classbuku.php" method="post">
		<input type="hidden" name="update_id" value="<?php echo $data['id'];?>" />
		<p>
			Judul Buku
			<input type="text" name="update_judul" required value="<?php echo $data['judul']; ?>"/>
        </p>
        <p>
        	Tahun Terbit
        	<input type="date" name="update_tahun_terbit" required value="<?php echo $data['tahun_terbit']; ?>"/>
        </p>
        <p>
        	Pengarang
        	<input type="text" name="update_pengarang" required value="<?php echo $data['pengarang']; ?>"/>
        </p>
        <p>
        	Penerbit
        	<input type="text" name="update_penerbit" required value="<?php echo $data['penerbit']; ?>"/>
        </p>

        <p>
        <input type="submit" name="classbuku" value="Save" />
      	<input type="reset" value="Reset" onclick="return confirm('hapus data yang telah diinput?')">
        </p>
    </form>
</fieldset>
<center><a href="menuutamabuku.php"><< Menu Utama</a></center>