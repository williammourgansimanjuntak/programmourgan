<?php

$data = file_get_contents("data.json");
$members = json_decode($data, true);

// kalau kosong atau error, jadikan array kosong
if (!is_array($members)) {
    $members = [];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Daftar Member</h2>

    <a href="tambah.php" class="btn btn-primary mb-3">
        Tambah Member
    </a>

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Generasi</th>
            <th>Tanggal Lahir</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>

        <?php if (!empty($members)) : ?>
            <?php foreach ($members as $index => $m) : ?>

                <tr>

                    <td><?= $no++ ?></td>

<td 
                class="text-center align-middle">
        <?php if (!empty($m['foto'])) : ?>
                <img src="uploads/<?= $m['foto'] ?>" width="120" class="rounded">
        <?php else : ?>
                Tidak ada foto
        <?php endif; ?>
</td>

                    <td><?= htmlspecialchars($m['nama']) ?></td>
                    <td><?= htmlspecialchars($m['generasi']) ?></td>
                    <td><?= htmlspecialchars($m['tanggal_lahir']) ?></td>
                    <td><?= htmlspecialchars($m['deskripsi']) ?></td>

                    <td>
                        <a href="hapus.php?id=<?= $index ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin mau hapus?')">
                           Hapus
                        </a>
                    </td>

                </tr>

            <?php endforeach; ?>
        <?php else : ?>

            <tr>
                <td colspan="7" class="text-center">
                    Belum ada data member
                </td>
            </tr>

        <?php endif; ?>

    </table>

</div>

</body>
</html>
