<?php
session_start(); 
// session_start() = memulai / mengaktifkan session di PHP
// session itu ibarat "penyimpanan sementara" di server buat nyimpen data user

// contoh kegunaan:
// setelah login berhasil, biasanya disimpen:
// $_SESSION['username'] = "falaq";
// $_SESSION['role'] = "admin";

// jadi walaupun pindah halaman:
// user tetap dianggap sudah login (gak perlu login ulang)

// WAJIB ditaruh di paling atas sebelum HTML
// karena session butuh akses ke header (kalau di bawah bisa error)

// kalau gak pakai session:
// setiap pindah halaman, data login bakal hilang 

// analogi gampang:
// session = kayak kartu identitas sementara
// session_start() = "aktifin kartu identitas itu"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> <!-- // judul tab -->

    <style>
        body{
            font-family: 'Baloo 2'; /* font halaman */
            display: flex; /* flexbox */
            justify-content: center; /* tengah horizontal */
            flex-direction: column; /* susun ke bawah */
            align-items: center; /* tengah horizontal */
            margin: 0; /* reset margin */
            height: 90vh; /* tinggi hampir full layar */
            background-color:  rgb(255, 55, 82); /* warna background */
            text-align: center; /* teks ke tengah */
        }

        img{
            width: 70px; /* lebar gambar */
            height: 50px; /* tinggi gambar */
            margin-bottom: -35px; /* geser posisi ke atas */
        }

        .box{
            margin-top: 9%; /* jarak dari atas */
            background-color: white; /* warna box */
            padding: 25px; /* jarak dalam */
            border: 1px solid; /* garis tepi */
            border-radius: 15px; /* sudut melengkung */
            width: 190px; /* lebar box */
            transition: all 0.2s ease; /* animasi */
        }

        .box:hover{
                cursor: pointer; /* cursor jadi tangan */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* bayangan */
                transform: translateY(-3px); /* efek naik */
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* bayangan lebih kuat */
        }

        input{
            font-family: 'Baloo 2'; /* font input */
            margin-bottom: 10px; /* jarak bawah */
            width: 100%; /* full lebar */
            height: 35px; /* tinggi input */
            padding: 0 12px; /* jarak dalam */
            border-radius: 10px; /* sudut melengkung */
            border: 1px solid black; /* garis tepi */
            font-size: 14px; /* ukuran teks */
            box-sizing: border-box; /* ukuran tetap */
            margin-bottom: 5px; /* jarak bawah */
        }

        form{
            font-family: 'Baloo 2'; /* font form */
        }
        
        .button{
            border: none; /* hapus border default */
            border: 1px solid; /* garis tepi */
            padding: 5px; /* jarak dalam */
            background-color: rgb(255, 55, 82); /* warna tombol */
            border-radius: 5px; /* sudut */
            font-family: 'Baloo 2'; /* font */
            margin-top: 5px; /* jarak atas */
            width: 60%; /* lebar tombol */
            height: 35px; /* tinggi */
            padding: 0 12px; /* jarak dalam */
            border-radius: 10px; /* sudut */
            border: 1px solid black; /* garis tepi */
            font-size: 14px; /* ukuran teks */
            box-sizing: border-box; /* ukuran tetap */
            transition: all 0.2s ease; /* animasi */
        }

        .button:hover{
            background-color:  rgb(204, 30, 53); /* warna hover */
            cursor: pointer; /* cursor pointer */
            color: white; /* warna teks */
            font-weight: bold; /* tebal */
            font-size: 17px; /* membesar */
            transform: translateY(-3px); /* naik */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* bayangan */
        }
    </style>
</head>

<body>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // ambil font dari Google -->

<div class="box"> <!-- // container utama -->

    <form action="proses-login.php" method="POST"> <!-- // kirim data ke file proses -->

        <img 
            src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small/profile-icon-design-free-vector.jpg" 
            alt="icon user"
        > <!-- // gambar icon user -->

        <b><h2>LOGIN</h2></b> <!-- // judul form -->

        <?php include "pesan.php"; ?> <!-- // tampilkan pesan (error login dll) -->

        <input 
            placeholder="Username" 
            type="text" 
            name="username" 
            required
        > <!-- // input username -->

        <input 
            placeholder="Password" 
            type="password" 
            name="password" 
            required
        > <!-- // input password -->

        <button class="button" type="submit">
            <b>LOGIN !</b>
        </button> <!-- // tombol kirim data login -->

        <a href="index.php"> <!-- // link ke halaman awal -->
            <button class="button" type="button">
                <b>KEMBALI</b>
            </button> <!-- // tombol kembali -->
        </a>

    </form>
</div>

</body>
</html>