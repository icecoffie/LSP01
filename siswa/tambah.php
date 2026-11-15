<?php
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Siswa</h3>
    <form method="post">
        <input name="nis" class="form-control mb-2" placeholder="NIS" required>
        <input name="nama_siswa" class="form-control mb-2" placeholder="Nama Siswa" required>
        <input name="tempat_lahir" class="form-control mb-2" placeholder="Tempat Lahir">
        <input name="tgl_lahir" type="date" class="form-control mb-2">
        <textarea name="alamat" class="form-control mb-2" placeholder="Alamat"></textarea>
        <input name="no_telepon" class="form-control mb-2" placeholder="No Telepon">
        <select name="kd_kompetensi" class="form-control mb-3" required>
            <option value="">-- Pilih Kompetensi --</option>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM kompetensi");
            while ($k = mysqli_fetch_assoc($q)) {
                echo "<option value='$k[kd_kompetensi]'>$k[nama_kompetensi]</option>";
            }
            ?>
        </select>
        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO siswa
        (nis, nama_siswa, tempat_lahir, tgl_lahir, alamat, no_telepon, kd_kompetensi)
        VALUES (
        '$_POST[nis]',
        '$_POST[nama_siswa]',
        '$_POST[tempat_lahir]',
        '$_POST[tgl_lahir]',
        '$_POST[alamat]',
        '$_POST[no_telepon]',
        '$_POST[kd_kompetensi]'
    )");
    echo "<script>alert('Data tersimpan');location='index.php';</script>";
}
?>
</div>
</body>
</html>