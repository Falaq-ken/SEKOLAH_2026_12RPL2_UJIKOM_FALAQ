<?php

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$nis   = $_POST['nis'];
$nama  = $_POST['nama'];
$kelas = $_POST['kelas'];
$password = $_POST['password']; // password biasa

mysqli_query($koneksi, "INSERT INTO user 
VALUES (NULL, '$nama', '$password', 'siswa', '$nis', '$kelas')");

echo "<h1>HOREE BERHASIL!</h1>";
