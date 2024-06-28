<?php
include 'config.php';

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Bungkus nilai nik dengan tanda kutip tunggal
    $sql = "SELECT * FROM penduduk WHERE nik='$nik'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "NIK tidak ditemukan.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nomor_hp = $_POST['nomor_hp'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("UPDATE penduduk SET nama=?, tempat_lahir=?, tanggal_lahir=?, nomor_hp=? WHERE nik=?");
    $stmt->bind_param("sssss", $nama, $tempat_lahir, $tanggal_lahir, $nomor_hp, $nik);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Penduduk</title>
    <link rel="stylesheet" type="text/css" href="bootstraps/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5 font-weight-bold">EDIT DATA</h1>
    <form method="POST" action="" class="form-group row pt-5">
        <label for="inputNik" class="col-sm-2 col-form-label pb-4 font-weight-bold">NIK</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="nik" value="<?php echo $row['nik']; ?>" required>
        </div>
        <label for="inputNama" class="col-sm-2 col-form-label pb-4 font-weight-bold">Nama</label>
        <div class="col-sm-10">
            <input class="form-control"type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
        </div>
        <label for="inputTempatLahir" class="col-sm-2 col-form-label pb-4 font-weight-bold">Tempat Lahir</label>
        <div class="col-sm-10">
            <input class="form-control"type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" required>
        </div>
        <label for="inputTanggalLahir" class="col-sm-2 col-form-label pb-4 font-weight-bold">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input class="form-control"type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required>
        </div>
        <label for="inputNomorHP" class="col-sm-2 col-form-label pb-4 font-weight-bold">Nomor HP</label>
        <div class="col-sm-10">
            <input class="form-control"type="text" name="nomor_hp" value="<?php echo $row['nomor_hp']; ?>" required>
        </div>
     <button type="submit" class="btn btn-outline-primary btn-lg btn-block mt-4">Update</button>
    </form>

</div>
<footer class="text-center fixed-bottom mb-2">D1A230109 | Muhammad Ridho Al Zamzami</footer>
</body>
</html>
