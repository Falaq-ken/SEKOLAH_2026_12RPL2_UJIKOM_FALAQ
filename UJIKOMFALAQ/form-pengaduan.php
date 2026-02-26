<?php
session_start();
$nis = $_SESSION['nis'];
$sql = " SELECT * FROM `kategori`";
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Aspirasi</title>

    <style>
        body{
            font-family: 'Baloo 2';
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            height: 100vh;
            background-color: rgb(255, 55, 82);
            text-align: center;
        }

        .box{
            background-color: white;
            padding: 25px;
            border: 1px solid black;
            border-radius: 15px;
            width: 260px;
            transition: all 0.2s ease;
        }

        .box:hover{
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
            transform: translateY(-3px);
        }

        input{
            margin-top: 7px;
            margin-bottom: 7px;
            width: 100%;
            height: 35px;
            padding: 0 12px;
            font-family: 'Baloo 2';
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
        }

        select{
            margin-top: 7px;
            margin-bottom: 7px;
            width: 100%;
            height: 35px;
            padding: 0 12px;
            font-family: 'Baloo 2';
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
        }
        
        textarea {
            margin-top: 7px;
            margin-bottom: 7px;
            width: 100%;
            height: 80px;
            padding: 0 12px;
            font-family: 'Baloo 2';
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
        }
            
        button{
            background-color: rgb(255, 55, 82);
            border: 1px solid black;
            border-radius: 10px;
            font-family: 'Baloo 2';
            width: 100%;
            height: 35px;
            margin-top: 5px;
            transition: all 0.2s ease;
        }

        button:hover{
            background-color: rgb(204, 30, 53);
            color: white;
            font-weight: bold;
            font-size: 16px;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
            cursor: pointer;
        }

    </style>
</head>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<body>

<div class="box">
    <form action="proses-pengaduan.php" method="POST">
        <h2>INPUT ASPIRASI</h2>

        <?php include "pesan.php"; ?>

        <input type="text" name="nis" value="<?= $nis ?>" readonly required>

            <select id="kategori" name="kategori" required>
                <?php while($data = mysqli_fetch_array($query)){ ?>   
                    <option value="" selected hidden>Pilih Kategori</option>
                    <option value="<?=  $data['id_kategori']?>"><?= $data['ket_kategori'] ?></option>
                <?php } ?>
            </select>

        <input type="text" name="lokasi" placeholder="Lokasi" required>

        <input type="date" name="tanggal" placeholder="Tanggal" required>

        <textarea name="keterangan" placeholder="Keterangan" required></textarea>

        <button type="submit"><b>KIRIM !</b></button>

        <a href="siswa.php">
            <button type="button"><b>KEMBALI</b></button>
        </a>
    </form>
</div>

</body>
</html>
