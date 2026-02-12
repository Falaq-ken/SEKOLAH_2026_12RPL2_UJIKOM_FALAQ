<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$id = $_GET['id'];

// hapus data siswa
mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");

// balik ke halaman data siswa
header("Location: data-siswa.php");
?>
