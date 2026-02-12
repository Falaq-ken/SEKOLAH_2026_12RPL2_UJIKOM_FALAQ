<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>LIST ASPIRASI</h2>
</body>
</html>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>ID pelapor</th>
        <th>NIS</th>
        <th>ID kategori</th>
        <th>Lokasi</th>
        <th>Nama kategori</th>
        <th>keterangan</th>
        <th>Status</th>
        <th>Feedback</th>
        <th>Aksi</th>
        
    </tr>

    <?php
    session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");
    $no = 1;

    $query = mysqli_query($koneksi, "
        SELECT input_aspirasi.*, kategori.ket_kategori
        FROM input_aspirasi
        LEFT JOIN kategori
        ON input_aspirasi.id_kategori = kategori.id_kategori
    ");

    while ($data = mysqli_fetch_assoc($query)) {
    ?>

    <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['id_pelapor'] ?></td>
        <td><?= $data['nis'] ?></td>
        <td><?= $data['id_kategori'] ?></td>
        <td><?= $data['lokasi'] ?></td>
        <td><?= $data['ket_kategori'] ?></td>
        <td><?= $data['ket'] ?></td>
        <td><?= $data['status'] ?></td>
        <td><?= $data['feedback'] ?></td>
        <td>
            <a href="detail-pengaduan.php?id=<?= $data['id_pelapor'] ?>">
                <button>Detail</button>
            </a>
        </td>
    </tr>

    <?php } ?>
</table>

<button><a href="admin.php">kembali</a></button>