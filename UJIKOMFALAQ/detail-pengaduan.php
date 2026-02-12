<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// cek id dari URL
if (!isset($_GET['id'])) {
    echo "ID aspirasi tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

// ambil data aspirasi
$query = mysqli_query($koneksi, "
    SELECT input_aspirasi.*, kategori.ket_kategori
    FROM input_aspirasi
    LEFT JOIN kategori 
        ON input_aspirasi.id_kategori = kategori.id_kategori
    WHERE input_aspirasi.id_pelapor = '$id'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data aspirasi tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Aspirasi</title>
</head>
<body>

<h2>DETAIL ASPIRASI</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td><b>ID Aspirasi</b></td>
        <td><?= $data['id_pelapor']; ?></td>
    </tr>
    <tr>
        <td><b>Kategori</b></td>
        <td><?= $data['ket_kategori']; ?></td>
    </tr>
    <tr>
        <td><b>Lokasi</b></td>
        <td><?= $data['lokasi']; ?></td>
    </tr>
    <tr>
        <td><b>Keterangan</b></td>
        <td><?= $data['ket']; ?></td>
    </tr>
    <tr>
        <td><b>Status</b></td>
        <td><?= ucfirst($data['status']); ?></td>
    </tr>
    <tr>
        <td><b>Feedback Admin</b></td>
        <td>
            <?= $data['feedback'] ? $data['feedback'] : '<i>Belum ada feedback dari admin</i>'; ?>
        </td>
    </tr>
</table>

<br>
<a href="data-pengaduan.php">Kembali</a>

</body>
</html>
