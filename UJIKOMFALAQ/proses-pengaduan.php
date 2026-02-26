<?php
session_start();

// ambil data yang dikirim dari form
$nis        = $_POST['nis'];        
$kategori   = $_POST['kategori'];  
$tanggal    = $_POST['tanggal']; 
$lokasi     = $_POST['lokasi'];
$keterangan = $_POST['keterangan']; 

// koneksi ke database
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// masukin data ke tabel input_aspirasi
$query = mysqli_query($koneksi, "
    INSERT INTO input_aspirasi 
    (id_pelapor, nis, id_kategori, tanggal, lokasi, ket, status, feedback)
    VALUES 
    (NULL, '$nis', '$kategori', CURRENT_TIMESTAMP, '$lokasi', '$keterangan', 'menunggu', NULL)
");

if ($query) {
    $_SESSION['pesan'] = "Pengaduan berhasil dikirim!";
} else {
    $_SESSION['pesan'] = "Pengaduan gagal dikirim!";
}

header("Location: form-pengaduan.php"); 
exit;