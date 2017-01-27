<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
	$query = $koneksi->query("SELECT * FROM tb_pegawai WHERE id = '$_GET[id]'");
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
<h1 align="center">Edit Data Karyawan</h1>
<fieldset style="width:50%; margin: auto;">
	<legend>Form Input Buku</legend>

	<form action="classbuku.php" method="post">
		<input type="hidden" name="update_id_karyawan" value="<?php echo $data['id'];?>" />
		<p>
			NIK
			<input type="text" name="update_nik" required value="<?php echo $data['nik']; ?>"/>
        </p>
        <p>
        	Nama
        	<input type="text" name="update_nama" required value="<?php echo $data['nama']; ?>"/>
        </p>
        <p>
        	Email
        	<input type="text" name="update_email" required value="<?php echo $data['email']; ?>"/>
        </p>

        <p>
        <input type="submit" name="classbuku" value="Save" />
      	<input type="reset" value="Reset" onclick="return confirm('hapus data yang telah diinput?')">
        </p>
    </form>
</fieldset>
<center><a href="menuutamabuku.php"><< Menu Utama</a></center>