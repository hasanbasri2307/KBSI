<?php

/* create by Hasan Basri
 ** MYSQL Connector PDO
*/

class MysqlConnector {

	private $host;
	private $user;
	private $password;
	private $db;
	private $connection;

	public function __construct($host,$user,$password,$db){
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->db = $db;

		$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8mb4', $this->user, $this->password,array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}

	public function insertData(array $data,$table){
		$keys = [];
		$values = [];

		foreach($data as $key =>$value){
			array_push($keys, $key);
			array_push($values,$value);
		}

		$str = 'insert into '.$table.'('.implode(",",$keys).') values ('.implode(",",array_map(function($val) { return '?'; }, $values)).')';

		try {
			$stmt = $this->connection->prepare('insert into '.$table.'('.implode(",",$keys).') values ('.implode(",",array_map(function($val) { return '?'; }, $values)).')');
			$stmt->execute($values);

			if($stmt){
				return true;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
		return $str;
	}

	public function updateData(array $data,$table,$field,$valuefield){
		$keys = [];
		$values = [];

		foreach($data as $key =>$value){
			array_push($keys, $key);
			array_push($values,$value);
		}

		array_push($values, $valuefield);

		$str = 'update '.$table.' set '.implode('=?,',$keys).'=? where '.$field.' =?';

		$stmt = $this->connection->prepare($str);
		$stmt->execute($values);
		if($stmt){
			return true;
		}

		return $str;
	}

	public function getData($table){
		$stmt = $this->connection->query("select * from $table");
		$result = $stmt->fetchAll();

		return $result;
	}

	public function deleteData($table,$field,$valuefield){
		$stmt = $this->connection->prepare("delete from $table where $field = ?");
		$stmt->execute([$valuefield]);
		if($stmt){
			return true;
		}

		return false;
	}
}

$koneksiMysql = new MysqlConnector("192.168.105.11","hasan","basri","pgn_network");
$insert = $koneksiMysql->insertData(['v_name'=>'PT Maju Mundur','phone'=>'123123','fax'=>'12312312','address'=>'jakarta barat','created_at'=>'2015-02-02 19:00:00','updated_at'=>'2015-02-02 19:00:00'],"vendor");
var_dump($insert);
$update = $koneksiMysql->updateData(['v_name'=>'PT Maju Mundur','phone'=>'123123','fax'=>'12312312','address'=>'jakarta barat','created_at'=>'2015-02-02 19:00:00','updated_at'=>'2015-02-02 19:00:00'],'vendor','id',3);
var_dump($update);
$delete = $koneksiMysql->deleteData("vendor","id",3);
var_dump($delete);
$select = $koneksiMysql->getData("vendor");
var_dump($select);