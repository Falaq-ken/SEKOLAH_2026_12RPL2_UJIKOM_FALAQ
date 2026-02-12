<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// proteksi admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM kategori");
$no = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
</head>
<body>

<h2>DATA KATEGORI</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>ID Kategori</th>
        <th>Keterangan Kategori</th>
    </tr>

    <?php while ($data = mysqli_fetch_assoc($query)) { ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['id_kategori'] ?></td>
        <td><?= $data['ket_kategori'] ?></td>
    </tr>
    <?php } ?>
</table>

<br>
<a href="admin.php"><button>Kembali</button></a>

</body>
</html>
