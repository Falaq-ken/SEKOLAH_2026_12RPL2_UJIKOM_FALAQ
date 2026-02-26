<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$id = $_GET['id'];

// hapus data kategori
mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

// balik ke halaman data kategori
header("Location: kategori.php");
?>
