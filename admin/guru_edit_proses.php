<?php
include "../pages/coneksi/config.php";


$acak = rand(00000000, 99999999);
$namafoto = $_FILES['foto']['name'];
$nama = $namafoto.$acak;
$folderawal = $_FILES['foto']['tmp_name'];
$foldertujuan="../foto/";
if (!empty($folderawal))
{
move_uploaded_file($folderawal,$foldertujuan.$nama);
$querii="UPDATE pegawai SET 
							nama_pegawai='$_POST[nama]',
							tmp_lahir='$_POST[tmp_l]',
							tgl_lahir='$_POST[tgl_l]',
							jenis_kel='$_POST[kel]',
							agama='$_POST[agama]',
							no_hp='$_POST[hp]',
							alamat='$_POST[alamat]',
							status_perkawinan='$_POST[set]',
							jlh_anak='$_POST[anak]',
							foto='$nama'
							where
							id_pegawai='$_POST[id]' ";
mysqli_query($koneksi,$querii);
	mysqli_close($koneksi);
	header('location:guru_view.php');
}else{
$querii="UPDATE pegawai SET 
							nama_pegawai	='$_POST[nama]',
							tmp_lahir		='$_POST[tmp_l]',
							tgl_lahir		='$_POST[tgl_l]',
							jenis_kel		='$_POST[kel]',
							agama			='$_POST[agama]',
							no_hp 			='$_POST[hp]',
							alamat 			='$_POST[alamat]',
							status_perkawinan='$_POST[set]',
							jlh_anak 		='$_POST[anak]'
							where
							id_pegawai 		='$_POST[id]' ";	
mysqli_query($koneksi,$querii);
	mysqli_close($koneksi);
	header('location:guru_view.php');
}
