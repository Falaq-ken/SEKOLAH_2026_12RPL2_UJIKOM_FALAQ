<?php
session_start();

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$nis   = $_POST['nis'];
$nama  = $_POST['nama'];
$kelas = $_POST['kelas'];
$password = 'password'; // default password

$query = mysqli_query($koneksi, "INSERT INTO user 
VALUES (NULL, '$nama', '$password', 'siswa', '$nis', '$kelas')");

if ($query) {
    $_SESSION['pesan'] = "Siswa berhasil ditambahkan!";
} else {
    $_SESSION['pesan'] = "Siswa gagal ditambahkan!";
}

header("Location: form-siswa.php"); 
exit;