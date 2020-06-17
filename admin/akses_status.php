<?php
include "../pages/coneksi/config.php";

$id=$_GET['id'];
$stat=$_GET['st'];
if ($stat == "AKTIF") {
	$status="NON AKTIF";
	$querii="UPDATE login SET status='$status' WHERE id='$id'";
				mysqli_query($koneksi,$querii);
				mysqli_close($koneksi);
				header('location:akses_view.php');
}else{
	$status="AKTIF";
	$querii="UPDATE login SET status='$status' WHERE id='$id'";
				mysqli_query($koneksi,$querii);
				mysqli_close($koneksi);
				header('location:akses_view.php');
}
?>
