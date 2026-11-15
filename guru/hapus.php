<?php
include "../config/koneksi.php";
include "../auth/cek_admin.php";
mysqli_query($conn, "DELETE FROM guru WHERE nip='$_GET[id]'");
header("location:index.php");
?>
