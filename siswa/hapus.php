<?php
include "../config/koneksi.php";
mysqli_query($conn, "DELETE FROM siswa WHERE nis='$_GET[id]'");
header("location:index.php");
?>