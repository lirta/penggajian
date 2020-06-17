<?php
include "../pages/coneksi/config.php";


$acak = rand(00000000, 99999999);
$kategori = "KARIAWAN";
$id = $kategori . $acak;
$namafoto = $_FILES['foto']['name'];
$nama = $kategori . $namafoto;
$folderawal = $_FILES['foto']['tmp_name'];
$foldertujuan = "../foto/";
move_uploaded_file($folderawal, $foldertujuan . $nama);
$querii = "INSERT INTO pegawai ( id_pegawai,
								nama_pegawai,
								tmp_lahir,
								tgl_lahir,
								jenis_kel,
								agama,
								no_hp,
								alamat,
								status_perkawinan,
								jlh_anak,
								kategori,
								foto) 
								values 
								(
								'$id',
								'$_POST[nama]',
								'$_POST[tmp_l]',
								'$_POST[tgl_l]',
								'$_POST[kel]',
								'$_POST[agama]',
								'$_POST[hp]',
								'$_POST[alamat]',
								'$_POST[set]',
								'$_POST[anak]',
								'$kategori',
								'$nama')";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:kariawan_view.php');
