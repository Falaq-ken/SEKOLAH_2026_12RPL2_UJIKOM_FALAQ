<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); 
// // koneksi ke database MySQL
// // ini wajib biar PHP bisa komunikasi sama database (ambil/hapus data)

$id = $_GET['id']; 
// // ambil id dari URL
// // contoh: hapus-siswa.php?id=5 → berarti $id = 5
// // id ini nunjukin data siswa mana yang mau dihapus

mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'"); 
// // perintah SQL untuk MENGHAPUS data
// // DELETE FROM user = hapus dari tabel user
// // WHERE id='$id' = hapus hanya data yang id nya sama
// // jadi cuma 1 data yang kehapus, bukan semua

header("Location: data-siswa.php"); 
// // setelah data dihapus → pindahkan ke halaman data siswa
// // biar user langsung lihat hasilnya

?>