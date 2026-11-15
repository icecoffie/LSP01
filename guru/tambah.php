<?php
include "../config/koneksi.php";
include "../auth/cek_admin.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Guru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Guru</h3>

    <form method="post">
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenkel" class="form-control" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pendidikan Terakhir</label>
            <input type="text" name="pend_akhir" class="form-control" required>
        </div>

        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO guru VALUES (
        '$_POST[nip]',
        '$_POST[nama_guru]',
        '$_POST[tempat_lahir]',
        '$_POST[tgl_lahir]',
        '$_POST[jenkel]',
        '$_POST[alamat]',
        '$_POST[no_hp]',
        '$_POST[pend_akhir]'
    )");
    echo "<script>alert('Data berhasil disimpan');location='index.php';</script>";
}
?>
</div>
</body>
</html>
