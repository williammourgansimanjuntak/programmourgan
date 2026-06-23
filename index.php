<?php

$data = file_get_contents("data.json");
$members = json_decode($data, true);

if (!is_array($members)) {
    $members = [];
}

$total = count($members);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Member JKT48</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial;
            color: white;
        }

        /* VIDEO BACKGROUND */
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: brightness(0.4);
        }

        /* NAVBAR */
        .navbar {
            background: rgba(0,0,0,0.6);
            padding: 15px;
            margin-bottom: 100px;
        }

        /* CONTAINER GLASS */
        .glass {
            background: rgba(0,0,0,0.6);
            padding: 20px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        /* CARD */
        .card-box {
            background: rgba(255,255,255,0.1);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }

        /* TABLE */
        .table {
            background: white;
            color: black;
            border-radius: 10px;
            overflow: hidden;
        }

        .btn-custom {
            border-radius: 10px;
        }

        img {
            border-radius: 10px;
        }

        .welcome-title {
            font-size: 42px;
            font-weight: bold;
            color: #ffffff;
            letter-spacing: 1px;
            margin-bottom: 100px;
            text-shadow: 2px 2px 10px rgba(31, 28, 28, 0.7);
}

        .welcome-text {
            font-size: 18px;
            color: #ddd;
            margin-bottom: 100px;
            

}
        .chelsea-video {
            width: 250px;
            height: 500px;
            margin-left: 25px;

            
        }
        
        .michie-video {
            margin-bottom:100px;
            margin-left:200px;
            width: 250px;
            height: 500px;
            margin-left: 25px;

        }
    </style>

</head>

<body>

<!-- VIDEO BACKGROUND -->
<video autoplay muted loop class="video-bg">
    <source src="background/background.webm" type="video/webm">
</video>

<!-- NAVBAR -->
<div class="navbar d-flex align-items-center">

    <img src="image/logo.png" width="160" height="80" class="me-2">

    <h1 class="m-0">Dashboard Glenn Xeforius</h1>

</div>

<div class="text-center mb-4">

    <div class="welcome-title">
        Selamat Datang
    </div>

    <div class="welcome-text">
        <p> Selamat Datang di forum highlight oshi Glenn Xeforius</p>
        <p> Siapa itu Glenn Xeforius? </P>
        <p> Glenn Xeforius adalah seorang Fans JKT48 yang memiliki badan yang besar dan juga</P>
        <p> memiliki tampang yang tampan dan menawan. Dia juga memiliki beberapa oshi, diantaranya</P>

    </div>

    <div class="chelsea-video">
        <video autoplay muted loop class="chelsea-video">
            <source src="image/chelsea1.mp4" type="video/mp4">
        </video>
</div>
<div class="michie-video">
        <video autoplay muted loop class="michie-video">
            <source src="image/michie.mp4" type="video/mp4">
        </video>
    </div>


    <!-- STATS -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card-box">
                <h3><?= $total ?></h3>
                <p>Total Member</p>
            </div>
        </div>
    </div>


    <!-- TABLE -->
    <div class="glass">

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

            <?php foreach ($members as $index => $m) : ?>

            <tr>
                <td><?= $no++ ?></td>

                <td class="text-center">
                    <?php if (!empty($m['foto'])) : ?>
                        <img src="uploads/<?= $m['foto'] ?>" width="80">
                    <?php else : ?>
                        -
                    <?php endif; ?>
                </td>

                <td><?= htmlspecialchars($m['nama']) ?></td>
                <td><?= htmlspecialchars($m['generasi']) ?></td>
                <td><?= htmlspecialchars($m['tanggal_lahir']) ?></td>
                <td><?= htmlspecialchars($m['deskripsi']) ?></td>

                <td>
                    <a href="hapus.php?id=<?= $index ?>" class="btn btn-danger btn-sm">
                        Hapus
                    </a>
                </td>

            </tr>

            <?php endforeach; ?>

        </table>

    </div>

</div>

    <a href="tambah.php" 
        class="btn btn-success mb-3 btn-custom"
        style="margin-left: 125px;">
        + Tambah Member
</a>

    
</body>
</html>
