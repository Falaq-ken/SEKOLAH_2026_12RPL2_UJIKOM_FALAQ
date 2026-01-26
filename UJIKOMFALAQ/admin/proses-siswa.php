<?php

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$password_hash = password_hash('password', PASSWORD_DEFAULT);

mysqli_query($koneksi, "INSERT INTO `user` VALUES (NULL,'$nama','$password_hash','siswa','$nis','$kelas')");

echo "<h1>HOREE BERHASILL !</h1>";