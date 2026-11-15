<?php
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Nilai</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Nilai</h3>
    <form method="post">
        <select name="nis" class="form-control mb-2" required>
            <option value="">-- Pilih Siswa --</option>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM siswa");
            while ($s = mysqli_fetch_assoc($q)) {
                echo "<option value='$s[nis]'>$s[nis] - $s[nama_siswa]</option>";
            }
            ?>
        </select>

        <select name="kd_matpel" class="form-control mb-2" required>
            <option value="">-- Pilih Mata Pelajaran --</option>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM matpel");
            while ($m = mysqli_fetch_assoc($q)) {
                echo "<option value='$m[kd_matpel]'>$m[nama_matpel]</option>";
            }
            ?>
        </select>

        <input type="number" step="0.01" name="nilai_p" class="form-control mb-2" placeholder="Nilai Pengetahuan" required>
        <input type="number" step="0.01" name="nilai_k" class="form-control mb-2" placeholder="Nilai Keterampilan" required>

        <select name="semester" class="form-control mb-2" required>
            <option value="">-- Semester --</option>
            <option>Ganjil</option>
            <option>Genap</option>
        </select>

        <input name="tapel" class="form-control mb-3" placeholder="2025/2026" required>

        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO nilai
        (nis, kd_matpel, nilai_p, nilai_k, semester, tapel)
        VALUES (
        '$_POST[nis]',
        '$_POST[kd_matpel]',
        '$_POST[nilai_p]',
        '$_POST[nilai_k]',
        '$_POST[semester]',
        '$_POST[tapel]'
    )");
    echo "<script>alert('Nilai berhasil disimpan');location='index.php';</script>";
}
?>
</div>
</body>
</html>