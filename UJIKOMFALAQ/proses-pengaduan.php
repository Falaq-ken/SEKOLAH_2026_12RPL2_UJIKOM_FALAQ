<?php
// ambil data yang dikirim dari form
$nis        = $_POST['nis'];        // NIS siswa
$kategori   = $_POST['kategori'];   // kategori aspirasi
$lokasi     = $_POST['lokasi'];     // lokasi kejadian
$keterangan = $_POST['keterangan']; // isi aspirasi

// nampilin data buat ngecek doang (testing)
echo "Nis : " . $nis . "<br>";
echo "Kategori : " . $kategori . "<br>";
echo "Lokasi : " . $lokasi . "<br>";
echo "Keterangan : " . $keterangan . "<br>";

// tanda kalau data udah kekirim
echo "<h1>sudah dikirim</h1>";

// koneksi ke database
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// masukin data ke tabel input_aspirasi
// id_pelapor auto (NULL)
// status diset "menunggu" karena belum dicek admin
mysqli_query($koneksi, "
    INSERT INTO input_aspirasi 
    (id_pelapor, nis, id_kategori, lokasi, ket, status, feedback)
    VALUES 
    (NULL, '$nis', '1', '$lokasi', '$keterangan', 'menunggu', NULL)
");
