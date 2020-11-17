<?php
include_once("connection.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	//$id = $_GET['id'];
	
	$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
	$tgl_lahir = mysqli_real_escape_string($mysqli, $_POST['tgl_lahir']);
	$jurusan = mysqli_real_escape_string($mysqli, $_POST['jurusan']);	
	$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);	
	
	if(empty($nama) || empty($tgl_lahir) || empty($jurusan) || empty($alamat)) {	
			
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
		$result = mysqli_query($mysqli, "UPDATE mahasiswa SET nama='$nama',tgl_lahir='$tgl_lahir',jurusan='$jurusan',alamat='$alamat' WHERE nim='$id'");
		header("Location: index.php");
	}
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE nim=$id");

while($res = mysqli_fetch_array($result))
{	
	$nama = $res['nama'];
	$tgl_lahir = $res['tgl_lahir'];
	$jurusan = $res['jurusan'];	
	$alamat = $res['alamat'];	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_mhs.php?id=<?php echo $_GET['id'];?>">
		<table border="0">
			<tr> 
				<td>NIM</td>
				<td><input  type="text" name="nim" value="<?php echo $_GET['id'];?>" disabled></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : $nama?>"></td>
			</tr>
			<tr> 
				<td>Jurusan</td>
				<td><input type="text" name="jurusan" value="<?php echo isset($_POST['jurusan']) ? $_POST['jurusan'] : $jurusan?>"></td>
			</tr>
			<tr> 
				<td>Tanggal Lahir(yyyy-MM-dd)</td>
				<td><input type="text" name="tgl_lahir" value="<?php echo isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : $tgl_lahir?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><textarea name="alamat" ><?php echo isset($_POST['alamat']) ? $_POST['alamat'] : $alamat?></textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
