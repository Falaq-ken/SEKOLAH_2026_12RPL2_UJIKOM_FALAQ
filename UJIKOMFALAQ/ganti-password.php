<?php
session_start(); // // memulai session untuk mengakses data user yang login

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database MySQL 

if (!isset($_SESSION['id'])) { // // cek apakah user sudah login (session id ada atau tidak)
    header("Location: login.php"); // // jika belum login, arahkan ke halaman login
    exit;   // // hentikan script agar tidak lanjut jalan
}   

$id = $_SESSION['id']; // // ambil id user yang sedang login dari session

$pesan = ""; // // variabel untuk menampung pesan (error / sukses)

if (isset($_POST['ganti'])) {// // cek apakah tombol "ganti" ditekan (form disubmit)

    $password_lama = $_POST['password_lama']; // // ambil input password lama dari form
    $password_baru = $_POST['password_baru']; // // ambil input password baru dari form
    $query = mysqli_query($koneksi, "SELECT password FROM user WHERE id='$id'"); // // ambil password lama dari database berdasarkan id user
    $data  = mysqli_fetch_assoc($query); // // ubah hasil query menjadi array agar bisa diakses

    if ($password_lama != $data['password']) { // // cek apakah password lama yang diinput cocok dengan database
        $pesan = "Password lama salah!"; // // jika tidak cocok, tampilkan pesan error
    
    } else {
        mysqli_query($koneksi, "UPDATE user SET password='$password_baru' WHERE id='$id'"); // // jika cocok, update password di database menjadi password baru
        $pesan = "Password berhasil diganti!"; // // tampilkan pesan sukses
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ganti Password</title> <!-- // judul halaman di tab browser -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font utama */
            display: flex; /* // menggunakan flexbox */
            justify-content: center; /* // posisi horizontal ke tengah */
            align-items: center; /* // posisi vertikal ke tengah */
            margin: 0; /* // hilangkan margin default */
            height: 100vh; /* // tinggi full layar */
            background-color: rgb(255, 55, 82); /* // warna background */
            text-align: center; /* // teks rata tengah */
        }

        .box{
            background-color: white; /* // warna box */
            padding: 25px; /* // jarak dalam box */
            border: 1px solid black; /* // border box */
            border-radius: 15px; /* // sudut melengkung */
            width: 250px; /* // lebar box */
            transition: all 0.2s ease; /* // animasi */
        }

        .box:hover{
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // bayangan saat hover */
            transform: translateY(-3px); /* // box naik sedikit saat hover */
        }

        input{
            margin-top: 7px; /* // jarak atas input */
            margin-bottom: 7px; /* // jarak bawah input */
            width: 100%; /* // input full lebar */
            height: 35px; /* // tinggi input */
            padding: 0 12px; /* // jarak dalam kiri kanan */
            font-family: 'Baloo 2'; /* // font input */
            border-radius: 10px; /* // sudut input */
            border: 1px solid black; /* // border input */
            font-size: 14px; /* // ukuran teks */
            box-sizing: border-box; /* // agar padding tidak menambah ukuran */
        }

        button{
            background-color: rgb(255, 55, 82); /* // warna tombol */
            border: 1px solid black; /* // border tombol */
            border-radius: 10px; /* // sudut tombol */
            font-family: 'Baloo 2'; /* // font tombol */
            width: 100%; /* // tombol full lebar */
            height: 35px; /* // tinggi tombol */
            margin-top: 5px; /* // jarak atas tombol */
            transition: all 0.2s ease; /* // animasi hover */
        }

        button:hover{
            background-color: rgb(204, 30, 53); /* // warna saat hover */
            color: white; /* // warna teks saat hover */
            font-weight: bold; /* // teks jadi tebal */
            font-size: 16px; /* // ukuran teks membesar */
            transform: translateY(-3px); /* // tombol naik */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // bayangan */
            cursor: pointer; /* // cursor berubah jadi pointer */
        }
    </style>
</head>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // import font dari Google Fonts -->

<body>

<div class="box">
    <h2>GANTI PASSWORD</h2> <!-- // judul form -->

    <?php if ($pesan != "") { ?> <!-- // cek jika ada pesan (error / sukses) -->
        <p><?= $pesan ?></p>  <!-- // tampilkan pesan ke user -->
    <?php } ?>

    <form method="post"> <!-- // form dengan metode POST -->

        <input 
        type="password" 
        name="password_lama" 
        placeholder="Password Lama" 
        required>
        <!-- // input password lama -->

        <input 
        type="password" 
        name="password_baru" 
        placeholder="Password Baru" 
        required>
        <!-- // input password baru -->

        <button type="submit" name="ganti"><b>GANTI !</b></button> <!-- // tombol submit untuk mengganti password -->

    </form>

    <a href="siswa.php">
        <button><b>KEMBALI</b></button> <!-- // tombol untuk kembali ke halaman siswa -->
    </a>
</div>

</body>
</html>