<?php
include "../config/koneksi.php";
include "../auth/cek_admin.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Matpel</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Mata Pelajaran</h3>
    <form method="post">
        <input name="kd_matpel" class="form-control mb-2" placeholder="Kode Matpel" required>
        <input name="nama_matpel" class="form-control mb-2" placeholder="Nama Matpel" required>
        <input name="jumlah_jam" type="number" class="form-control mb-2" placeholder="Jumlah Jam">
        <input name="tingkat" class="form-control mb-2" placeholder="Tingkat">

        <select name="kd_kompetensi" class="form-control mb-2" required>
            <option value="">-- Pilih Kompetensi --</option>
            <?php
            $q = mysqli_query($conn, "SELECT * FROM kompetensi");
            while ($k = mysqli_fetch_assoc($q)) {
                echo "<option value='$k[kd_kompetensi]'>$k[nama_kompetensi]</option>";
            }
            ?>
        </select>

        <select name="nip" class="form-control mb-3" required>
            <option value="">-- Pilih Guru Pengampu --</option>
            <?php
            $qg = mysqli_query($conn, "SELECT * FROM guru");
            while ($g = mysqli_fetch_assoc($qg)) {
                echo "<option value='$g[nip]'>$g[nama_guru]</option>";
            }
            ?>
        </select>

        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO matpel VALUES (
        '$_POST[kd_matpel]',
        '$_POST[nama_matpel]',
        '$_POST[jumlah_jam]',
        '$_POST[tingkat]',
        '$_POST[kd_kompetensi]',
        '$_POST[nip]'
    )");
    echo "<script>alert('Data tersimpan');location='index.php';</script>";
}
?>
</div>
</body>
</html>