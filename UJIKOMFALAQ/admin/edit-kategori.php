<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); // // koneksi ke database MySQL

$id = $_GET['id']; 
// // ambil id dari URL (contoh: edit-kategori.php?id=3)
// // jadi $id ini dipakai buat tau data mana yang mau diedit

$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'"); // // ambil data kategori berdasarkan id yang dipilih
$data = mysqli_fetch_assoc($query); // // ubah hasil query jadi array (biar bisa dipanggil pakai $data['nama_kolom'])

if (isset($_POST['update'])) { // // cek apakah tombol UPDATE ditekan (form sudah dikirim)

    $kategori = $_POST['ket_kategori']; // // ambil data input baru dari form (nama kategori yang diubah)

    mysqli_query($koneksi, "
        UPDATE kategori SET
        ket_kategori='$kategori'
        WHERE id_kategori='$id'
    "); 
    // // perintah SQL untuk mengubah data
    // // UPDATE = update data lama
    // // SET = kolom yang diubah
    // // WHERE = data mana yang mau diubah (berdasarkan id)

    header("Location: data-kategori.php"); // // setelah update → pindah ke halaman kategori.php
}
?>

<!DOCTYPE html> 
<html lang="id"> 
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title> <!-- // judul tab browser -->

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- // ambil font dari Google Fonts -->

    <style>
        body{
            font-family: 'Baloo 2'; /* // font utama */
            display: flex; /* // pakai flexbox */
            justify-content: center; /* // posisi horizontal tengah */
            align-items: center; /* // posisi vertikal tengah */
            height: 100vh; /* // tinggi full layar */
            margin: 0; /* // hilangin margin default */
            background-color: rgb(255, 55, 82); /* // warna background */
        }

        .box{
            background-color: white; /* // warna box */
            padding: 25px; /* // jarak isi */
            width: 260px; /* // lebar box */
            border-radius: 15px; /* // sudut membulat */
            border: 1px solid black; /* // garis pinggir */
            text-align: center; /* // teks di tengah */
            box-shadow: 0 8px 15px rgba(0,0,0,0.3); /* // efek bayangan */
        }

        h2{
            margin-bottom: 15px; /* // jarak bawah judul */
        }

        label{
            font-size: 14px; /* // ukuran teks */
            font-weight: bold; /* // teks tebal */
            display: block; /* // jadi baris sendiri */
            text-align: left; /* // rata kiri */
            margin-top: 8px; /* // jarak atas */
        }

        input{
            width: 100%; /* // lebar full */
            height: 35px; /* // tinggi input */
            margin-top: 4px; /* // jarak atas */
            padding: 0 10px; /* // jarak teks dalam input */
            border-radius: 10px; /* // sudut bulat */
            border: 1px solid black; /* // garis input */
            font-family: 'Baloo 2'; /* // font input */
            box-sizing: border-box; /* // biar padding ga nambah ukuran */
        }

        button{
            width: 100%; /* // tombol full lebar */
            height: 35px; /* // tinggi tombol */
            margin-top: 8px; /* // jarak atas */
            border-radius: 10px; /* // sudut bulat */
            border: 1px solid black; /* // garis tombol */
            background-color: rgb(255, 55, 82); /* // warna tombol */
            font-family: 'Baloo 2'; /* // font tombol */
            cursor: pointer; /* // cursor tangan */
            transition: all 0.2s ease; /* // animasi halus */
        }

        button:hover{
             background-color:  rgb(204, 30, 53); /* // warna hover */
            cursor: pointer; /* // cursor tangan */
            color: white; /* // teks putih */
            font-weight: bold; /* // teks tebal */
            font-size: medium; /* // ukuran teks naik */
            transform: translateY(-3px); /* // tombol naik */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* // bayangan */
        }

    </style>
</head>

<body>

<div class="box"> <!-- // container utama -->
    <h2>EDIT KATEGORI</h2> <!-- // judul halaman -->

    <form method="post"> <!-- // form kirim data ke file ini sendiri -->
        <label>Kategori</label> <!-- // label input -->

        <input 
        type="text"  
        name="ket_kategori"  
        value="<?= $data['ket_kategori'] ?>">
        <!-- // isi default dari database (biar user bisa edit, bukan kosong) -->

        <button type="submit" name="update"><b>UPDATE !</b></button> <!-- // tombol submit untuk kirim perubahan -->

        <a href="data-kategori.php"> <!-- // link kembali -->
            <button type="button"><b>BATAL</b></button> <!-- // type button supaya tidak submit form -->
        </a>
    </form>
</div>
</body>
</html>