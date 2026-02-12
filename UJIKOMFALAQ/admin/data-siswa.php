<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// query ambil data siswa saja
$query = mysqli_query($koneksi, "
    SELECT * FROM user
    WHERE role = 'siswa'
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Akun Siswa</title>
</head>
<body>

<h2>DATA AKUN SISWA</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>NIS</th>
        <th>Kelas</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)) {
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['id'] ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['password'] ?></td>
            <td><?= $data['nis'] ?></td>
            <td><?= $data['kelas'] ?></td>
            <td><?= $data['role'] ?></td>
            <td>
                <a href="detail-siswa.php?id=<?= $data['id'] ?>">
                    <button>Detail</button>
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<br>
<a href="admin.php"><button>Kembali</button></a>

</body>
</html>
