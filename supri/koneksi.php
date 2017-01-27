<?php
$dsn = "mysql:dbname=db_perpus;host=localhost";
$user = "root";
$pass = "";
try {
	$koneksi = new PDO($dsn, $user, $pass);
	}
	catch (Exception $e){
		echo "Koneksi ke database gagal"; ".$e->getMessage()";
	}
?>