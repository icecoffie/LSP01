<?php
include "../config/koneksi.php";
$data = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT * FROM nilai WHERE kd_nilai='$_GET[id]'"
));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Nilai</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Edit Nilai</h3>
    <form method="post">
        <input class="form-control mb-2" value="<?= $data['nis'] ?>" readonly>

        <select name="kd_matpel" class="form-control mb-2">
            <?php
            $q = mysqli_query($conn, "SELECT * FROM matpel");
            while ($m = mysqli_fetch_assoc($q)) {
                $sel = ($m['kd_matpel'] == $data['kd_matpel']) ? "selected" : "";
                echo "<option value='$m[kd_matpel]' $sel>$m[nama_matpel]</option>";
            }
            ?>
        </select>

        <input type="number" step="0.01" name="nilai_p" value="<?= $data['nilai_p'] ?>" class="form-control mb-2">
        <input type="number" step="0.01" name="nilai_k" value="<?= $data['nilai_k'] ?>" class="form-control mb-2">

        <select name="semester" class="form-control mb-2">
            <option <?= $data['semester']=='Ganjil'?'selected':'' ?>>Ganjil</option>
            <option <?= $data['semester']=='Genap'?'selected':'' ?>>Genap</option>
        </select>

        <input name="tapel" value="<?= $data['tapel'] ?>" class="form-control mb-3">

        <button name="update" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
<?php
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE nilai SET
        kd_matpel='$_POST[kd_matpel]',
        nilai_p='$_POST[nilai_p]',
        nilai_k='$_POST[nilai_k]',
        semester='$_POST[semester]',
        tapel='$_POST[tapel]'
        WHERE kd_nilai='$_GET[id]'
    ");
    echo "<script>alert('Nilai berhasil diupdate');location='index.php';</script>";
}
?>
</div>
</body>
</html>