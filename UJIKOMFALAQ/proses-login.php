<?php
session_start(); // // mulai session → biar bisa nyimpen data login (kayak username, role, dll)

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // buat koneksi ke database MySQL
$username = $_POST['username']; // // ambil data username dari form login (method POST)
$password = $_POST['password']; // // ambil data password dari form login

$query = mysqli_query($koneksi, "
    SELECT * FROM user 
    WHERE username='$username' 
    AND password='$password'
"); 
// // jalankan query SQL
// // fungsi: mencari data user di tabel "user"
// // kondisi: username DAN password harus cocok
// // kalau cocok → berarti login benar

$data = mysqli_fetch_assoc($query); 
// // ambil hasil query jadi array (1 baris data)
// // kalau data ketemu → berisi data user
// // kalau tidak → hasilnya NULL

if ($data) { 
// // cek apakah data ditemukan
// // kalau TRUE → login berhasil
// // kalau FALSE → login gagal

    // simpen data
    $_SESSION['nis'] = $data['nis'];  // // simpan NIS ke session → buat identitas siswa
    $_SESSION['role'] = $data['role']; // // simpan role user (admin / siswa) // // nanti dipakai buat menentukan halaman tujuan
    $_SESSION['username'] = $data['username']; // // simpan username ke session
    $_SESSION['id'] = $data['id'];  // // simpan id user → biasanya buat keperluan lain (misal update data)

    // cek rolenya apa
    if ($data['role'] == 'admin') {   // // kalau role user adalah admin
        header("Location: admin/admin.php"); // // arahkan (redirect) ke halaman admin
    } 
    else if ($data['role'] == 'siswa') {  // // kalau role user adalah siswa
        header("Location: siswa.php");   // // arahkan ke halaman siswa
    }

} else{ // // kalau data tidak ditemukan → login gagal

    $_SESSION['pesan'] = "Username atau Password salah!";  // // simpan pesan error ke session
    // // nanti ditampilkan di halaman login
    header("Location: login.php"); // // redirect balik ke halaman login
    exit;  // // hentikan program supaya tidak lanjut ke bawah
}