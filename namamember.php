<?php

include 'config/koneksi.php';

if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $generasi = $_POST['generasi'];
    $tanggal = $_POST['tanggal_lahir'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn,"
        INSERT INTO members
        (nama,generasi,tanggal_lahir,deskripsi)
        VALUES
        ('$nama','$generasi','$tanggal','$deskripsi')
    ");

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Member</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h3>Tambah Member</h3>

<form method="POST">

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label>Generasi</label>
<input type="text" name="generasi" class="form-control" required>
</div>

<div class="mb-3">
<label>Tanggal Lahir</label>
<input type="date" name="tanggal_lahir" class="form-control" required>
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"></textarea>
</div>

<button type="submit" name="simpan" class="btn btn-primary">
Simpan
</button>

<a href="index.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>
