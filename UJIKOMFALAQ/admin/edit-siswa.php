<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database MySQL (biar bisa ambil & ubah data)

$id = $_GET['id']; 
// // ambil id dari URL (contoh: edit-siswa.php?id=5)
// // id ini nunjukin data siswa mana yang mau diedit

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'"); // // ambil data siswa berdasarkan id tadi
$data = mysqli_fetch_assoc($query); // // ubah hasil query jadi array (biar bisa dipanggil pakai $data['nama'], dll)

if (isset($_POST['update'])) { // // cek apakah tombol UPDATE diklik (form dikirim)

    $username = $_POST['username'];  // // ambil input username dari form
    $password = $_POST['password'];  // // ambil input password dari form
    $nis = $_POST['nis'];  // // ambil input NIS dari form
    $kelas = $_POST['kelas'];  // // ambil input kelas dari form

    mysqli_query($koneksi, "
        UPDATE user SET
        username='$username',
        password='$password',
        nis='$nis',
        kelas='$kelas'
        WHERE id='$id'
    "); 
    // // update data di database berdasarkan id
    // // data lama akan diganti dengan input baru dari form

    header("Location: data-siswa.php");  // // setelah update → pindah ke halaman data siswa
}
?>

<!DOCTYPE html> 
<html lang="id"> 
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title> <!-- // judul halaman -->

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- // ambil font dari Google Fonts -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font */
            display: flex; /* // pakai flexbox */
            justify-content: center; /* // posisi horizontal tengah */
            align-items: center; /* // posisi vertical tengah */
            height: 100vh; /* // tinggi full layar */
            margin: 0; /* // hilangin margin default */
            background-color: rgb(255, 55, 82); /* // warna background */
        }

        .box{
            background-color: white; /* // warna box */
            padding: 25px; /* // jarak dalam */
            width: 260px; /* // lebar box */
            border-radius: 15px; /* // sudut melengkung */
            border: 1px solid black; /* // garis */
            text-align: center; /* // teks tengah */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // bayangan */
        }

        h2{
            margin-bottom: 15px; /* // jarak bawah */
        }

        label{
            font-size: 14px; /* // ukuran teks */
            font-weight: bold; /* // teks tebal */
            display: block; /* // biar turun ke bawah */
            text-align: left; /* // rata kiri */
            margin-top: 8px; /* // jarak atas */
        }

        input{
            width: 100%; /* // full lebar */
            height: 35px; /* // tinggi input */
            margin-top: 4px; /* // jarak atas */
            padding: 0 10px; /* // jarak dalam */
            border-radius: 10px; /* // sudut */
            border: 1px solid black; /* // garis */
            font-family: 'Baloo 2'; /* // font */
            box-sizing: border-box; /* // biar ukuran stabil */
        }

        button{
            width: 100%; /* // full lebar */
            height: 35px; /* // tinggi */
            margin-top: 8px; /* // jarak atas */
            border-radius: 10px; /* // sudut */
            border: 1px solid black; /* // garis */
            background-color: rgb(255, 55, 82); /* // warna */
            font-family: 'Baloo 2'; /* // font */
            cursor: pointer; /* // cursor tangan */
            transition: all 0.2s ease; /* // animasi */
        }

        button:hover{
             background-color:  rgb(204, 30, 53); /* // warna hover */
            cursor: pointer; /* // cursor tangan */
            color: white; /* // teks jadi putih */
            font-weight: bold; /* // tebal */
            font-size: medium; /* // agak gede */
            transform: translateY(-3px); /* // naik dikit */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* // bayangan */
        }
        
    </style>
</head>

<body>

<div class="box">
    <h2>EDIT DATA SISWA</h2> <!-- // judul -->

    <form method="post"> <!-- // form kirim data ke file yang sama -->

        <label>Username</label>
        <input 
        type="text" 
        name="username" 
        value="<?= $data['username'] ?>">
        <!-- // isi otomatis dari database (biar bisa diedit) -->

        <label>Password</label>
        <input 
        type="text" 
        name="password"
        value="<?= $data['password'] ?>">
        <!-- // tampil password lama -->

        <label>NIS</label>
        <input 
        type="text" 
        name="nis" 
        value="<?= $data['nis'] ?>">
        <!-- // tampil NIS lama -->

        <label>Kelas</label>
        <input 
        type="text" 
        name="kelas" 
        value="<?= $data['kelas'] ?>">
        <!-- // tampil kelas lama -->

        <button type="submit" name="update"><b>UPDATE !</b></button> <!-- // tombol untuk kirim perubahan -->

        <a href="data-siswa.php">
            <button type="button"><b>BATAL</b></button>
        </a> <!-- // tombol balik tanpa nyimpan -->
    </form>
</div>
</body>
</html>