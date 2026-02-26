<?php
// mulai session biar bisa nyimpen data login
session_start();

// koneksi ke database
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// ambil username & password dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// query buat ngecek data user di database
// nyocokin username & password
$query = mysqli_query($koneksi, "
    SELECT * FROM user 
    WHERE username='$username' AND password='$password'
");

// ambil hasil query
$data = mysqli_fetch_assoc($query);

// kalau data ketemu (login bener)
if ($data) {

    // simpen data penting ke session
    $_SESSION['nis']       = $data['nis']; 
    $_SESSION['role']     = $data['role'];    
    $_SESSION['username'] = $data['username']; 
    $_SESSION['id']       = $data['id'];

    // cek rolenya apa
    if ($data['role'] == 'admin') {
        // kalau admin, masuk ke halaman admin
        header("Location: admin/admin.php");
    } 
    else if ($data['role'] == 'siswa') {
        // kalau siswa, masuk ke halaman siswa
        header("Location: siswa.php");
    }
} else{
    $_SESSION['pesan'] = "Username atau Password salah!";
header("Location: login.php");
exit;
}
