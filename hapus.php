<?php

$id = $_GET['id'];

$data = file_get_contents("data.json");
$members = json_decode($data, true);

if (!is_array($members)) {
    $members = [];
}

// hapus data sesuai index
unset($members[$id]);

// reset index array
$members = array_values($members);

// simpan ulang
file_put_contents("data.json", json_encode($members, JSON_PRETTY_PRINT));

header("Location: index.php");
exit;

?>
