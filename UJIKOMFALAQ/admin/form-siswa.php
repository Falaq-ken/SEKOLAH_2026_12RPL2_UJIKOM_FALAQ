<?php 
session_start(); // // mulai session → ini kayak "tempat nyimpen data sementara" (misal: login, pesan sukses, dll)
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form siswa</title> <!-- // judul di tab browser -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font yang dipakai di seluruh halaman */
            display: flex; /* // aktifin flexbox (biar gampang ngatur posisi) */
            justify-content: center; /* // posisi ke tengah horizontal */
            flex-direction: column; /* // susun dari atas ke bawah */
            align-items: center; /* // posisi ke tengah vertikal */
            margin: 0; /* // hilangin jarak default dari browser */
            height: 90vh; /* // tinggi 90% layar */
            background-color: rgb(255, 55, 82); /* // warna background merah */
            text-align: center; /* // semua teks jadi rata tengah */
        }

        .box{
            margin-top: 5%; /* // jarak dari atas */
            background-color: white; /* // warna kotak putih */
            padding: 25px; /* // jarak isi ke pinggir kotak */
            border: 1px solid; /* // garis pinggir kotak */
            border-radius: 15px; /* // sudut jadi melengkung */
            width: 250px; /* // lebar kotak */
            transition: all 0.2s ease; /* // efek animasi halus */
            
        }

        .box:hover{
            cursor: pointer; /* // cursor jadi tangan pas diarahkan */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* // bayangan ringan */
            transform: translateY(-3px); /* // naik dikit ke atas */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* // bayangan lebih tebal */
        }
        
        .button{
            border: none; /* // hapus border default tombol */
            border: 1px solid; /* // kasih border baru */
            padding: 5px; /* // jarak dalam */
            background-color: rgb(255, 55, 82); /* // warna tombol */
            border-radius: 7px; /* // sudut */
            font-family: 'Baloo 2'; /* // font */
            margin-top:5px; /* // jarak atas */
            width: 100%; /* // lebar penuh */
            height: 35px; /* // tinggi tombol */
            padding: 0 9px; /* // padding kiri kanan */
            border-radius: 10px; /* // sudut lebih bulat */
            border: 1px solid black; /* // border hitam */
            font-size: 14px; /* // ukuran teks */
            box-sizing: border-box; /* // biar ukuran ga berubah karena padding */
            transition: all 0.2s ease; /* // animasi */
        }

        button:hover{
            background-color:  rgb(190, 18, 41); /* // warna tombol saat disentuh */
            cursor: pointer; /* // jadi tangan */
            color: white; /* // teks jadi putih */
            font-weight: bold; /* // teks tebal */
            font-size: medium; /* // ukuran teks */
            transform: translateY(-3px); /* // naik dikit */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* // bayangan */
        }

        input{
            margin-top: 5px; /* // jarak atas */
            margin-bottom: 5px; /* // jarak bawah */
            width: 100%; /* // lebar penuh */
            height: 35px; /* // tinggi input */
            padding: 0 12px; /* // jarak dalam */
            font-family: 'Baloo 2'; /* // font */
            border-radius: 10px; /* // sudut */
            border: 1px solid black; /* // garis pinggir */
            font-size: 14px; /* // ukuran teks */
            box-sizing: border-box; /* // biar ukuran stabil */
        }

        .input {
            width: 100%; /* // lebar penuh */
            height: 35px; /* // tinggi */
            padding: 0 12px; /* // jarak dalam */
            border-radius: 10px; /* // sudut */
            font-family: 'Baloo 2'; /* // font */
            border: 1px solid black; /* // border */
            font-size: 14px; /* // ukuran teks */
            box-sizing: border-box; /* // ukuran stabil */
            appearance: none; /* // hilangin style bawaan browser */
        }

    </style>
</head>
<body>
    
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<!-- // ambil font dari internet (Google Fonts) -->

<div class="box"> <!-- // kotak utama -->
<form action="proses-siswa.php" method="POST"> <!-- // kirim data ke file proses-siswa.php -->

<b> <h2>BUAT AKUN SISWA</h2></b> <!-- // judul form -->

<?php include "pesan.php"; ?> <!-- // nampilin pesan (misal sukses / error) -->

    <input 
    placeholder="Nis"  
    type="text"  
    name="nis"  
     required>  <!-- // wajib diisi -->
    <div> <!-- // div pembungkus) -->
    
    </div>
    <input 
    placeholder="Nama"  
    type="text" 
    name="nama"  
    required> <!-- // wajib diisi -->
    <div> <!-- // pembungkus lagi -->
    
    <input 
    placeholder="Kelas" 
    type="text" 
    name="kelas"  
    required> <!-- // wajib diisi -->
    <div> <!-- // ini div belum ditutup (secara struktur kurang rapi, tapi masih jalan) -->
  
   <button class="button"><b>TAMBAH !</b></button> <!-- // tombol submit → kirim semua input ke proses-siswa.php -->

    <a href="admin.php"> 
        <button class="button" type="button"><b>KEMBALI</b></button>
    </a> <!-- // tombol kembali ke halaman admin (ga kirim data karena type="button") -->

</div>
</form>
</body>
</html>