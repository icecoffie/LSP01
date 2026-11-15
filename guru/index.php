<?php
include "../config/koneksi.php";
include "../auth/cek_admin.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Data Guru</h3>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Guru</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Pend. Akhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM guru");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nip'] ?></td>
                <td><?= $row['nama_guru'] ?></td>
                <td><?= $row['tempat_lahir'] ?></td>
                <td><?= $row['tgl_lahir'] ?></td>
                <td><?= $row['jenkel'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td><?= $row['pend_akhir'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['nip'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['nip'] ?>"
                       onclick="return confirm('Hapus data?')"
                       class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
