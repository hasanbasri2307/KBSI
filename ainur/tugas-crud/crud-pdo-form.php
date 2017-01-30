<?php 

/**
* Class Connection
*/
abstract class Connection {
	
	public function __construct($host, $database, $username, $password) {
		$this->host = $host;
		$this->database = $database;
		$this->username = $username;
		$this->password = $password;
		$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);;
	}

	abstract public function getConnect($connect);

}

/*===========================================================*/

/**
* Class Book
*/
class Book extends Connection {

	public function getConnect($pdo) {
		return $pdo;
	}

	/*
	start Function list, insert, update, and delete
	*/

	public function listBook($table) {
		$q = $this->conn->query("select * from $table") or die('error');
		$data = $q->fetchAll();
		return $data;
	}

	public function getIdBook($id, $table) {
		$q = $this->conn->prepare("select * from $table WHERE id = :id");
		$q->execute(array(':id'=>$id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

	public function storeBook($data, $table, $id_pegawai) {
		try {
			$insert = $this->conn->prepare("INSERT INTO $table (judul, tahun_terbit, pengarang, id_pegawai) VALUES (:judul, :tahun_terbit, :pengarang, $id_pegawai)")->execute($data);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateBook($data, $table, $id, $id_pegawai) {
		try {
			$q = $this->conn->prepare("UPDATE $table SET judul = :judul, tahun_terbit = :tahun_terbit, pengarang =:pengarang, id_pegawai = $id_pegawai WHERE id = $id");
			$update->bindParam("id", $id);
			$update->execute($data);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function destroyBook($id, $table) {
		try {
			$delete = $this->conn->prepare("DELETE from $table WHERE id = :id");
			$delete->bindParam("id",$id);
			$delete->execute();
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}
}

/*===========================================================*/

/**
* Class Employee
*/
class Employee extends Connection {
	
	public function getConnect($pdo) {
		return $pdo;
	}

	/*
	start Function list, insert, update, and delete
	*/

	public function listEmployee($table) {
		$q = $this->conn->query("select * from $table") or die('error');
		$data = $q->fetchAll();
		return $data;
	}

	public function getIdEmployee($id, $table){
		# code...
	}
}

/*
 End code
*/