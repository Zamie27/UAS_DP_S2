<?php
include 'config.php';

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("DELETE FROM penduduk WHERE nik = ?");
    $stmt->bind_param("s", $nik); // asumsikan nik adalah string

    if ($stmt->execute()) {
        header("Location: index.php");
        exit(); // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "NIK tidak ditemukan.";
}

$conn->close();
?>
