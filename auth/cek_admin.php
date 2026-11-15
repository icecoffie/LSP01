<?php
include "../auth/cek_session.php";
if($_SESSION['level'] != 'admin'){
    die("Akses ditolak!");
}
?>