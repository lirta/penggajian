<?php
include "../pages/coneksi/config.php";


$querii = "INSERT INTO jabatan ( id_pegawai,id_m_jabatan) 
											values 
											('$_POST[pg]','$_POST[jb]')";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:jabatan_view.php');
