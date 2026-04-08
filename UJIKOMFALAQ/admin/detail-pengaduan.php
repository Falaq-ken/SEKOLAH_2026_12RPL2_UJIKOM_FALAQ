<?php
session_start(); // // mulai session → buat nyimpen data login atau akses user

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    // !isset($_SESSION['role']) = cek apakah session 'role' BELUM ada (user belum login)
    // $_SESSION['role'] != 'admin' = cek apakah user bukan admin
    // tanda || = ATAU (jadi kalau salah satu kondisi benar, maka dijalankan)

    header("Location: ../login.php");
    // kalau bukan admin / belum login → langsung diarahkan ke halaman login

    exit;
    // menghentikan script supaya tidak lanjut menjalankan code di bawahnya
}

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database (host, user, password, nama database)

if (!isset($_GET['id'])) { 
    // // ngecek apakah URL punya parameter "id"
    // // contoh URL yang BENAR: detail-pengaduan.php?id=1
    // // kalau user buka halaman TANPA ?id=... → berarti id tidak ada

    // // kondisi ini buat mencegah error
    // // karena di bawah nanti kita bakal pakai $_GET['id']

    // // kalau id tidak ada:
    // // - data tidak bisa diambil dari database
    // // - bisa muncul error / halaman kosong

    // // biasanya diisi:
    // // header("Location: data-pengaduan.php");
    // // exit;
}

$id = $_GET['id']; // // ambil nilai id dari URL → buat ambil data tertentu

