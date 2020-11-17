<?php
include("connection.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM mahasiswa WHERE nim='$id'");
header("Location:index.php");
?>

