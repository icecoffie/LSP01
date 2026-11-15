<?php
include "../config/koneksi.php";
$data = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT * FROM siswa WHERE nis='$_GET[id]'"
));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Edit Siswa</h3>
    <form method="post">
        <div class="mb-3">
            <label>NIS</label>
            <input type="text" class="form-control" value="<?= $data['nis'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" value="<?= $data['nama_siswa'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" value="<?= $data['no_telepon'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kompetensi</label>
            <select name="kd_kompetensi" class="form-control" required>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM kompetensi");
                while ($k = mysqli_fetch_assoc($q)) {
                    $selected = ($k['kd_kompetensi'] == $data['kd_kompetensi']) ? "selected" : "";
                    echo "<option value='$k[kd_kompetensi]' $selected>$k[nama_kompetensi]</option>";
                }
                ?>
            </select>
        </div>
        <button name="update" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
<?php
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE siswa SET
        nama_siswa='$_POST[nama_siswa]',
        tempat_lahir='$_POST[tempat_lahir]',
        tgl_lahir='$_POST[tgl_lahir]',
        alamat='$_POST[alamat]',
        no_telepon='$_POST[no_telepon]',
        kd_kompetensi='$_POST[kd_kompetensi]'
        WHERE nis='$_GET[id]'
    ");
    echo "<script>alert('Data berhasil diupdate');location='index.php';</script>";
}
?>
</div>
</body>
</html>