if (isset($_POST['simpan'])) {  // // cek apakah tombol "UPDATE" ditekan (form disubmit)

    $status   = $_POST['status']; // // ambil status baru dari dropdown
    $feedback = $_POST['feedback']; // // ambil isi feedback dari textarea

    mysqli_query($koneksi, "UPDATE input_aspirasi
        SET status='$status', feedback='$feedback' 
        WHERE id_pelapor='$id'");
    // // update data di database berdasarkan id
    // // ubah status & feedback sesuai input admin

    header("Location: data-pengaduan.php"); // // setelah update → balik ke halaman list
    exit;  // // hentikan program biar ga lanjut
}

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
// supaya bisa menampilkan nama kategori (bukan cuma angka id)

// WHERE input_aspirasi.id_pelapor = '$id' = filter data
// hanya menampilkan data yang dibuat oleh pelapor tertentu (berdasarkan id_pelapor)

// tujuan keseluruhan:
// ambil semua data aspirasi milik satu user tertentu
// lalu tampilkan juga nama kategori dari tabel kategori

$data = mysqli_fetch_assoc($query); // // ubah hasil query jadi array (biar gampang dipanggil di HTML)
?>

<!DOCTYPE html> 
<html lang="id"> 
<head>
    <meta charset="UTF-8">
    <title>Detail Aspirasi</title> <!-- // judul tab -->

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- // ambil font dari Google -->

    <style>
        body{
            font-family: 'Baloo 2'; /* font utama */
            margin: 0; /* hapus margin default */
            padding: 30px; /* jarak isi */
            background-color: white; /* warna background */
            text-align: center; /* teks rata tengah */
        }

        h2{
            color: black; /* warna judul */
            margin-bottom: 20px; /* jarak bawah */
        }

        .box{
            background-color: white; /* warna box */
            padding: 20px; /* jarak dalam */
            border-radius: 15px; /* sudut melengkung */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* bayangan */
            width: 35%; /* lebar box */
            margin: auto; /* posisi tengah */
        }

        table{
            width: 100%; /* full lebar */
            border-collapse: collapse; /* gabung border */
            font-size: 14px; /* ukuran teks */
        }

        td{
            border: 1px solid black; /* garis tabel */
            padding: 10px; /* jarak isi */
            text-align: left; /* teks rata kiri */
        }

        select, textarea{
            width: 100%; /* full lebar */
            font-family: 'Baloo 2'; /* font sama dengan body */
            padding: 5px; /* jarak dalam */
            border-radius: 8px; /* sudut */
            border: 1px solid black; /* garis */
        }

        button{
            border: 1px solid black;
            background-color: rgb(255, 55, 82); /* warna tombol */
            color: black; /* warna teks */
            border-radius: 10px; /* sudut tombol */
            padding: 7px 15px; /* ukuran tombol */
            font-family: 'Baloo 2'; /* font tombol */
            transition: all 0.2s ease; /* animasi */
        }

        button:hover{
            background-color: rgb(204, 30, 53); /* warna hover */
            color: white; /* teks jadi putih */
            font-weight: bold; /* teks tebal */
            transform: translateY(-2px); /* efek naik */
            box-shadow: 0 6px 12px rgba(0,0,0,0.3); /* bayangan saat hover */
            cursor: pointer; /* jadi tangan */
        }

        .aksi{
            margin-top: 15px; /* jarak atas tombol */
        }
        
    </style>
</head>

<body>

<h2>DETAIL ASPIRASI</h2> <!-- // judul halaman -->

<div class="box"> <!-- // pembungkus -->
<form method="POST"> <!-- // form kirim data ke file yang sama -->
    <table>
        <tr>
            <td><b>ID Aspirasi</b></td>
            <td><?= $data['id_pelapor']; ?></td> <!-- // tampil ID pengaduan -->
        </tr>
        <tr>
            <td><b>Kategori</b></td>
            <td><?= $data['ket_kategori']; ?></td> <!-- // tampil nama kategori -->
        </tr>
        <tr>
            <td><b>Lokasi</b></td>
            <td><?= $data['lokasi']; ?></td> <!-- // tampil lokasi -->
        </tr>
        <tr>
            <td><b>Tanggal</b></td>
            <td><?= $data['tanggal']; ?></td> <!-- // tampil tanggal -->
        </tr>
        <tr>
            <td><b>Keterangan</b></td>
            <td><?= $data['ket']; ?></td> <!-- // tampil isi pengaduan -->
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td>
                <select name="status">
                <!-- dropdown status, value yang dipilih nanti dikirim ke PHP ($_POST['status']) -->

                <option value="menunggu" <?= $data['status']=='menunggu'?'selected':'' ?>>
                    Menunggu
                </option>
                <!-- value="menunggu" = nilai yang dikirim ke database
                    cek: apakah $data['status'] dari database = "menunggu"
                    kalau iya → tambahin 'selected' → otomatis kepilih di dropdown
                    kalau tidak → kosong (tidak kepilih) -->

                <option value="proses" <?= $data['status']=='proses'?'selected':'' ?>>
                    Proses
                </option>
                <!-- logika sama:
                    kalau status di database = "proses" → option ini yang kepilih -->

                <option value="selesai" <?= $data['status']=='selesai'?'selected':'' ?>>
                    Selesai
                </option>
                <!-- logika sama:
                    kalau status di database = "selesai" → option ini yang kepilih -->

            </select>

            <!-- PENJELASAN INTI:
                $data['status'] = ambil status dari database
                ternary ( ? : ) = pengecekan singkat (if versi pendek)
                selected = bikin option otomatis kepilih

                tujuan:
                nampilin status sesuai data di database
                biar admin bisa lihat status sekarang & bisa ubah tanpa mulai dari kosong
            -->
            </td>
        </tr>
        <tr>
          <td><b>Feedback Admin</b></td>
            <td>
                <textarea 
                name="feedback"><?= 
                $data['feedback']; ?></textarea>
                <!-- name="feedback" = nanti isi textarea dikirim ke PHP ($_POST['feedback']) -->

                <!--  $data['feedback'];  = ambil isi feedback dari database -->
                <!-- tanda ? = ? = shortcut dari echo (buat nampilin data ke HTML) -->

                <!-- jadi isi textarea otomatis terisi dari database -->
                <!-- kalau sebelumnya admin sudah isi feedback → bakal muncul di sini -->

                <!-- fungsi utama:
                    - nampilin feedback yang sudah ada
                    - admin bisa edit / ubah feedback tersebut
                -->

                <!-- kalau tidak pakai ini:
                    textarea bakal kosong terus ❌
                    admin harus nulis ulang dari awal -->

            </td>
        </tr>
    </table>

    <div class="aksi">
    <button type="submit" name="simpan"><b>UPDATE !</b></button> <!-- // tombol submit → kirim data ke PHP atas -->

        <a href="data-pengaduan.php">
            <button type="button"><b>KEMBALI</b></button>  <!-- // tombol balik tanpa submit -->
        </a>
    </div>
</form>
</div>
</body>
</html>