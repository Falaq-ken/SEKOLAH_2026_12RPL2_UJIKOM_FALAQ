<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "
    SELECT * FROM user 
    WHERE username='$username' AND password='$password'
");

$data = mysqli_fetch_assoc($query);

if ($data) {
    // SESSION WAJIB
    $_SESSION['id']       = $data['id'];
    $_SESSION['role']     = $data['role'];
    $_SESSION['username'] = $data['username'];

    if ($data['role'] == 'admin') {
        header("Location: admin/admin.php");
    } 
    else if ($data['role'] == 'siswa') {
        header("Location: siswa.php");
    }
} else {
    echo "username atau password salah.";
    echo "<br><a href='login.php'>Kembali</a>";
}
