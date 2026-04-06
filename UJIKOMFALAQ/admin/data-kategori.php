<?php
session_start(); // // mulai session → buat nyimpen data sementara (misalnya login, pesan, dll)

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database MySQL
$query = mysqli_query($koneksi, "SELECT * FROM kategori"); // // ambil semua data dari tabel "kategori"

$no = 1; // // nomor urut awal (dipakai buat kolom "No" di tabel)
?>

<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8"> <!-- // supaya teks bisa tampil normal (tidak aneh) -->
    <title>Data Kategori</title> <!-- // judul halaman di tab browser -->

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- // ambil font Baloo 2 dari Google Fonts -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font utama */
            margin: 0; /* // hilangkan jarak default */
            padding: 30px; /* // jarak isi dari tepi */
            background-color: white; /* // warna background */
            text-align: center; /* // teks rata tengah */
        }

        h2{
            color: black; /* // warna judul */
            margin-bottom: 20px; /* // jarak bawah */
        }

        .box{
            background-color: white; /* // warna kotak */
            padding: 20px; /* // jarak isi */
            border-radius: 15px; /* // sudut membulat */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // efek bayangan */
            overflow-x: auto; /* // kalau tabel kepanjangan bisa di scroll */
            width: 60%; /* // lebar box */
            margin: auto; /* // posisi di tengah */
        }

        table{
            width: 100%; /* // tabel full lebar box */
            border-collapse: collapse; /* // gabung garis biar rapi */
            font-size: 14px; /* // ukuran teks */
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
            border: 1px solid black; /* // garis tombol */
            background-color: rgb(255, 55, 82); /* // warna tombol */
            color: black; /* // warna teks */
            border-radius: 10px; /* // sudut bulat */
            padding: 6px 14px; /* // ukuran tombol */
            font-family: 'Baloo 2'; /* // font tombol */
            transition: all 0.2s ease; /* // animasi halus */
        }

        button:hover{
            background-color: rgb(204, 30, 53); /* // warna saat hover */
            color: white; /* // teks jadi putih */
            font-weight: bold; /* // teks tebal */
            transform: translateY(-2px); /* // tombol naik sedikit */
            box-shadow: 0 6px 12px rgba(0,0,0,0.3); /* // bayangan */
            cursor: pointer; /* // cursor jadi tangan */
        }

        .kembali{
            margin-top: 20px; /* // jarak atas tombol kembali */
        }
    </style>
</head>

<body>

<h2>DATA KATEGORI</h2> <!-- // judul halaman -->

<div class="box"> <!-- // container tabel -->
    <table>
        <tr>
            <th>No</th> <!-- // nomor urut -->
            <th>ID Kategori</th> <!-- // id kategori dari database -->
            <th>Keterangan Kategori</th> <!-- // nama kategori -->
            <th>Aksi</th> <!-- // tombol edit & hapus -->
        </tr>

        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
        <!-- // // looping (perulangan) untuk mengambil data satu per satu dari hasil query -->
        <!-- // // mysqli_fetch_assoc akan mengambil 1 baris data dari database dalam bentuk array -->
        <!-- // // selama masih ada data, perulangan akan terus berjalan (true) -->
        <!-- // // setiap perulangan, variabel $data berisi 1 baris data -->

        <tr>
            <td><?= $no++ ?></td> 
            <!-- // tampil nomor urut, lalu otomatis +1 tiap baris -->

            <td><?= $data['id_kategori'] ?></td> 
            <!-- // tampil id kategori -->

            <td><?= $data['ket_kategori'] ?></td> 
            <!-- // tampil nama/keterangan kategori -->

            <td class="aksi">

                <a href="edit-kategori.php?id=<?= $data['id_kategori'] ?>">
                <!-- // link ke halaman edit
                     // kirim id kategori lewat URL (contoh: edit-kategori.php?id=3) -->

                    <button><b>EDIT</b></button>
                    <!-- // tombol edit -->
                </a>

                <a href="hapus-kategori.php?id=<?= $data['id_kategori'] ?>"
                   onclick="return confirm('yakin pengen hapus?')">
                <!-- // link hapus data
                     // kirim id kategori ke file hapus
                     // onclick confirm = munculin popup konfirmasi
                     // kalau klik OK → lanjut hapus
                     // kalau klik Cancel → batal -->

                    <button><b>HAPUS !</b></button>
                    <!-- // tombol hapus -->
                </a>

        </tr>
        <?php } ?> <!-- // penutup looping while -->
    </table>
</div>

<div class="kembali">
    <a href="admin.php"> <!-- // link kembali ke halaman admin -->
        <button><b>KEMBALI</b></button>
    </a>
</div>
</body>
</html>