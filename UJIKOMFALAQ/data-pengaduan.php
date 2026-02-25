<?php
session_start();

if (!isset($_SESSION['nis'])) {
    header("Location: login.php");
    exit;
}

$nis = $_SESSION['nis'];
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Aspirasi</title>

    <style>
        body{
            font-family: 'Baloo 2';
            margin: 0;
            padding: 30px;
            background-color:white;
            text-align: center;
        }

        h2{
            color: black;
            margin-bottom: 20px;
        }

        .box{
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
            overflow-x: auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th{
            background-color: rgb(255, 55, 82);
            color: white;
        }

        button{
            border: 1px solid black;
            background-color: rgb(255, 55, 82);
            color: black;
            border-radius: 10px;
            padding: 5px 10px;
            font-family: 'Baloo 2';
            transition: all 0.2s ease;
        }

        button:hover{
            background-color: rgb(204, 30, 53);
            color: white;
            font-weight: bold;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
            cursor: pointer;
        }

        .kembali{
            margin-top: 20px;
        }
    </style>
</head>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<body>

<h2>DATA ASPIRASI</h2>

<div class="box">
    <table>
        <tr>
            <th>No</th> 
            <th>Nama</th>
            <th>NIS</th>
            <th>tanggal</th>
            <th>Lokasi</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "
            SELECT input_aspirasi.*, kategori.ket_kategori, user.username
            FROM input_aspirasi
            LEFT JOIN kategori
            ON input_aspirasi.id_kategori = kategori.id_kategori
            LEFT JOIN user
            ON input_aspirasi.nis = user.nis 
            WHERE user.nis = '$nis'
        ");

        while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['nis'] ?></td>
            <td><?= date('d M Y', strtotime($data['tanggal'])) ?></td>
            <td><?= $data['lokasi'] ?></td>
            <td><?= $data['ket_kategori'] ?></td>
            <td><?= $data['ket'] ?></td>
            <td><?= $data['status'] ?></td>
            <td>
                <a href="detail-pengaduan.php?id=<?= $data['id_pelapor'] ?>">
                    <button><b>DETAIL</b></button>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<div class="kembali">
    <a href="siswa.php">
        <button><b>KEMBALI</b></button>
    </a>
</div>

</body>
</html>
