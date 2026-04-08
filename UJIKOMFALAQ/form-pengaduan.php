<?php
session_start(); // // mulai session → supaya bisa akses data user yang sudah login (misalnya NIS)

if (!isset($_SESSION['nis'])) { // // cek apakah NIS ada di session (user sudah login atau belum)
    header("Location: login.php"); // // kalau belum login → arahkan ke halaman login
    exit;  // // hentikan eksekusi script supaya gak lanjut
}

$nis = $_SESSION['nis']; // // ambil NIS dari session → identitas user yang login saat ini
$sql = "SELECT * FROM `kategori`"; // // query SQL untuk mengambil semua data dari tabel kategori
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database (host, user, password, nama database)
$query = mysqli_query($koneksi, $sql); // // jalankan query → hasilnya dipakai untuk isi dropdown kategori
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <title>Input Aspirasi</title> <!-- // judul tab browser -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font utama halaman */
            display: flex; /* // gunakan flexbox untuk layout */
            justify-content: center; /* // posisi horizontal di tengah */
            align-items: center; /* // posisi vertical di tengah */
            margin: 0; /* // hapus margin default browser */
            height: 100vh; /* // tinggi full layar */
            background-color: rgb(255, 55, 82); /* // warna background */
            text-align: center; /* // teks rata tengah */
        }

        .box{
            background-color: white; /* // warna background box form */
            padding: 25px; /* // jarak dalam box */
            border: 1px solid black; /* // garis tepi box */
            border-radius: 15px; /* // sudut melengkung */
            width: 260px; /* // lebar box */
            transition: all 0.2s ease; /* // animasi halus saat hover */
        }

        .box:hover{
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // efek bayangan saat hover */
            transform: translateY(-3px); /* // box naik sedikit */
        }

        input{
            margin-top: 7px; /* // jarak atas input */
            margin-bottom: 7px; /* // jarak bawah input */
            width: 100%; /* // lebar full */
            height: 35px; /* // tinggi input */
            padding: 0 12px; /* // jarak dalam kiri kanan */
            font-family: 'Baloo 2'; /* // font input */
            border-radius: 10px; /* // sudut melengkung */
            border: 1px solid black; /* // garis tepi */
            font-size: 14px; /* // ukuran teks */
            box-sizing: border-box; /* // ukuran tidak bertambah karena padding */
        }

        select{
            margin-top: 7px; /* // jarak atas dropdown */
            margin-bottom: 7px; /* // jarak bawah dropdown */
            width: 100%; /* // lebar full */
            height: 35px; /* // tinggi dropdown */
            padding: 0 12px; /* // jarak dalam */
            font-family: 'Baloo 2'; /* // font dropdown */
            border-radius: 10px; /* // sudut melengkung */
            border: 1px solid black; /* // garis tepi */
            font-size: 14px; /* // ukuran teks */
            box-sizing: border-box; /* // ukuran tetap */
        }
        
        textarea {
            margin-top: 7px; /* // jarak atas textarea */
            margin-bottom: 7px; /* // jarak bawah textarea */
            width: 100%; /* // lebar full */
            height: 80px; /* // tinggi textarea lebih besar */
            padding: 0 12px; /* // jarak dalam */
            font-family: 'Baloo 2'; /* // font textarea */
            border-radius: 10px; /* // sudut melengkung */
            border: 1px solid black; /* // garis tepi */
            font-size: 14px; /* // ukuran teks */
            box-sizing: border-box; /* // ukuran stabil */
        }
            
        button{
            background-color: rgb(255, 55, 82); /* // warna tombol */
            border: 1px solid black; /* // garis tepi tombol */
            border-radius: 10px; /* // sudut melengkung */
            font-family: 'Baloo 2'; /* // font tombol */
            width: 100%; /* // lebar full */
            height: 35px; /* // tinggi tombol */
            margin-top: 5px; /* // jarak atas tombol */
            transition: all 0.2s ease; /* // animasi hover */
        }

        button:hover{
            background-color: rgb(204, 30, 53); /* // warna berubah saat hover */
            color: white; /* // teks jadi putih */
            font-weight: bold; /* // teks jadi tebal */
            font-size: 16px; /* // teks membesar */
            transform: translateY(-3px); /* // tombol naik */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // efek bayangan */
            cursor: pointer; /* // cursor jadi tangan */
        }

    </style>
</head>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // import font dari Google Fonts -->

<body>

<div class="box"> <!-- // container utama form -->
    <form action="proses-pengaduan.php" method="POST"> <!-- // form untuk kirim data ke file proses-pengaduan.php -->

        <h2>INPUT ASPIRASI</h2> <!-- // judul form -->

        <?php include "pesan.php"; ?> <!-- // menampilkan pesan dari session (misalnya sukses/gagal) -->

        <input type="text" name="nis" value="<?= $nis ?>" readonly required>
        <!-- // input NIS otomatis dari session -->
        <!-- // readonly = tidak bisa diubah user -->
        <!-- // required = wajib diisi -->

       <select id="kategori" name="kategori" required> <!-- tempat dropdown kategori -->
            <!-- id="kategori" buat identitas element (bisa dipakai JS/CSS)
                name="kategori" penting buat dikirim ke PHP ($_POST['kategori'])
                required = wajib dipilih sebelum form bisa disubmit -->

            <option value="" selected disabled hidden>Pilih Kategori</option>
            <!-- option ini jadi placeholder:
                value="" = nilai kosong
                selected = default yang tampil pertama
                disabled = gak bisa dipilih lagi
                hidden = disembunyiin dari dropdown list -->

            <?php while($data = mysqli_fetch_array($query)){ ?>   
                <!-- while = looping data dari database nampilin semua kategori dari database ke dropdown (tabel kategori)
                    mysqli_fetch_array = ambil 1 baris data setiap loop -->

                <option value="<?= $data['id_kategori'] ?>">
                    <!-- value diisi id_kategori (ini yang dikirim ke database sebagai foreign key) -->

                    <?= $data['ket_kategori'] ?>
                    <!-- teks yang ditampilkan ke user (nama kategori) -->
                </option>

            <?php } ?>
            <!-- penutup loop while -->

        </select>

        <input 
        type="text" 
        name="lokasi" 
        placeholder="Lokasi" 
        required> 
        <!-- // input lokasi kejadian -->

        <input 
        type="date" 
        name="tanggal" 
        placeholder="Tanggal" 
        required> 
        <!-- // input tanggal -->

        <textarea 
        name="keterangan" 
        placeholder="Keterangan" 
        required></textarea> 
        <!-- // input isi/keterangan pengaduan -->

        <button type="submit"><b>KIRIM !</b></button> <!-- // tombol untuk submit form -->

        <a href="siswa.php">
            <button type="button"><b>KEMBALI</b></button> <!-- // tombol kembali (tidak submit form) -->
        </a>
    </form>
</div>
</body>
</html>