<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

if (isset($_POST['simpan'])) {

    $ket_kategori = $_POST['ket_kategori'];

    mysqli_query($koneksi, "
        INSERT INTO kategori ( ket_kategori)
        VALUES ('$ket_kategori')
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
            height: 100vh;
            margin: 0;
            background-color: rgb(255, 55, 82);
        }

        .box{
            background-color: white;
            padding: 25px;
            width: 250px;
            border-radius: 15px;
            border: 1px solid black;
            text-align: center;
        }

        input{
            width: 90%;
            height: 35px;
            margin: 8px 0;
            padding: 0 10px;
            border-radius: 10px;
            border: 1px solid black;
            font-family: 'Baloo 2';
        }

        button{
            width: 100%;
            height: 35px;
            margin-top: 6px;
            border-radius: 10px;
            border: 1px solid black;
            background-color: rgb(255, 55, 82);
            font-family: 'Baloo 2';
            transition: all 0.2s ease;
        }

        button:hover{
            background-color:  rgb(204, 30, 53);
            cursor: pointer;
            color: white;
            font-weight: bold;
            font-size: medium;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

    </style>
</head>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

<body>
<div class="box">
    <h2>TAMBAH KATEGORI</h2>

    <form method="POST">
        
        <input 
        type="text" 
        name="ket_kategori" 
        placeholder="Nama Kategori" 
        required>

        <button type="submit" name="simpan"><b>TAMBAH !</b></button>
        <a href="admin.php">
            <button type="button"><b>KEMBALI</b></button>
        </a>
    </form>
</div>
</body>
</html>