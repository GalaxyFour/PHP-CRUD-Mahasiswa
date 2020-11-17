<?php
include_once("connection.php");

$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY nim ASC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="insert_mhs.php">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>NIM</td>
		<td>Nama</td>
		<td>Tgl. Lahir</td>
		<td>Jurusan</td>
		<td>Alamat</td>
		<td>Proses</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nim']."</td>";
		echo "<td>".$res['nama']."</td>";
		echo "<td>".$res['tgl_lahir']."</td>";
		echo "<td>".$res['jurusan']."</td>";
		echo "<td>".$res['alamat']."</td>";	
		echo "<td><a href=\"edit_mhs.php?id=$res[nim]\">Edit</a> | <a href=\"del_mhs.php?id=$res[nim]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
