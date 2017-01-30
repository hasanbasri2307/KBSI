<!DOCTYPE html>
<html>
<head>
	<title>KBSI</title>
</head>
<style type="text/css">
	table {
	    border-collapse: collapse;
	    width: 100%;
	}

	th, td {
	    padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
	    background-color: #4CAF50;
	    color: white;
	}
</style>
<body>
		<h3 align="center">Table Book</h3><br>
		<table align="center" border="1">
			<caption><strong><a href="add_data.php">Add Data</a><hr></strong></caption>
			<thead>
				<tr>
					<th>Number</th>
					<th>Title</th>
					<th>Publication Year</th>
					<th>Author</th>
					<th colspan="3">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include '../crud-pdo-form.php';
					$connect = new Book('127.0.0.1','perusahaan','root','');
					if (!empty($connect)) {
						$number = 1;
						foreach($connect->listBook("buku") as $book){
							echo '<tr>';
								echo '<td>'.$number.'</td>';
								echo '<td>'.$book['judul'].'</td>';
								echo '<td>'.$book['tahun_terbit'].'</td>';
								echo '<td>'.$book['pengarang'].'</td>';
								echo '<td><a href="edit.php?id='.$book['id'].'">Edit</a></td>';
								echo '<td><a href="destroy.php?id='.$book['id'].'">Hapus</a></td>';
							echo '</tr>';
							
							$number++;
						}
					} 
					?>

				
			</tbody>
		</table>

</body>
<h3 align="center"><a href="../view/homepage.html">Back to home</a></h3>
</html>