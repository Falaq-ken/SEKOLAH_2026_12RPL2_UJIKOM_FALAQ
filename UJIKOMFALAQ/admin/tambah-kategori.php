<?php
session_start(); // // mulai session → dipakai buat nyimpen data sementara (misalnya login, pesan notif, dll)

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    // !isset($_SESSION['role']) = cek apakah session 'role' BELUM ada (user belum login)
    // $_SESSION['role'] != 'admin' = cek apakah user bukan admin
    // tanda || = ATAU (jadi kalau salah satu kondisi benar, maka dijalankan)

    header("Location: ../login.php");
    // kalau bukan admin / belum login → langsung diarahkan ke halaman login

    exit;
    // menghentikan script supaya tidak lanjut menjalankan code di bawahnya
}

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // bikin koneksi ke database MySQL


if (isset($_POST['simpan'])) {  // // cek apakah tombol "simpan" ditekan (form sudah disubmit)

    $ket_kategori = $_POST['ket_kategori']; // // ambil input dari form (nama kategori yang diketik user/admin)

    mysqli_query($koneksi, "
        INSERT INTO kategori ( ket_kategori)
        VALUES ('$ket_kategori')
    "); 
    // // perintah SQL untuk menambahkan data ke tabel "kategori"
    // // INSERT INTO = masukkan data baru
    // // ket_kategori = nama kolom di database
    // // VALUES = isi data yang dimasukkan dari input user

    header("Location: data-kategori.php");  // // setelah berhasil tambah data → langsung pindah ke halaman kategori.php

}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8"> 

    <title>Tambah Kategori</title> <!-- // judul halaman (muncul di tab browser) -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font yang dipakai di halaman */
            display: flex; /* // pakai flexbox supaya gampang center */
            justify-content: center; /* // posisi horizontal di tengah */
            align-items: center; /* // posisi vertikal di tengah */
            height: 100vh; /* // tinggi full layar */
            margin: 0; /* // hilangin jarak default */
            background-color: rgb(255, 55, 82); /* // warna background merah */
        }

        .box{
            background-color: white; /* // warna kotak */
            padding: 25px; /* // jarak isi ke tepi */
            width: 250px; /* // lebar box */
            border-radius: 15px; /* // sudut membulat */
            border: 1px solid black; /* // garis pinggir */
            text-align: center; /* // teks di tengah */
        }

        input{
            width: 90%; /* // lebar input hampir penuh */
            height: 35px; /* // tinggi input */
            margin: 8px 0; /* // jarak atas bawah */
            padding: 0 10px; /* // jarak teks di dalam input */
            border-radius: 10px; /* // sudut bulat */
            border: 1px solid black; /* // garis input */
            font-family: 'Baloo 2'; /* // font input */
        }

        button{
            width: 100%; /* // tombol full lebar */
            height: 35px; /* // tinggi tombol */
            margin-top: 6px; /* // jarak atas */
            border-radius: 10px; /* // sudut bulat */
            border: 1px solid black; /* // garis tombol */
            background-color: rgb(255, 55, 82); /* // warna tombol */
            font-family: 'Baloo 2'; /* // font tombol */
            transition: all 0.2s ease; /* // animasi halus saat hover */
        }

        button:hover{
            background-color:  rgb(204, 30, 53); /* // warna berubah saat disentuh mouse */
            cursor: pointer; /* // cursor jadi tangan */
            color: white; /* // warna teks jadi putih */
            font-weight: bold; /* // teks jadi tebal */
            font-size: medium; /* // ukuran teks sedikit besar */
            transform: translateY(-3px); /* // tombol naik sedikit */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* // efek bayangan */
        }

    </style>
</head>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // ambil font Baloo 2 dari Google Fonts -->

<body>
<div class="box"> <!-- // container utama (kotak putih) -->
    <h2>TAMBAH KATEGORI</h2> <!-- // judul form -->

    <form method="POST"> <!-- // form kirim data ke file ini sendiri (POST lebih aman dari GET) -->
        
        <input 
        type="text"  
        name="ket_kategori"  
        placeholder="Nama Kategori" 
        required> <!-- // wajib diisi, kalau kosong gak bisa submit -->

        <button type="submit" name="simpan"><b>TAMBAH !</b></button> <!-- // tombol submit → kirim data ke PHP di atas -->

        <a href="admin.php"> <!-- // link balik ke halaman admin -->
            <button type="button"><b>KEMBALI</b></button> <!-- // type="button" supaya gak ikut submit form -->
        </a>
    </form>
</div>
</body>
</html>