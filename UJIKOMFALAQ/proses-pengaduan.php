<?php
session_start(); // // mulai session → supaya bisa simpan dan ambil data sementara (misalnya pesan sukses)


// ambil data yang dikirim dari form
$nis        = $_POST['nis'];        // // ambil data NIS dari form (identitas user)
$kategori   = $_POST['kategori'];   // // ambil kategori yang dipilih user
$lokasi     = $_POST['lokasi'];     // // ambil lokasi kejadian dari form
$keterangan = $_POST['keterangan']; // // ambil isi/keterangan pengaduan dari form


// koneksi ke database
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); 
// // koneksi ke database MySQL (host: localhost, user: root, password kosong, nama DB)


// masukin data ke tabel input_aspirasi
$query = mysqli_query($koneksi, "
    INSERT INTO input_aspirasi 
    (id_pelapor, nis, id_kategori, tanggal, lokasi, ket, status, feedback)
    VALUES 
    (NULL, '$nis', '$kategori', CURRENT_TIMESTAMP, '$lokasi', '$keterangan', 'menunggu', NULL)
"); 
// // menjalankan query INSERT untuk menyimpan data ke tabel input_aspirasi
// // id_pelapor = NULL (auto increment / tidak diisi manual)
// // nis = dari user
// // id_kategori = kategori yang dipilih

// // tanggal = CURRENT_TIMESTAMP = fungsi dari MySQL untuk mengisi tanggal + jam secara otomatis
// contoh hasil: 2026-04-07 19:30:15

// kelebihan pakai CURRENT_TIMESTAMP:
// - otomatis isi waktu saat data dikirim
// - lebih akurat (pakai waktu server, bukan dari user)
// - user tidak bisa manipulasi tanggal/jam

// jadi walaupun tidak ada input tanggal di form, kolom tanggal tetap terisi otomatis

// // lokasi = lokasi kejadian
// // ket = keterangan pengaduan
// // status = default "menunggu"
// // feedback = NULL (belum ada respon admin)


// cek apakah query berhasil
if ($query) {
    $_SESSION['pesan'] = "Pengaduan berhasil dikirim!"; 
    // // kalau berhasil → simpan pesan ke session (nanti ditampilkan di halaman form)
} 


header("Location: form-pengaduan.php"); // // redirect / pindah halaman kembali ke form-pengaduan.php setelah proses selesai

exit; // // menghentikan eksekusi script agar tidak lanjut ke bawah