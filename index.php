<?php
include 'config.php';
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
 <title>CRUD Data Penduduk</title>
 <link rel="stylesheet" type="text/css" href="bootstraps/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5 font-weight-bold">DATA PENDUDUK DESA</h1>
    <div class="d-flex justify-content-end mt-5">
        <a type="button" class="btn btn-outline-primary mb-4" href="create.php">Tambahkan +</a>
    </div>
    <table class="table ">
    <thead class="thead-dark">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Nomor HP</th>
            <th>Aksi</th>
        </tr>
    
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['nik']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['tempat_lahir']; ?></td>
            <td><?php echo $row['tanggal_lahir']; ?></td>
            <td><?php echo $row['nomor_hp']; ?></td>
            <td class="actions">
            <a href="edit.php?nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete.php?nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Hapus</a>
            </td>
         </tr>
    </thead>
 <?php endwhile; ?>
 </table>
</div>
<footer class="text-center fixed-bottom mb-2">D1A230109 | Muhammad Ridho Al Zamzami</footer>
</body>
<script href="bootstraps/js/bootstrap.min.js"></script>
<!-- js alert -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function confirmDelete() {
    return confirm('Apakah anda yakin ingin menghapus data ini?');
}
</script>
</html>
<?php $conn->close(); ?>