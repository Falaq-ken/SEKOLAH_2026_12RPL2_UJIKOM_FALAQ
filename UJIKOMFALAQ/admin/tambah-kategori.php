<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// proteksi admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $id_kategori  = $_POST['id_kategori'];
    $ket_kategori = $_POST['ket_kategori'];

    mysqli_query($koneksi, "
        INSERT INTO kategori (id_kategori, ket_kategori)
        VALUES ('$id_kategori', '$ket_kategori')
    ");

    header("Location: kategori.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>

    <style>
        body{
            font-family: 'Baloo 2';
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            height: 100vh;
            background-color: rgb(255, 55, 82);
        }

        .box{
            background-color: white;
            padding: 25px;
            border: 1px solid black;
            border-radius: 15px;
            width: 250px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .box:hover{
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
            transform: translateY(-3px);
        }

        h2{
            margin-top: 0;
            margin-bottom: 15px;
        }

        input{
            margin-top: 8px;
            margin-bottom: 8px;
            width: 100%;
            height: 35px;
            padding: 0 12px;
            font-family: 'Baloo 2';
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
        }

        button{
            background-color: rgb(255, 55, 82);
            border-radius: 10px;
            border: 1px solid black;
            font-family: 'Baloo 2';
            width: 100%;
            height: 35px;
            margin-top: 6px;
            transition: all 0.2s ease;
        }

        button:hover{
            background-color: rgb(190, 18, 41);
            color: white;
            font-weight: bold;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
            cursor: pointer;
            font-size: medium;
        }

        a{
            text-decoration: none;
        }
    </style>
</head>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">   
<body>

<div class="box">
    <h2>TAMBAH KATEGORI</h2>

    <form method="post">
        <input 
            type="number" 
            name="id_kategori" 
            placeholder="ID Kategori" 
            required
        >

        <input 
            type="text" 
            name="ket_kategori" 
            placeholder="Nama Kategori" 
            required
        >

        <button type="submit" name="simpan"><b>TAMBAH !</b></button>

        <a href="admin.php">
            <button type="button"><b>KEMBALI</b></button>
        </a>
    </form>
</div>

</body>
</html>
