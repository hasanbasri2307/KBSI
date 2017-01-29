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
		<h3 align="center">Table Employee</h3><br>
		<table align="center" border="1">
			<caption><strong><a href="add_data.php">Add Data</a><hr></strong></caption>
			<thead>
				<tr>
					<th>Number</th>
					<th>NIK</th>
					<th>Email</th>
					<th>Name</th>
					<th colspan="3">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include '../crud-pdo-form.php';
					$connect = new Employee('127.0.0.1','perusahaan','root','');
					if (!empty($connect)) {
						$number = 1;
						foreach($connect->listEmployee("pegawai") as $employee){
							echo '<tr>';
								echo '<td>'.$number.'</td>';
								echo '<td>'.$employee['nik'].'</td>';
								echo '<td>'.$employee['email'].'</td>';
								echo '<td>'.$employee['nama'].'</td>';
								echo '<td><a href="edit.php?id='.$employee['id'].'">Edit</a></td>';
								echo '<td><a href="destroy.php?id='.$employee['id'].'">Hapus</a></td>';
							echo '</tr>';
							
							$number++;
						}
					} else {
						echo '<tr><td colspan="6">No data available in table</td></tr>';
					}
					?>

				
			</tbody>
		</table>
</body>
</html>