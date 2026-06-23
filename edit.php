<?php

include 'config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_array(
    mysqli_query($conn,"SELECT * FROM members WHERE id='$id'")
);

if(isset($_POST['update']))
{
    mysqli_query($conn,"
        UPDATE members SET
        nama='$_POST[nama]',
        generasi='$_POST[generasi]',
        tanggal_lahir='$_POST[tanggal_lahir]',
        deskripsi='$_POST[deskripsi]'
        WHERE id='$id'
    ");

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Member</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<h3>Edit Member</h3>

<form method="POST">

<input type="text"
name="nama"
value="<?= $data['nama'] ?>"
class="form-control mb-3">

<input type="text"
name="generasi"
value="<?= $data['generasi'] ?>"
class="form-control mb-3">

<input type="date"
name="tanggal_lahir"
value="<?= $data['tanggal_lahir'] ?>"
class="form-control mb-3">

<textarea
name="deskripsi"
class="form-control mb-3"><?= $data['deskripsi'] ?></textarea>

<button name="update" class="btn btn-primary">
Update
</button>

</form>

</div>

</body>
</html>