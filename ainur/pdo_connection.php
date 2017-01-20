<?php

	/**
	* MyClass DatabaseMysql
	*/
	class DatabaseMysql {
		
		private $connect;

		public function __construct(){
			$this->connect = new \PDO('mysql:host=localhost;dbname=crud_pdo', "root", "");
		}

		public function getConnection(){
		    return $this->connect;
		}

		public function getData(){
			$query = $this->connect->prepare("select * from contact");
			$query->execute();    
			while($row=$query->fetch(\PDO::FETCH_ASSOC)){
			    echo "Nama: ". $row['name']."<br>";
			    echo "Email: ". $row['email']."<br>";
			    echo "Mobile Number: ". $row['phone']."<br>";
			    echo "Address: ". $row['alamat']."<br><br>===============<br>";
			}
		}

		public function insertData($data){
		    try {
		    	$insert = $this->connect->prepare("INSERT INTO contact (name, email, phone, alamat) VALUES (:name, :email, :phone, :alamat)")->execute($data);
		    	//var_dump($insert);
		    } catch (\Exception $e) {
		    	echo $e->getMessage();
		    }
		}

		public function updateData($param, $id) {
			try {
				$update = $this->connect->prepare("UPDATE contact SET name = :name, email = :email, phone = :phone, alamat = :alamat  WHERE id = $id");
				$update->bindParam("id", $id);
				$update->execute($param);
				//var_dump($param);
					} catch (\Exception $e) {
				echo $e->getMessage();
			}
		}

		public function deleteData($param, $id) {
			try {
				$delete = $this->connect->prepare("DELETE from contact WHERE id = :id");
				$delete->bindParam("id",$id);
				$delete->execute();
			} catch (\Exception $e) {
				echo $e->getMessage();
			}
		}


	}

/*===========================================================*/

		//make insert data
		$insertnya = array(
					'name' => 'Ainur',
					'email' => 'rizaainur@gmail.com',
					'phone' => '081286662xxx',
					'alamat' => 'Tangerang' 
					);

		//make updated data
		$id = 1;
		$updatenya = array(
					'name' => 'Ariel',
					'email' => 'ariel.noah@site.com',
					'phone' => '0819238123xxx',
					'alamat' => 'Bandung' 
					);

		$db = new DatabaseMysql(); 
		echo $db->getData();
		echo $db->insertData($insertnya);
		//echo $db->updateData($updatenya, $id);
		//echo $db->deleteData($updatenya, $id);


		/*end*/

 ?>