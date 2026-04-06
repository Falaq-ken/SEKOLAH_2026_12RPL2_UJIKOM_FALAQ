<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); 
// // koneksi ke database MySQL
// // ini wajib biar PHP bisa komunikasi sama database (ambil/hapus data)

$id = $_GET['id']; 
// // ambil id dari URL (contoh: hapus-kategori.php?id=3)
// // id ini nunjukin data kategori mana yang mau dihapus

mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'"); 
// // perintah SQL untuk menghapus data dari database
// // DELETE FROM = hapus data
// // kategori = nama tabel
// // WHERE id_kategori='$id' = hapus data yang id nya sesuai
// // jadi cuma 1 data yang dihapus, bukan semua

header("Location: data-kategori.php"); 
// // setelah data dihapus → langsung pindah ke halaman kategori.php
// // ini biar user balik ke list data dan gak stay di halaman hapus
?>