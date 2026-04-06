<?php
session_start(); // // mulai session → dipakai buat nyimpen data sementara (misal login atau pesan)

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database MySQL (server, user, password, nama database)

$query = mysqli_query($koneksi, "
    SELECT * FROM user
    WHERE role = 'siswa'
"); 
// // ambil semua data dari tabel user
// // tapi cuma yang role nya = siswa (jadi admin gak ikut keambil)
?>

<!DOCTYPE html> 
<html lang="id"> 
<head>
    <meta charset="UTF-8">
    <title>Data Akun Siswa</title> <!-- // judul di tab browser -->

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- // ambil font dari Google Fonts -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // pakai font Baloo */
            margin: 0; /* // hilangin jarak luar default */
            padding: 30px; /* // jarak dalam body */
            background-color: white; /* // warna background */
            text-align: center; /* // semua teks rata tengah */
        }

        h2{
            color: black; /* // warna teks */
            margin-bottom: 20px; /* // jarak bawah */
        }

        .box{
            background-color: white; /* // warna kotak */
            padding: 20px; /* // jarak isi dalam box */
            border-radius: 15px; /* // sudut melengkung */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // bayangan */
            overflow-x: auto; /* // kalau tabel kepanjangan bisa scroll */
            width: 90%; /* // lebar box */
            margin: auto; /* // biar posisi di tengah */
        }

        table{
            width: 100%; /* // tabel full lebar */
            border-collapse: collapse; /* // gabung garis tabel */
            font-size: 14px; /* // ukuran teks */
        }

        th, td{
            border: 1px solid black; /* // garis tabel */
            padding: 8px; /* // jarak isi */
            text-align: center; /* // teks rata tengah */
        }

        th{
            background-color: rgb(255, 55, 82); /* // warna header */
            color: white; /* // warna teks header */
        }

        button{
            border: 1px solid black; /* // garis tombol */
            background-color: rgb(255, 55, 82); /* // warna tombol */
            color: black; /* // warna teks */
            border-radius: 10px; /* // sudut tombol */
            padding: 6px 12px; /* // ukuran dalam tombol */
            font-family: 'Baloo 2'; /* // font tombol */
            transition: all 0.2s ease; /* // animasi halus */
        }

        button:hover{
            background-color: rgb(204, 30, 53); /* // warna saat hover */
            color: white; /* // teks jadi putih */
            font-weight: bold; /* // teks tebal */
            transform: translateY(-2px); /* // tombol naik dikit */
            box-shadow: 0 6px 12px rgba(0,0,0,0.3); /* // bayangan */
            cursor: pointer; /* // cursor jadi tangan */
        }

        .kembali{
            margin-top: 20px; /* // jarak atas */
        }
    </style>
</head>

<body>

<h2>DATA AKUN SISWA</h2> <!-- // judul halaman -->

<div class="box"> <!-- // kotak pembungkus tabel -->
    <table>
        <tr>
            <th>No</th> <!-- // nomor -->
            <th>ID</th> <!-- // id user -->
            <th>Username</th> <!-- // nama -->
            <th>Password</th> <!-- // password -->
            <th>NIS</th> <!-- // nomor siswa -->
            <th>Kelas</th> <!-- // kelas -->
            <th>Role</th> <!-- // role (siswa) -->
            <th>Aksi</th> <!-- // tombol aksi -->
        </tr>

        <?php
        $no = 1; // // nomor awal (buat urutan tabel mulai dair 1)

        while ($data = mysqli_fetch_assoc($query)) { 
        // // looping (perulangan) untuk mengambil data satu per satu dari hasil query
        // // mysqli_fetch_assoc akan mengambil 1 baris data dari database dalam bentuk array
        // // selama masih ada data, perulangan akan terus berjalan (true)
        // // setiap perulangan, variabel $data berisi 1 baris data

        ?>
        <tr>
            <td><?= $no++ ?></td> <!-- // tampil nomor, lalu otomatis tambah 1 -->
            <td><?= $data['id'] ?></td> <!-- // tampil id user -->
            <td><?= $data['username'] ?></td> <!-- // tampil username -->
            <td><?= $data['password'] ?></td> <!-- // tampil password -->
            <td><?= $data['nis'] ?></td> <!-- // tampil NIS -->
            <td><?= $data['kelas'] ?></td> <!-- // tampil kelas -->
            <td><?= $data['role'] ?></td> <!-- // tampil role -->

            <td class="aksi">
                <a href="edit-siswa.php?id=<?= $data['id'] ?>"> <!-- // kirim id ke halaman edit -->
                    <button><b>EDIT</b></button>
                </a>

               <a href="hapus-siswa.php?id=<?= $data['id'] ?>" 
                onclick="return confirm('yakin pengen hapus?')">
                <!-- // saat link diklik → jalankan JavaScript confirm() -->
                <!-- // confirm() = munculin popup (OK / Cancel) -->
                <!-- // return itu penting: -->
                <!-- // kalau user klik OK → return true → lanjut ke link (data jadi dihapus) -->
                <!-- // kalau user klik Cancel → return false → batal (gak jadi pindah halaman) -->

                    <button><b>HAPUS !</b></button>
                    <!-- // ini cuma tampilan tombol biar keliatan bagus -->
                    <!-- // sebenarnya yang jalan itu tag <a> di atas, bukan button ini -->
                </a>
                </a>
            </td>
        </tr>
        <?php }  // // penutup looping while ?>
    </table>
</div>

<div class="kembali">
    <a href="admin.php"> <!-- // balik ke halaman admin -->
        <button><b>KEMBALI</b></button>
    </a>
</div>
</body>
</html>