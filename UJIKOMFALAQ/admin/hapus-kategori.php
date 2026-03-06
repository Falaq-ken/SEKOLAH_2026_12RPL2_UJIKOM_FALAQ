<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

header("Location: kategori.php");
?>  
