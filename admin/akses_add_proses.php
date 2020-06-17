<?php
include "../pages/coneksi/config.php";

			$pas  =md5($_POST['password']);
			$status="AKTIF";
$queri ="SELECT * FROM login WHERE username='$_POST[username]'";
$hasil =mysqli_query($koneksi,$queri);
$K=mysqli_num_rows($hasil);
$kolom=mysqli_fetch_assoc($hasil);
if ($K > 0) {
	echo '<script language="javascript">
              alert ("Username Sudah Ada Yang Menggunakan");
              window.location="akses_add.php";
              </script>';
              exit();
}else{
	$querii="INSERT INTO login ( id_pegawai,
											username,
											password,
											akses,
											status) 
											values 
											(
											'$_POST[pegawai]',
											'$_POST[username]',
											'$pas',
											'$_POST[akses]',
											'$status')";
				mysqli_query($koneksi,$querii);
				mysqli_close($koneksi);
				header('location:akses_view.php');
}
?>