<?php
include "../pages/coneksi/config.php";


$querii = "INSERT INTO master_jabatan ( jabatan,tj_jabatan) 
											values 
											('$_POST[jb]',$_POST[tj])";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:m-jabatan-view.php');
