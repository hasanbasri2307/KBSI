<?php
error_reporting(0);
class classbuku {

	private $koneksi;

	public function __construct ()
	{
		$this->koneksi = new PDO ("mysql:host=localhost;dbname=db_perpus","root", "");
	}

	public function setInsert(){
		
		$judul = $_POST['judul'];
		$tahun_terbit = $_POST['tahun_terbit'];
		$pengarang = $_POST['pengarang']; 
		$penerbit = $_POST['penerbit'];

		$insert = $this->koneksi->prepare("INSERT into tb_buku (judul,tahun_terbit,pengarang,penerbit) values (?,?,?,?)");
		$insert->execute(array($judul,$tahun_terbit,$pengarang,$penerbit));
	}

	public function getInsert(){
		return $this->Insert;
	}

	public function setUpdate(){
		$judul = $_POST['update_judul'];
		$tahun_terbit = $_POST['update_tahun_terbit'];
		$pengarang = $_POST['update_pengarang'];
		$penerbit = $_POST['update_penerbit'];

		$id = $_POST['update_id'];

		$update = $this->koneksi->prepare("UPDATE tb_buku set judul =?, tahun_terbit =?, pengarang =?, penerbit =? where id =?");
		$update->execute([$judul,$tahun_terbit,$pengarang,$penerbit,$id]);

		if($update->rowCount() > 0){
			echo "data berhasil di update";
		}
	}
	public function getUpdate(){
		return $this->Update;
	}

	public function setDelete(){
	$id = $_POST['id'];
	$delete = $this->koneksi->prepare("DELETE from tb_buku where id=?");
	$delete->execute([$id]);

	if($delete->rowCount() > 0){
		echo "data berhasil di delete";
	}
	}

	public function getDelete(){
		return $this->Delete;
	}
}

class classkaryawan {

	private $koneksi2;

	public function __construct ()
	{
		$this->koneksi2 = new PDO ("mysql:host=localhost;dbname=db_perpus", "root", "");
	}

	public function setInsertkaryawan(){

		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];

		$insert2 = $this->koneksi2->prepare("INSERT into tb_pegawai (nik,nama,email) values (?,?,?)");
		$insert2->execute(array($nik,$nama,$email));
	}

	public function getInsertkaryawan(){
		return $this->Insertkaryawan;
	}

	public function setUpdateKaryawan(){
		$nik = $_POST['update_nik'];
		$nama = $_POST['update_nama'];
		$email = $_POST['update_email'];

		$id = $_POST['update_id_karyawan'];

		$update2 = $this->koneksi2->prepare("UPDATE tb_pegawai set nik =?, nama=?, email=? where id =?");
		$update2->execute([$nik,$nama,$email,$id]);

		if($update2->rowCount() > 0){
			echo "data berhasil di update";
		}
	}
	public function getUpdateKaryawan(){
		return $this->UpdateKaryawan;
	}
}
$a = new classbuku();
$a->setInsert();
echo $a->getInsert();
$a->setUpdate();
echo $a->getUpdate();
$a->setDelete();
echo $a->getDelete();

$b = new classkaryawan();
$b->setInsertkaryawan();
echo $b->getInsertkaryawan();
$b->setUpdateKaryawan();
echo $b->getUpdateKaryawan();
?>