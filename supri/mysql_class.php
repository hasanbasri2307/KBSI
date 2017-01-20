<?php
error_reporting(0);	
class Database {

	private $koneksi;

	public function  __construct()
	{
		$this->koneksi = new PDO("mysql:host=localhost;dbname=db_latihan", "root", "");
	}

	public function getKoneksi(){
		return $this->koneksi;
	}

	public function getData(){
		$query = $this->koneksi->prepare("SELECT * from tb_kontak");
		$query->execute();
		while ($row = $query->fetch()){
			echo $row['nama']."<br>";
			echo $row['email']."<br>";
			echo $row['telepon']."<br>";
			echo $row['keterangan']."<br>";
			echo $row['']."<br>";
		}
	}

	public function setInsert(){
		$nama = "Ainur";
		$email = "ainur@yahoo.com";
		$telepon = "085665929292";
		$keterangan = "apa aja boleh";

		$insert = $this->koneksi->prepare("INSERT into tb_kontak (nama,email,telepon,keterangan) values (?,?,?,?)");
		$insert->execute(array($nama,$email,$telepon,$keterangan));
		
	}

	public function getInsert(){
		return $this->Insert;
	}

	public function setUpdate(){
		$nama = "Renal";
		$email = "Renal@yahoo.com";
		$telepon = "097827340";
		$keterangan = "terserah lu dah";

		$id = 14;

		$update = $this->koneksi->prepare("UPDATE tb_kontak set nama = ?, email = ?, telepon =?, keterangan =? where id =?");
		$update->execute([$nama,$email,$telepon,$keterangan,$id]);

		if($update->rowCount() > 0){
			echo "data berhasil di update";
		}
	}

	public function getUpdate(){
		return $this->Update;
	}

	public function setDelete(){
	$id = 2;
	$delete = $this->koneksi->prepare("DELETE from tb_kontak where id=?");
	$delete->execute([$id]);

	if($delete->rowCount() > 0){
		echo "data berhasil di delete";
	}
}

	public function getDelete(){
		return $this->Delete;
	}
}

$db = new Database();
echo $db->getData();

?>