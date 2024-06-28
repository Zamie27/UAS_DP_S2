<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nomor_hp = $_POST['nomor_hp'];

    $sql = "INSERT INTO penduduk (nik, nama, tempat_lahir, tanggal_lahir, nomor_hp) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nik, $nama, $tempat_lahir, $tanggal_lahir, $nomor_hp);

    if ($stmt->execute() === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Penduduk</title>
    <link rel="stylesheet" type="text/css" href="bootstraps/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5 font-weight-bold">TAMBAHKAN DATA</h1>
    <form method="POST" action="" class="form-group row pt-5">
        <label for="inputNik" class="col-sm-2 col-form-label pb-4 font-weight-bold">NIK</label>
        <div class="col-sm-10">
            <input class="form-control"type="text" name="nik" placeholder="NIK" required>
        </div>
        <label for="inputNama" class="col-sm-2 col-form-label pb-4 font-weight-bold">Nama</label>
        <div class="col-sm-10">
            <input class="form-control"type="text" name="nama" placeholder="Nama" required>
        </div>
        <label for="inputTempatLahir" class="col-sm-2 col-form-label pb-4 font-weight-bold">Tempat Lahir</label>
        <div class="col-sm-10">
            <input class="form-control"type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
        </div>
        <label for="inputTanggalLahir" class="col-sm-2 col-form-label pb-4 font-weight-bold">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input class="form-control"type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
        </div>
        <label for="inputNomorHP" class="col-sm-2 col-form-label pb-4 font-weight-bold">Nomor HP</label>
        <div class="col-sm-10">
            <input class="form-control"type="text" name="nomor_hp" placeholder="Nomor HP" required>
        </div>
     <button type="submit" class="btn btn-outline-primary btn-lg btn-block mt-4">Simpan</button>
    </form>
</div>
<footer class="text-center fixed-bottom mb-2">D1A230109 | Muhammad Ridho Al Zamzami</footer>
</body>
</html>
