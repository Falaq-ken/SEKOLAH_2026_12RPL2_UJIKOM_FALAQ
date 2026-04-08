<?php
session_start(); // // mulai session, supaya bisa akses data user yang login

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    // !isset($_SESSION['role']) = cek apakah session 'role' BELUM ada (user belum login)
    // $_SESSION['role'] != 'admin' = cek apakah user bukan admin
    // tanda || = ATAU (jadi kalau salah satu kondisi benar, maka dijalankan)

    header("Location: ../login.php");
    // kalau bukan admin / belum login → langsung diarahkan ke halaman login

    exit;
    // menghentikan script supaya tidak lanjut menjalankan code di bawahnya
}
?>

<!DOCTYPE html> 
<html lang="id"> 
<head>
    <meta charset="UTF-8"> 
    <title>HALAMAN ADMIN</title> <!-- // judul tab browser -->

<style>
    *{ /* selector universal = semua elemen HTML kena */
        margin: 0; /* // hapus jarak luar default dari semua elemen */
        padding: 0; /* // hapus jarak dalam default */
        box-sizing: border-box; /* // biar ukuran elemen lebih rapi (padding ga nambah ukuran total) */
    }

    body{
        font-family: 'Baloo 2'; /* // font utama halaman */
        flex-direction: column ; /* // susunan flex ke bawah (vertikal) */
        justify-content: center; /* // isi diposisikan ke tengah secara vertikal */
        display: flex; /* // aktifkan flexbox (biar bisa atur posisi dengan mudah) */
        align-items: center; /* // posisi tengah horizontal */
    }

    .navbar {
        width: 100%; /* // lebar full layar */
        height: 50px; /* // tinggi navbar */
        background-color: rgb(255, 55, 82); /* // warna merah */
        border: 1px solid black; /* // garis pinggir */
    }

    .isinav{
        display: flex; /* // supaya isi bisa diatur fleksibel */
        align-items: start; /* // posisi teks di atas */
        font-family: 'Baloo 2'; /* // font */
        color: black; /* // warna teks */
        font-size: 25px; /* // ukuran teks */
        text-align: start; /* // rata kiri */
        padding-left: 5px; /* // jarak dari kiri */
        padding-top: 4px; /* // jarak dari atas */
    }

    button{
        border: none; /* // hapus border bawaan browser */
        border: 1px solid; /* // kasih border baru */
        padding: 5px; /* // jarak dalam */
        background-color:  rgb(255, 55, 82); /* // warna tombol */
        border-radius: 7px; /* // sudut agak bulat */
        font-family: 'Baloo 2'; /* // font */
        margin-top:14px; /* // jarak antar tombol */
        width: 150px; /* // lebar awal (nanti dioverride) */
        height: 35px; /* // tinggi awal */
        padding: 0 12px; /* // padding kiri kanan */
        border-radius: 10px; /* // override jadi lebih bulat */
        border: 1px solid black; /* // border hitam */
        font-weight: bold; /* // teks tebal */
        font-size: large; /* // ukuran teks */
        height: 50px; /* // override tinggi jadi 50px */
        width: 500px; /* // override lebar jadi besar */
        transition: all 0.2s ease; /* // animasi halus saat hover */
    }

    button:hover{
        background-color:  rgb(190, 18, 41); /* // warna berubah saat disentuh mouse */
        cursor: pointer; /* // kursor jadi tangan */
        color: white; /* // teks jadi putih */
        font-weight: bold; /* // tetap tebal */
        font-size: larger; /* // teks sedikit membesar */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* // bayangan awal */
        transform: translateY(-3px); /* // tombol naik dikit */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* // bayangan lebih tebal */
    }

    .button2{
        width: 100px; /* // tombol khusus logout lebih kecil */
        height: 30px; /* // lebih pendek */
        padding: 0 12px; /* // padding kiri kanan */
        font-size: small; /* // ukuran teks kecil */
    }

    .button2:hover{
        background-color:  rgb(204, 30, 53); /* // warna hover khusus logout */
        cursor: pointer; /* // cursor tangan */
        color: white; /* // teks jadi putih */
        font-weight: bold; /* // tetap tebal */
        font-size: medium; /* // sedikit membesar saat hover */
    }

    .isi{  
        display: flex; /* // pakai flexbox */
        flex-direction: column; /* // susun ke bawah */
        align-items: center; /* // posisi tengah horizontal */
        justify-content: center; /* // posisi tengah vertikal */
        margin-top: 13%; /* // jarak dari atas layar */
    }

</style>
</head>

<body> 

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // ambil font Baloo dari Google Fonts -->

<nav class="navbar"> 
    <h1 class="isinav">HALAMAN ADMIN</h1> <!-- // teks judul di navbar -->
</nav>

<div class="isi"> <!-- // wadah semua tombol menu -->

<a href="data-pengaduan.php"> <!-- // kalau diklik pindah ke halaman data pengaduan -->
    <button>LIST ASPIRASI</button> <!-- // tombol untuk lihat daftar aspirasi -->
</a>

<a href="form-siswa.php"> <!-- // pindah ke halaman buat akun siswa -->
    <button>BUAT AKUN SISWA</button> <!-- // tombol tambah siswa -->
</a>

<a href="data-siswa.php"> <!-- // pindah ke halaman data siswa -->
    <button>DATA AKUN SISWA</button> <!-- // tombol lihat semua siswa -->
</a>

<a href="tambah-kategori.php"> <!-- // pindah ke halaman tambah kategori -->
    <button>TAMBAH KATEGORI</button> <!-- // tombol tambah kategori -->
</a>

<a href="data-kategori.php"> <!-- // pindah ke halaman data kategori -->
    <button>DATA KATEGORI</button> <!-- // tombol lihat kategori -->
</a>

<a href="logout.php"> <!-- // pindah ke halaman logout -->
    <button class="button2">LOGOUT!</button> <!-- // tombol keluar dari akun -->
</a>

</div>
</body>
</html>