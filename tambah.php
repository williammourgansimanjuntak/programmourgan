<?php

if (isset($_POST['simpan'])) {

    $data = file_get_contents("data.json");
    $members = json_decode($data, true);

    if (!is_array($members)) {
        $members = [];
    }

    // =========================
    // UPLOAD FOTO
    // =========================
    $fotoName = "";

    if (!empty($_FILES['foto']['name'])) {

        $fotoName = time() . "_" . $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        // simpan ke folder uploads
        move_uploaded_file($tmp, "uploads/" . $fotoName);
    }

    // =========================
    // SIMPAN DATA MEMBER
    // =========================
    $members[] = [
        "nama" => $_POST['nama'],
        "generasi" => $_POST['generasi'],
        "tanggal_lahir" => $_POST['tanggal_lahir'],
        "deskripsi" => $_POST['deskripsi'],
        "foto" => $fotoName
    ];

    file_put_contents("data.json", json_encode($members, JSON_PRETTY_PRINT));

    header("Location: index.php");
    exit;
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

    <h2>Tambah Member</h2>

    <!-- PENTING: enctype WAJIB untuk upload file -->
    <form method="POST" enctype="multipart/form-data">
    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
        <input type="text" name="generasi" class="form-control mb-2" placeholder="Generasi" required>
        <input type="date" name="tanggal_lahir" class="form-control mb-2" required>

        <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>

        <!-- INPUT FOTO -->
        <input type="file" name="foto" class="form-control mb-3" accept="image/*">

        <button type="submit" name="simpan" class="btn btn-success">
            Simpan
        </button>

        <a href="index.php" class="btn btn-secondary">Kembali</a>

    </form>

</div>

</body>
</html>