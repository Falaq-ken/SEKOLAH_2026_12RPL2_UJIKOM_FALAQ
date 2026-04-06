<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PENGADUAN MUTU</title> <!-- // judul di tab browser -->

<style>
        *{ /* selector universal semua tag HTML kena (div, p, h1, dll) */
            margin: 0; /* reset semua jarak luar default */
            padding: 0; /* reset semua jarak dalam default */
        }

        body{
            font-family: 'Baloo 2', cursive; /* font tulisan */
            display: flex; /* pakai flexbox */
            flex-direction: column; /* susun ke bawah */
            align-items: center; /* posisi ke tengah horizontal */
        }

        .navbar {
            width: 100%; /* lebar full layar */
            height: 60px; /* tinggi navbar */
            background-color: rgb(255, 55, 82); /* warna navbar */
            border-bottom: 2px solid black; /* garis bawah */
            display: flex; /* flexbox */
            align-items: center; /* isi navbar rata tengah */
        }

        .isinav{
            font-size: 25px; /* ukuran teks */
            padding-left: 15px; /* jarak kiri */
        }

        .isi{  
            display: flex; /* flexbox */
            flex-direction: column; /* susun ke bawah */
            align-items: center; /* tengah horizontal */
            justify-content: center; /* tengah vertikal */
            margin-top: 15%; /* jarak dari atas */
            text-align: center; /* teks ke tengah */
        }

        button{
            margin-top: 20px; /* jarak atas */
            width: 500px; /* lebar tombol */
            height: 50px; /* tinggi tombol */
            background-color: rgb(255, 55, 82); /* warna tombol */
            border-radius: 10px; /* sudut melengkung */
            border: 2px solid black; /* garis tepi */
            font-family: 'Baloo 2'; /* font */
            font-weight: bold; /* teks tebal */
            font-size: large; /* ukuran teks */
            transition: all 0.2s ease; /* animasi halus */
        }

        button:hover{
            background-color: rgb(190, 18, 41); /* warna saat hover */
            cursor: pointer; /* cursor jadi tangan */
            color: white; /* warna teks */
            font-size: larger; /* teks membesar */
            transform: translateY(-4px); /* naik dikit */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* bayangan */
        }

        .button2{
            width: 120px; /* lebar lebih kecil */
            height: 35px; /* tinggi lebih kecil */
            font-size: medium; /* ukuran teks */
        }

        .button2:hover{
            font-size: large; /* teks membesar saat hover */
        }

</style>
</head>

<body>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // ambil font dari Google -->

<nav class="navbar"> <!-- // bagian navbar (header atas) -->
    <h1 class="isinav">PENGADUAN SARPRAS MUTU</h1> <!-- // judul navbar -->
</nav>

<div class="isi"> <!-- // isi utama halaman -->
    <h1><b>SELAMAT DATANG DI</b></h1> <!-- // teks utama -->
    <h4><b>aplikasi pengaduan sarpras smk mutu</b></h4> <!-- // sub teks -->

    <div>
        <a href="login.php"> <!-- // link ke halaman login -->
            <button class="button">LOGIN !</button> <!-- // tombol login -->
        </a> 
    </div>
</div>

</body>
</html>