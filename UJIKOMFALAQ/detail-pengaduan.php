<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$id = $_GET['id'];

$query = mysqli_query($koneksi, "
    SELECT input_aspirasi.*, kategori.ket_kategori
    FROM input_aspirasi
    LEFT JOIN kategori 
    ON input_aspirasi.id_kategori = kategori.id_kategori
    WHERE input_aspirasi.id_pelapor = '$id'
");

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Aspirasi</title>

    <style>
        body{
            font-family: 'Baloo 2';
            margin: 0;
            padding: 30px;
            background-color: white;
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
            width: 30%;
            margin: auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th{
            background-color: rgb(255, 55, 82);
            color: white;
            text-align: center;
        }

        tr:nth-child(even){
            background-color: #f2f2f2;
        }

        button{
            border: 1px solid black;
            background-color: rgb(255, 55, 82);
            color: black;
            border-radius: 10px;
            padding: 7px 15px;
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

        a{
            text-decoration: none;
        }

        .kembali{
            margin-top: 20px;
        }
    </style>
</head>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<body>

<h2>DETAIL ASPIRASI</h2>

<div class="box">
    <table>
        <tr>
            <th>ID Aspirasi</th>
            <td><?= $data['id_pelapor']; ?></td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td><?= $data['ket_kategori']; ?></td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td><?= $data['lokasi']; ?></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td><?= $data['tanggal']; ?></td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td><?= $data['ket']; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?=$data['status']; ?></td>
        </tr>
        <tr>
            <th>Feedback Admin</th>
            <td>
                <?= $data['feedback'] ? $data['feedback'] : '<i>Belum ada feedback dari admin</i>'; ?>
            </td>
        </tr>
    </table>
</div>

<div class="kembali">
    <a href="data-pengaduan.php">
        <button><b>KEMBALI</b></button>
    </a>
</div>
</body>
</html>