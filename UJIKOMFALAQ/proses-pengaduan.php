<?php

$nis = $_POST['nis'];
$kategori = $_POST['kategori'];
$lokasi = $_POST['lokasi'];
$keterangan = $_POST['keterangan'];

echo "Nis : " . $nis . "<br>";
echo "Kategori : " . $kategori . "<br>";
echo "Lokasi : " . $lokasi . "<br>";
echo "Keterangan : " . $keterangan . "<br>";

echo "<h1>sudah dikirim</h1>";
"sudah dikirim";


$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

//insert = isi//
mysqli_query($koneksi, "INSERT INTO `tb_aspirasi`(`id_pelaporan`, `nis`, `id_kategori`, `lokasi`, `ket`, `status`, `feedback`) VALUES (NULL,'$nis','2','$lokasi','$keterangan','menunggu',NULL)");

