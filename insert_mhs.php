
<?php
include_once("connection.php");

if(isset($_POST['submit'])) {	


	$id = mysqli_real_escape_string($mysqli, $_POST['nim']);
	
	$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
	$tgl_lahir = mysqli_real_escape_string($mysqli, $_POST['tgl_lahir']);
	$jurusan = mysqli_real_escape_string($mysqli, $_POST['jurusan']);	
	$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);	
	
	$result = mysqli_query($mysqli, "SELECT nim FROM mahasiswa WHERE nim='$id'");
	$resultnum = $result->num_rows;
	
	if($resultnum != 0 || empty($id) || empty($nama) || empty($tgl_lahir) || empty($jurusan) || empty($alamat)) {	
			
		if($resultnum != 0){
			echo "<font color='red'>NIM sudah ada!</font><br/>";
		}
		if(empty($id)) {
			echo "<font color='red'>NIM tidak boleh kosong!</font><br/>";
		}
		if(empty($nama)) {
			echo "<font color='red'>Nama tidak boleh kosong!</font><br/>";
		}
		
		if(empty($tgl_lahir)) {
			echo "<font color='red'>Tanggal Lahir tidak boleh kosong!</font><br/>";
		}
		
		if(empty($jurusan)) {
			echo "<font color='red'>Jurusan tidak boleh kosong!</font><br/>";
		}	
		
		if(empty($alamat)) {
			echo "<font color='red'>Alamat tidak boleh kosong!</font><br/>";
		}		
	} else {	
		$result = mysqli_query($mysqli, "INSERT INTO mahasiswa (nim,nama,tgl_lahir,jurusan,alamat) VALUES('$id','$nama','$tgl_lahir','$jurusan','$alamat')");
		header("Location: index.php");
	}
}
?>
<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form action="insert_mhs.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>NIM</td>
				<td><input  type="text" name="nim" value="<?php echo isset($_POST['nim']) ? $_POST['nim'] : '' ?>"></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''?>"></td>
			</tr>
			<tr> 
				<td>Jurusan</td>
				<td><input type="text" name="jurusan" value="<?php echo isset($_POST['jurusan']) ? $_POST['jurusan'] : ''?>"></td>
			</tr>
			<tr> 
				<td>Tanggal Lahir(yyyy-MM-dd)</td>
				<td><input type="text" name="tgl_lahir" value="<?php echo isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : ''?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><textarea name="alamat" ><?php echo isset($_POST['alamat']) ? $_POST['alamat'] : ''?></textarea></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>


