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
		$query = $this->conn->query("select * from $table") or die('query error');
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	public function getIdBook($id, $table) {
		# code...
	}
}

/*===========================================================*/

/**
* Class Employee
*/
class Employee extends Connection
{
	
	public function getConnect($pdo) {
		return $pdo;
	}

	public function listEmployee($table) {
		$query = $this->conn->query("select * from $table") or die('query error');
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	public function getIdEmployee($id, $table){
		# code...
	}
}