<?php
include "../config/koneksi.php";
include "../auth/cek_admin.php";
mysqli_query($conn, "DELETE FROM kompetensi WHERE kd_kompetensi='$_GET[id]'");
header("location:index.php");
?>
