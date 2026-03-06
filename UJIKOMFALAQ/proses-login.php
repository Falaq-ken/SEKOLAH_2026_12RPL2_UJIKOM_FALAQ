<?php
session_start();

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "
    SELECT * FROM user 
    WHERE username='$username' 
    AND password='$password'
");

$data = mysqli_fetch_assoc($query);

if ($data) {

    // simpen data
    $_SESSION['nis']       = $data['nis']; 
    $_SESSION['role']     = $data['role'];    
    $_SESSION['username'] = $data['username']; 
    $_SESSION['id']       = $data['id'];

    // cek rolenya apa
    if ($data['role'] == 'admin') {
        // kalo admin, masuk ke halaman admin
        header("Location: admin/admin.php");
    } 
    else if ($data['role'] == 'siswa') {
        // kalo siswa, masuk ke halaman siswa
        header("Location: siswa.php");
    }
} else{
    $_SESSION['pesan'] = "Username atau Password salah!";
header("Location: login.php");
exit;
}