<?php
session_start(); // // mulai session → wajib biar bisa cek user login dan ambil data NIS

if (!isset($_SESSION['nis'])) { // // cek apakah NIS ada di session (user sudah login atau belum)
    header("Location: login.php"); // // kalau belum login → arahkan ke halaman login
    exit;  // // hentikan eksekusi script supaya gak lanjut
}

$nis = $_SESSION['nis']; // // ambil NIS user yang login dari session
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database MySQL
$query = mysqli_query($koneksi, "
        SELECT input_aspirasi.*, kategori.ket_kategori, user.username
        FROM input_aspirasi
        LEFT JOIN kategori
        ON input_aspirasi.id_kategori = kategori.id_kategori
        LEFT JOIN user
        ON input_aspirasi.nis = user.nis 
        WHERE user.nis = '$nis'
    "); // // ambil semua data pengaduan milik user yg login
      // // LEFT JOIN kategori → supaya bisa ambil nama kategori
      // // LEFT JOIN user → supaya bisa ambil nama user
      // // WHERE user.nis → filter hanya data milik user itu saja
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Aspirasi</title> <!-- // judul tab browser -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font utama halaman */
            margin: 0; /* // hapus margin default browser */
            padding: 30px; /* // jarak isi halaman dari tepi */
            background-color:white; /* // warna background halaman */
            text-align: center; /* // teks rata tengah */
        }

        h2{
            color: black; /* // warna teks judul */
            margin-bottom: 20px; /* // jarak bawah judul */
        }

        .box{
            background-color: white; /* // warna kotak tabel */
            padding: 20px; /* // jarak dalam kotak */
            border-radius: 15px; /* // sudut kotak melengkung */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // bayangan kotak */
            overflow-x: auto; /* // scroll horizontal kalau tabel kepanjangan */
        }

        table{
            width: 100%; /* // tabel full lebar box */
            border-collapse: collapse; /* // gabungkan border tabel */
            font-size: 14px; /* // ukuran font isi tabel */
        }

        th, td{
            border: 1px solid black; /* // garis tepi sel tabel */
            padding: 8px; /* // jarak isi sel dengan garis */
            text-align: center; /* // isi sel rata tengah */
        }

        th{
            background-color: rgb(255, 55, 82); /* // warna header tabel */
            color: white; /* // warna teks header */
        }

        button{
            border: 1px solid black; /* // garis tepi tombol */
            background-color: rgb(255, 55, 82); /* // warna tombol */
            color: black; /* // warna teks tombol */
            border-radius: 10px; /* // sudut tombol melengkung */
            padding: 5px 10px; /* // jarak isi tombol */
            font-family: 'Baloo 2'; /* // font tombol */
            transition: all 0.2s ease; /* // animasi halus saat hover */
        }

        button:hover{
            background-color: rgb(204, 30, 53); /* // warna saat hover */
            color: white; /* // teks putih saat hover */
            font-weight: bold; /* // teks tebal */
            transform: translateY(-2px); /* // naik dikit saat hover */
            box-shadow: 0 6px 12px rgba(0,0,0,0.3); /* // bayangan saat hover */
            cursor: pointer; /* // kursor jadi tangan saat hover */
        }

        .kembali{
            margin-top: 20px; /* // jarak tombol kembali dari tabel */
        }
    </style>
</head>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // ambil font Baloo 2 dari Google Fonts -->

<body>

<h2>DATA ASPIRASI</h2> <!-- // judul halaman -->

<div class="box"> <!-- // kotak untuk tabel -->
    <table>
        <tr>
            <th>No</th>  <!-- // nomor urut -->
            <th>Nama</th> <!-- // nama user -->
            <th>NIS</th> <!-- // NIS user -->
            <th>tanggal</th> <!-- // tanggal pengaduan -->
            <th>Lokasi</th> <!-- // lokasi kejadian -->
            <th>Kategori</th> <!-- // kategori pengaduan -->
            <th>Keterangan</th> <!-- // isi pengaduan -->
            <th>Status</th> <!-- // status pengaduan -->
            <th>Aksi</th> <!-- // tombol detail -->
        </tr>

<?php
     $no = 1; // // membuat nomor urut awal (dimulai dari 1)

     while ($data = mysqli_fetch_assoc($query)) { 
     // // looping (perulangan) untuk mengambil data satu per satu dari hasil query
     // // mysqli_fetch_assoc akan mengambil 1 baris data dari database dalam bentuk array
     // // selama masih ada data, perulangan akan terus berjalan (true)
     // // setiap perulangan, variabel $data berisi 1 baris data

    ?>
        <tr>
            <td><?= $no++ ?></td>  <!-- // tampil nomor urut otomatis bertambah -->
            <td><?= $data['username'] ?></td>  <!-- // tampil nama user dari tabel user -->
            <td><?= $data['nis'] ?></td>  <!-- // tampil NIS -->
            <td><?= date('d M Y', strtotime($data['tanggal'])) ?></td>  <!-- // format tanggal ke d M Y -->
            <td><?= $data['lokasi'] ?></td> <!-- // lokasi kejadian -->
            <td><?= $data['ket_kategori'] ?></td> <!-- // kategori pengaduan -->
            <td><?= $data['ket'] ?></td>  <!-- // isi pengaduan -->
            <td><?= $data['status'] ?></td> <!-- // status pengaduan -->
            <td>
                <a href="detail-pengaduan.php?id=<?= $data['id_pelapor'] ?>"> <!-- // link ke detail pengaduan -->
                    <button><b>DETAIL</b></button> <!-- // tombol untuk lihat detail -->
                </a>
            </td>
        </tr>
        <?php } ?> <!-- // penutup looping while -->
    </table>
</div>

<div class="kembali">
    <a href="siswa.php">
        <button><b>KEMBALI</b></button> <!-- // tombol untuk kembali ke halaman utama siswa -->
    </a>
</div>

</body>
</html>