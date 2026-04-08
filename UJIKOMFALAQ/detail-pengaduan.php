<?php
session_start(); // // mulai session, supaya bisa akses data user yang login

if (!isset($_SESSION['nis'])) { // // cek apakah NIS ada di session (user sudah login atau belum)
    header("Location: login.php"); // // kalau belum login → arahkan ke halaman login
    exit;  // // hentikan eksekusi script supaya gak lanjut
}

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database MySQL (host, user, password, nama database)
$id = $_GET['id']; // // ambil parameter id dari URL (contoh: detail.php?id=1)
$query = mysqli_query($koneksi, "
    SELECT input_aspirasi.*, kategori.ket_kategori
    FROM input_aspirasi
    LEFT JOIN kategori 
    ON input_aspirasi.id_kategori = kategori.id_kategori
    WHERE input_aspirasi.id_pelapor = '$id'
");

// SELECT = memilih data yang mau diambil dari database
// input_aspirasi.* = ambil semua kolom dari tabel input_aspirasi (data utama)
// kategori.ket_kategori = ambil nama kategori dari tabel kategori

// FROM input_aspirasi = tabel utama yang berisi data aspirasi/pengaduan

// LEFT JOIN kategori = menggabungkan tabel kategori ke input_aspirasi
// ON input_aspirasi.id_kategori = kategori.id_kategori
// artinya mencocokkan id_kategori di kedua tabel
// supaya data aspirasi bisa ditampilkan dengan nama kategori (bukan cuma angka id)

// WHERE input_aspirasi.id_pelapor = '$id' = filter data
// hanya menampilkan data yang dibuat oleh pelapor tertentu (berdasarkan id_pelapor)

// tujuan keseluruhan:
// ambil semua data aspirasi milik user tertentu
// lalu tambahkan informasi nama kategori dari tabel kategori

$data = mysqli_fetch_assoc($query); // // mengubah hasil query menjadi array asosiatif (biar bisa dipanggil per kolom)
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Aspirasi</title> <!-- // judul tab browser -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // jenis font yang digunakan */
            margin: 0; /* // menghilangkan margin default */
            padding: 30px; /* // memberi jarak dalam halaman */
            background-color: white; /* // warna background */
            text-align: center; /* // semua teks dirata tengah */
        }

        h2{
            color: black; /* // warna teks judul */
            margin-bottom: 20px; /* // jarak bawah judul */
        }

        .box{
            background-color: white; /* // warna background box */
            padding: 20px; /* // jarak dalam box */
            border-radius: 15px; /* // membuat sudut melengkung */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // efek bayangan */
            overflow-x: auto; /* // scroll horizontal jika tabel melebar */
            width: 30%; /* // lebar box */
            margin: auto; /* // posisi tengah */
        }

        table{
            width: 100%; /* // tabel memenuhi box */
            border-collapse: collapse; /* // menggabungkan border */
            font-size: 14px; /* // ukuran teks tabel */
        }

        th, td{
            border: 1px solid black; /* // garis tabel */
            padding: 10px; /* // jarak isi sel */
            text-align: left; /* // teks rata kiri */
        }

        th{
            background-color: rgb(255, 55, 82); /* // warna header tabel */
            color: white; /* // warna teks header */
            text-align: center; /* // header dirata tengah */
        }

        button{
            border: 1px solid black; /* // garis tombol */
            background-color: rgb(255, 55, 82); /* // warna tombol */
            color: black; /* // warna teks tombol */
            border-radius: 10px; /* // sudut tombol melengkung */
            padding: 7px 15px; /* // ukuran tombol */
            font-family: 'Baloo 2'; /* // font tombol */
            transition: all 0.2s ease; /* // animasi saat hover */
        }

        button:hover{
            background-color: rgb(204, 30, 53); /* // warna saat hover */
            color: white; /* // warna teks saat hover */
            font-weight: bold; /* // teks jadi tebal */
            transform: translateY(-2px); /* // tombol naik sedikit */
            box-shadow: 0 6px 12px rgba(0,0,0,0.3); /* // bayangan saat hover */
            cursor: pointer; /* // kursor berubah jadi tangan */
        }
        
        .kembali{
            margin-top: 20px; /* // jarak atas tombol kembali */
        }
    </style>
</head>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // import font dari Google Fonts -->

<body>

<h2>DETAIL ASPIRASI</h2> <!-- // judul halaman yang tampil -->

<div class="box">
    <table>
        <tr>
            <th>ID Aspirasi</th>
            <td><?= $data['id_pelapor']; ?></td> 
            <!-- // menampilkan id pengaduan -->
        </tr>
        <tr>
            <th>Kategori</th>
            <td><?= $data['ket_kategori']; ?></td> 
            <!-- // menampilkan kategori dari hasil join tabel -->
        </tr>
        <tr>
            <th>Lokasi</th>
            <td><?= $data['lokasi']; ?></td> 
            <!-- // menampilkan lokasi pengaduan -->
        </tr>
        <tr>
            <th>Tanggal</th>
            <td><?= $data['tanggal']; ?></td> 
            <!-- // menampilkan tanggal pengaduan -->
        </tr>
        <tr>
            <th>Keterangan</th>
            <td><?= $data['ket']; ?></td> 
            <!-- // menampilkan isi/keterangan aspirasi -->
        </tr>
        <tr>
            <th>Status</th>
            <td><?=$data['status']; ?></td> 
            <!-- // menampilkan status pengaduan -->
        </tr>
        <tr>
            <th>Feedback Admin</th>
            <td>
                <?= $data['feedback'] ? $data['feedback'] : '<i>Belum ada feedback dari admin</i>'; ?>
                <!-- // jika feedback ada → tampilkan
                     // jika kosong → tampilkan teks default (belum ada feedback dari admin) -->
            </td>   
        </tr>
    </table>
</div>

<div class="kembali">
    <a href="data-pengaduan.php">
        <button><b>KEMBALI</b></button> <!-- // tombol untuk kembali ke halaman data pengaduan -->
    </a>
</div>

</body>
</html>