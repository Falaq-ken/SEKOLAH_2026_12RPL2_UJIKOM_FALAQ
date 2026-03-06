<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");

header("Location: data-siswa.php");
?>
