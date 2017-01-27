<!DOCTYPE html>
<html>
<head>
	<title>Crud PDO</title>
</head>
<body>
		<h3>PDO CRUD</h3>
		<table>
			<caption>Table Buku</caption>
			<thead>
				<tr>
					<th>Judul</th>
					<th>Tahun Terbit</th>
					<th>Pengarang</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include '../crud-pdo-form.php';
					$connect = new Connection('127.0.0.1','perusahaan','root','');
					foreach($connect->listBook("buku") as $buku){					
				        echo '<tr>';
				        echo '<td>'. $buku['judul'] . '</td>';
				        echo '<td>'. $buku['tahun_terbit'] . '</td>';
				        echo '<td>'. $buku['pengarang'] . '</td>';
				        echo '</tr>';
		        
				    }
 
				?>
			</tbody>
		</table>
</body>
</html>