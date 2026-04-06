<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>HALAMAN SISWA</title> <!-- // judul tab -->

<style>
    *{ /* selector universal semua tag HTML kena (div, p, h1, dll) */
        margin: 0; /* reset jarak luar */
        padding: 0; /* reset jarak dalam */
        box-sizing: border-box; /* biar ukuran elemen konsisten */
    }

    body{
        font-family: 'Baloo 2'; /* font utama */
        flex-direction: column ; /* susun ke bawah */
        justify-content: center; /* tengah vertikal */
        display: flex; /* aktifkan flexbox */
        align-items: center; /* tengah horizontal */
    }

    .navbar {
        width: 100%; /* full lebar */
        height: 50px; /* tinggi navbar */
        background-color: rgb(255, 55, 82); /* warna */
        border: 1px solid black; /* garis tepi */
    }

    .isinav{
        display: flex; /* flexbox */
        align-items: start; /* posisi teks */
        font-family: 'Baloo 2'; /* font */
        color: black; /* warna teks */
        font-size: 25px; /* ukuran teks */
        text-align: start; /* rata kiri */
        padding-left: 5px; /* jarak kiri */
        padding-top: 4px; /* jarak atas */
    }

    button{
        border: none; /* hapus border default */
        border: 1px solid; /* garis tepi */
        padding: 5px; /* jarak dalam */
        background-color:  rgb(255, 55, 82); /* warna tombol */
        border-radius: 7px; /* sudut */
        font-family: 'Baloo 2'; /* font */
        margin-top:14px; /* jarak atas */
        width: 150px; /* lebar awal */
        height: 35px; /* tinggi awal */
        padding: 0 12px; /* jarak dalam */
        border-radius: 10px; /* sudut */
        border: 1px solid black; /* garis */
        font-weight: bold; /* tebal */
        font-size: large; /* ukuran teks */
        height: 50px; /* tinggi final */
        width: 500px; /* lebar final */
        transition: all 0.2s ease; /* animasi */
    }

    button:hover{
        background-color:  rgb(190, 18, 41); /* warna hover */
        cursor: pointer; /* cursor tangan */
        color: white; /* warna teks */
        font-weight: bold; /* tebal */
        font-size: larger; /* membesar */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* bayangan */
        transform: translateY(-3px); /* naik */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* bayangan lebih kuat */
    }

    .button2{
        width: 100px; /* lebar kecil */
        height: 30px; /* tinggi kecil */
        padding: 0 12px; /* jarak dalam */
        font-size: small; /* ukuran kecil */
    }

    .button2:hover{
        background-color:  rgb(190, 18, 41); /* warna hover */
        cursor: pointer; /* cursor tangan */
        color: white; /* warna teks */
        font-weight: bold; /* tebal */
        font-size: medium; /* sedikit membesar */
        transform: translateY(-3px); /* naik */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* bayangan */
    }

    .isi{  
        display: flex; /* flexbox */
        flex-direction: column; /* susun ke bawah */
        align-items: center; /* tengah horizontal */
        justify-content: center; /* tengah vertikal */
        margin-top: 18%; /* jarak dari atas */
    }

</style>
</head>

<body> 

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- // ambil font dari Google -->

    <nav class="navbar"> <!-- // navbar atas -->
        <h1 class="isinav">HALAMAN SISWA</h1> <!-- // judul navbar -->
    </nav>

    <div class="isi"> <!-- // isi utama -->
        <a href="form-pengaduan.php"> <!-- // link ke form input -->
            <button>INPUT ASPIRASI</button> <!-- // tombol input -->
        </a> 

        <a href="data-pengaduan.php"> <!-- // link ke data -->
            <button>DATA ASPIRASI</button> <!-- // tombol lihat data -->
        </a> 

        <a href="ganti-password.php"> <!-- // link ganti password -->
            <button>GANTI PASSWORD</button> <!-- // tombol ganti -->
        </a> 

        <a href="logout.php"> <!-- // link ke logout -->
            <button class="button2">LOGOUT !</button> <!-- // tombol logout -->
        </a> 
    </div>

</body>
</html>