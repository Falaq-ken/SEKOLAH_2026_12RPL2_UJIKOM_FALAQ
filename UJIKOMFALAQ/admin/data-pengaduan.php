<?php
session_start(); // // mulai session → biar bisa pakai data login (kalau nanti dibutuhkan)

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    // !isset($_SESSION['role']) = cek apakah session 'role' BELUM ada (user belum login)
    // $_SESSION['role'] != 'admin' = cek apakah user bukan admin
    // tanda || = ATAU (jadi kalau salah satu kondisi benar, maka dijalankan)

    header("Location: ../login.php");
    // kalau bukan admin / belum login → langsung diarahkan ke halaman login

    exit;
    // menghentikan script supaya tidak lanjut menjalankan code di bawahnya
}

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); 
// // koneksi ke database MySQL

$query = mysqli_query($koneksi, "
    SELECT input_aspirasi.*, kategori.ket_kategori, user.username
    FROM input_aspirasi
    LEFT JOIN kategori
    ON input_aspirasi.id_kategori = kategori.id_kategori
    LEFT JOIN user
    ON input_aspirasi.nis = user.nis
");

// SELECT = memilih data yang mau diambil dari database
// input_aspirasi.* = ambil semua kolom dari tabel input_aspirasi (data utama)
// kategori.ket_kategori = ambil nama kategori dari tabel kategori
// user.username = ambil username dari tabel user

// FROM input_aspirasi = tabel utama yang berisi semua data aspirasi/pengaduan

// LEFT JOIN kategori = menggabungkan tabel kategori ke input_aspirasi
// ON input_aspirasi.id_kategori = kategori.id_kategori
// artinya mencocokkan id_kategori supaya bisa menampilkan nama kategori (bukan cuma id)

// LEFT JOIN user = menggabungkan tabel user ke input_aspirasi
// ON input_aspirasi.nis = user.nis
// artinya mencocokkan nis supaya bisa menampilkan username

// TIDAK ADA WHERE = artinya semua data diambil (tidak difilter)
// biasanya ini dipakai untuk halaman admin (lihat semua pengaduan)

// tujuan keseluruhan:
// ambil semua data aspirasi + nama kategori + username dari semua user

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Aspirasi</title> <!-- // judul tab -->

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- // ambil font dari Google -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font utama */
            margin: 0; /* // reset margin */
            padding: 30px; /* // jarak isi */
            background-color: white; /* // warna background */
            text-align: center; /* // teks tengah */
        }

        h2{
            color: black; /* // warna judul */
            margin-bottom: 20px; /* // jarak bawah */
        }

        .box{
            background-color: white; /* // box utama */
            padding: 20px; /* // jarak dalam */
            border-radius: 15px; /* // sudut melengkung */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // bayangan */
            overflow-x: auto; /* // scroll kalau tabel kepanjangan */
        }

        th, td{
            border: 1px solid black; /* // garis tabel */
            padding: 8px; /* // jarak isi */
            text-align: center; /* // teks rata tengah */
        }

        th{
            background-color: rgb(255, 55, 82); /* // warna header tabel */
            color: white; /* // warna teks header */
        }

        button{
            border: 1px solid black; /* // border tombol */
            background-color: rgb(255, 55, 82); /* // warna tombol */
            color: black; /* // warna teks */
            border-radius: 10px; /* // sudut */
            padding: 5px 10px; /* // ukuran tombol */
            font-family: 'Baloo 2'; /* // font */
            transition: all 0.2s ease; /* // animasi */
        }

        button:hover{
            background-color: rgb(204, 30, 53); /* // warna saat hover */
            color: white; /* // teks putih */
            font-weight: bold; /* // teks tebal */
            transform: translateY(-2px); /* // efek naik */
            box-shadow: 0 6px 12px rgba(0,0,0,0.3); /* // bayangan */
            cursor: pointer; /* // kursor tangan */
        }
    
        .kembali{
            margin-top: 20px; /* // jarak atas tombol kembali */
        }

    </style>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- // import jQuery (library JS biar lebih gampang manipulasi DOM) -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<!-- // CSS untuk DataTables (biar tabel jadi keren) -->

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<!-- // JS DataTables (fitur search, pagination, dll) -->
</head>

<body>

<h2>LIST ASPIRASI</h2> <!-- // judul halaman -->

<div class="box">
<table id="datatable" cellpadding="10" cellspacing="0">
<!-- // id="datatable" → dipakai buat DataTables -->
<!-- // cellpadding & cellspacing → jarak tabel -->

    <thead>
        <tr>
            <th>No</th> <!-- // nomor -->
            <th>Nama</th> <!-- // nama user -->
            <th>NIS</th> <!-- // NIS -->
            <th>Lokasi</th> <!-- // lokasi -->
            <th>Tanggal</th> <!-- // tanggal -->
            <th>Kategori</th> <!-- // kategori -->
            <th>Keterangan</th> <!-- // isi pengaduan -->
            <th>Status</th> <!-- // status -->
            <th>Aksi</th> <!-- // tombol -->
        </tr>
    </thead>

    <tbody>
    <?php $no = 1; ?> <!-- // mulai nomor dari 1 -->

    <?php 
    
    while ($data = mysqli_fetch_assoc($query)) { ?> 
    <!-- // // looping (perulangan) untuk mengambil data satu per satu dari hasil query -->
    <!-- // // mysqli_fetch_assoc akan mengambil 1 baris data dari database dalam bentuk array -->
    <!-- // // selama masih ada data, perulangan akan terus berjalan (true) -->
    <!-- // // setiap perulangan, variabel $data berisi 1 baris data -->

        <tr>
            <td><?= $no++ ?></td> <!-- // tampil nomor urut -->
            <td><?= $data['username'] ?></td> <!-- // tampil nama -->
            <td><?= $data['nis'] ?></td> <!-- // tampil NIS -->
            <td><?= $data['lokasi'] ?></td> <!-- // tampil lokasi -->
            <td><?= date('d M Y', strtotime($data['tanggal'])) ?></td> 
            <!-- // format tanggal jadi lebih rapi -->

            <td><?= $data['ket_kategori'] ?></td> <!-- // kategori -->
            <td><?= $data['ket'] ?></td> <!-- // keterangan -->
            <td><?= $data['status'] ?></td> <!-- // status -->

            <td>
                <a href="detail-pengaduan.php?id=<?= $data['id_pelapor'] ?>">
                    <!-- // kirim id ke halaman detail -->
                    <button><b>DETAIL</b></button>
                </a>
            </td>
        </tr>

    <?php } ?>  <!-- // penutup looping while -->

    </tbody>
</table>
</div>

<div class="kembali">
    <a href="admin.php">
        <button><b>KEMBALI</b></button> <!-- // balik ke halaman admin -->
    </a>
</div>

<script>
$(document).ready(function() {// // fungsi ini jalan setelah halaman selesai dimuat

    $('#datatable').DataTable({ // // aktifin DataTables di tabel dengan id "datatable"

        "language": {  // // ubah bahasa ke Indonesia

            "search": "Cari:", // // tulisan search
            "lengthMenu": "Tampilkan _MENU_ data", // // jumlah data
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data", // // info bawah

            "paginate":{
                "next": "Selanjutnya", // // tombol next
                "previous": "Sebelumnya" // // tombol previous
            }
        }
    });
});
</script>

</body>
</html>