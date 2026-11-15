<?php
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Data Siswa</h3>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Siswa</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Kompetensi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $q = mysqli_query($conn, "
            SELECT s.*, k.nama_kompetensi FROM siswa s
            JOIN kompetensi k ON s.kd_kompetensi = k.kd_kompetensi
        ");
        while ($d = mysqli_fetch_assoc($q)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['nis'] ?></td>
                <td><?= $d['nama_siswa'] ?></td>
                <td><?= $d['tempat_lahir'] ?>, <?= $d['tgl_lahir'] ?></td>
                <td><?= $d['alamat'] ?></td>
                <td><?= $d['no_telepon'] ?></td>
                <td><?= $d['nama_kompetensi'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $d['nis'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $d['nis'] ?>" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>