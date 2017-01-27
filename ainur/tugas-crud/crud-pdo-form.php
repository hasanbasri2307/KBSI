<?php 

/**
* Class Connection
*/
class Connection {
	
	private $host;
	private $database;
	private $username;
	private $password;
	private $conn;


	public function __construct($host, $database, $username, $password) {
		$this->host = $host;
		$this->database = $database;
		$this->username = $username;
		$this->password = $password;
		$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password);
	}

	public function connectDatabase() {
		return $this->conn;
	}



}

$connect = new Connection('127.0.0.1','perusahaan','root','');
$connect->connectDatabase();
var_dump($connect);


/**
* Class Book
*/
class Book {
	
	public $connection;

	public function __construct() {
		$this->connection = Connection::connectDatabase();
	}

	public function listBook($table) {
		$book  = "select * from $table";
		$query = $this->connection->query($book) or die('unable connect to table book');
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

}

 ?>