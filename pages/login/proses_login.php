<?php
include "../coneksi/config.php";
$username = $_POST['username'];
$pass     = md5($_POST['password']);
$sql = "SELECT * FROM login WHERE username='$username' AND password='$pass'";
$result = mysqli_query($koneksi, $sql);
$ketemu = mysqli_num_rows($result);
$r = mysqli_fetch_assoc($result);
if ($ketemu > 0) {

  if ($r['status'] == "AKTIF") {
    session_start();

    $qp = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$r[id_pegawai]'");
    $hasil = mysqli_fetch_assoc($qp);
    $_SESSION['username']            = $r['username'];
    $_SESSION['password']            = $r['password'];
    $_SESSION['id']                  = $hasil['id_pegawai'];
    $_SESSION['akses']               = $r['akses'];
    $_SESSION['foto']                = $hasil['foto'];
    header('location:../../index.php');
  } else {
    echo '<script language="javascript">
              alert ("AKSES ANDA DI TOLAK");
              window.location="logout.php";
              </script>';
    exit();
  }
} else {
  echo '<script language="javascript">
              alert ("Username dan Password Anda Salah");
              window.location="login.php";
              </script>';
  exit();
}
