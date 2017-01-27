<!DOCTYPE html>
<html>
<head>
	<title>Crud PDO</title>
</head>
<body>
		<h3>PHP CRUD</h3>
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
					$connect = new Book();
					foreach($connect->listBook("buku") as $buku){					
				        echo '<tr>';
				        echo '<td>'. $buku['judul'] . '</td>';
				        echo '<td>'. $buku['tahun_terbit	'] . '</td>';
				        echo '<td>'. $buku['pengarang'] . '</td>';
				        echo '</tr>';
		        
				    }
 
				?>
			</tbody>
		</table>
</body>
</html>