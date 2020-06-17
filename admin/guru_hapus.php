<?php
include "../pages/coneksi/config.php";

mysqli_multi_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$_GET[id]'");
mysqli_multi_query($koneksi, "DELETE FROM golongan WHERE id_pegawai='$_GET[id]'");
mysqli_multi_query($koneksi, "DELETE FROM login WHERE id_pegawai='$_GET[id]'");
mysqli_multi_query($koneksi, "DELETE FROM jabatan WHERE id_pegawai='$_GET[id]'");
mysqli_multi_query($koneksi, "DELETE FROM absen WHERE id_pegawai='$_GET[id]'");
mysqli_close($koneksi);
header('location:guru_view.php');
