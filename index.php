<?php
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi JKT48</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Sistem Informasi JKT48</h2>

    <a href="tambah.php" class="btn btn-success mb-3">
        Tambah Member
    </a>

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Generasi</th>
            <th>Tanggal Lahir</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        <?php

        $no = 1;

        $query = mysqli_query($conn,"SELECT * FROM members");

        while($data = mysqli_fetch_array($query))
        {

        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['generasi'] ?></td>
            <td><?= $data['tanggal_lahir'] ?></td>
            <td><?= $data['deskripsi'] ?></td>

            <td>

                <a href="edit.php?id=<?= $data['id'] ?>"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="hapus.php?id=<?= $data['id'] ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus data?')">
                    Hapus
                </a>

            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>