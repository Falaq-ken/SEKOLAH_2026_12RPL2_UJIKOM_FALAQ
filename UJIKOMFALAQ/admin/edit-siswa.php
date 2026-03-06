<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];

    mysqli_query($koneksi, "
        UPDATE user SET
        username='$username',
        password='$password',
        nis='$nis',
        kelas='$kelas'
        WHERE id='$id'
    ");

    header("Location: data-siswa.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>

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
    <h2>EDIT DATA SISWA</h2>

    <form method="post">
        <label>Username</label>
        <input 
        type="text" 
        name="username" 
        value="<?= $data['username'] ?>">

        <label>Password</label>
        <input 
        type="text" 
        name="password"
        value="<?= $data['password'] ?>">

        <label>NIS</label>
        <input 
        type="text" 
        name="nis" 
        value="<?= $data['nis'] ?>">

        <label>Kelas</label>
        <input 
        type="text" 
        name="kelas" 
        value="<?= $data['kelas'] ?>">

        <button type="submit" name="update"><b>UPDATE !</b></button>

        <a href="data-siswa.php">
            <button type="button"><b>BATAL</b></button>
        </a>
    </form>
</div>
</body>
</html>