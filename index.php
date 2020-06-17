<?php include "pages/coneksi/config.php";
if (!isset($_SESSION)) {
  session_start();
}
if (
  empty($_SESSION['username']) and
  empty($_SESSION['password'])
) {
  header('location:pages/login/login.php');
} else {
  if ($_SESSION['akses'] == "ADMIN") {
    header('location:admin/index.php');
  } elseif ($_SESSION['akses'] == "BENDAHARA") {
    header('location:bendahara/index.php');
  } elseif ($_SESSION['akses'] == "PIKET") {
    header('location:piket/index.php');
  } else {
    echo '<script language="javascript">
                  alert ("Anda Tidak Punya Akses");
                  window.location="pages/login/logout.php";
                  </script>';
    exit();
  }
};
