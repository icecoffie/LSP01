<?php
include "../config/koneksi.php";
mysqli_query($conn, "DELETE FROM nilai WHERE kd_nilai='$_GET[id]'");
header("location:index.php");
?>