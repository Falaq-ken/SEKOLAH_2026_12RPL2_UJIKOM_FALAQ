<?php
session_start(); // // mulai session → dipakai buat nyimpen data sementara (contoh: pesan sukses/gagal)

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database MySQL
$nis   = $_POST['nis']; // // ambil data NIS dari form (input name="nis")
$nama  = $_POST['nama']; // // ambil data nama dari form (input name="nama")
$kelas = $_POST['kelas']; // // ambil data kelas dari form (input name="kelas")
$password = 'password'; // // set password default untuk siswa (jadi semua siswa awalnya password = "password")

$query = mysqli_query($koneksi, "INSERT INTO user 
VALUES (NULL, '$nama', '$password', 'siswa', '$nis', '$kelas')");
// // jalankan query SQL untuk MENAMBAHKAN data ke tabel user
// // NULL = id otomatis (auto increment)
// // '$nama' = isi kolom username/nama
// // '$password' = password default
// // 'siswa' = role user (biar sistem tau dia siswa)
// // '$nis' = NIS siswa
// // '$kelas' = kelas siswa

if ($query) {// // kalau query berhasil dijalankan (data masuk ke database)
    $_SESSION['pesan'] = "Siswa berhasil ditambahkan!";  // // simpan pesan sukses ke session → nanti ditampilkan di halaman form

} else {// // kalau query gagal (misal error database)
    $_SESSION['pesan'] = "Siswa gagal ditambahkan!";  // // simpan pesan gagal ke session
}
header("Location: form-siswa.php"); // // pindahkan (redirect) ke halaman form-siswa.php setelah proses selesai
exit; // // hentikan program supaya gak lanjut ke bawah lagi (biar aman)