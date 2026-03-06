<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $kategori = $_POST['ket_kategori'];

    mysqli_query($koneksi, "
        UPDATE kategori SET
        ket_kategori='$kategori'
        WHERE id_kategori='$id'
    ");
    header("Location: kategori.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

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
            width: 260px;
            border-radius: 15px;
            border: 1px solid black;
            text-align: center;
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
        }

        h2{
            margin-bottom: 15px;
        }

        label{
            font-size: 14px;
            font-weight: bold;
            display: block;
            text-align: left;
            margin-top: 8px;
        }

        input{
            width: 100%;
            height: 35px;
            margin-top: 4px;
            padding: 0 10px;
            border-radius: 10px;
            border: 1px solid black;
            font-family: 'Baloo 2';
            box-sizing: border-box;
        }

        button{
            width: 100%;
            height: 35px;
            margin-top: 8px;
            border-radius: 10px;
            border: 1px solid black;
            background-color: rgb(255, 55, 82);
            font-family: 'Baloo 2';
            cursor: pointer;
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

<body>

<div class="box">
    <h2>EDIT KATEGORI</h2>

    <form method="post">
        <label>Kategori</label>
        <input 
        type="text" 
        name="ket_kategori" 
        value="<?= $data['ket_kategori'] ?>">

        <button type="submit" name="update"><b>UPDATE !</b></button>

        <a href="kategori.php">
            <button type="button"><b>BATAL</b></button>
        </a>
    </form>
</div>
</body>
</html>