<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// kalo blum login admin, balik ke login
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM kategori");
$no = 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori</title>

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

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
            width: 60%;
            margin: auto;
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

        tr:nth-child(even){
            background-color: #f2f2f2;
        }

        button{
            border: 1px solid black;
            background-color: rgb(255, 55, 82);
            color: black;
            border-radius: 10px;
            padding: 6px 14px;
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
            color: inherit;
        }

        .kembali{
            margin-top: 20px;
        }
    </style>
</head>

<body>

<h2>DATA KATEGORI</h2>

<div class="box">
    <table>
        <tr>
            <th>No</th>
            <th>ID Kategori</th>
            <th>Keterangan Kategori</th>
            <th>Aksi</th>
        </tr>

        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['id_kategori'] ?></td>
            <td><?= $data['ket_kategori'] ?></td>
            <td class="aksi">
                <a href="edit-kategori.php?id=<?= $data['id_kategori'] ?>">
                    <button><b>EDIT</b></button>
                </a>
                <a href="hapus-kategori.php?id=<?= $data['id_kategori'] ?>"
                   onclick="return confirm('Ciuss pengen apuss nih hamphh?')">
                    <button><b>HAPUS !</b></button>
        </tr>
        <?php } ?>
    </table>
</div>

<div class="kembali">
    <a href="admin.php">
        <button><b>KEMBALI</b></button>
    </a>
</div>

</body>
</html>
