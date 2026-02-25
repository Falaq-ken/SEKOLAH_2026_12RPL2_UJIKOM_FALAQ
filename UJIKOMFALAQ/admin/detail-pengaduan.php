<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

// cek id dari URL
if (!isset($_GET['id'])) {
    echo "ID pengaduan tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

// ================= UPDATE DATA =================
if (isset($_POST['simpan'])) {
    $status   = $_POST['status'];
    $feedback = $_POST['feedback'];

    mysqli_query($koneksi, "UPDATE input_aspirasi
        SET status='$status', feedback='$feedback' 
        WHERE id_pelapor='$id'");

    header("Location: data-pengaduan.php");
    exit;
}

// ============ AMBIL DATA ============
$query = mysqli_query($koneksi, "
    SELECT input_aspirasi.*, kategori.ket_kategori
    FROM input_aspirasi
    LEFT JOIN kategori 
        ON input_aspirasi.id_kategori = kategori.id_kategori
    WHERE input_aspirasi.id_pelapor = '$id'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data pengaduan tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Aspirasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Baloo 2';
            margin: 0;
            padding: 30px;
            background-color: white;
            text-align: center;
        }

        h2{
            color: black;
            margin-bottom: 20px;
        }

        .box{
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
            width: 35%;
            margin: auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        td{
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even){
            background-color: #f2f2f2;
        }

        select, textarea{
            width: 100%;
            font-family: 'Baloo 2';
            padding: 5px;
            border-radius: 8px;
            border: 1px solid black;
        }

        button{
            border: 1px solid black;
            background-color: rgb(255, 55, 82);
            color: black;
            border-radius: 10px;
            padding: 7px 15px;
            font-family: 'Baloo 2';
            transition: all 0.2s ease;
        }

        button:hover{
            background-color: rgb(204, 30, 53);
            color: white;
            font-weight: bold;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
            cursor: pointer;
        }

        a{
            text-decoration: none;
            color: inherit;
        }

        .aksi{
            margin-top: 15px;
        }
    </style>
</head>

<body>

<h2>DETAIL ASPIRASI</h2>

<div class="box">
<form method="POST">
    <table>
        <tr>
            <td><b>ID Aspirasi</b></td>
            <td><?= $data['id_pelapor']; ?></td>
        </tr>
        <tr>
            <td><b>Kategori</b></td>
            <td><?= $data['ket_kategori']; ?></td>
        </tr>
        <tr>
            <td><b>Lokasi</b></td>
            <td><?= $data['lokasi']; ?></td>
        </tr>
        <tr>
            <td><b>Tanggal</b></td>
            <td><?= $data['tanggal']; ?></td> 
        </tr>
        <tr>
            <td><b>Keterangan</b></td>
            <td><?= $data['ket']; ?></td>
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td>
                <select name="status">
                    <option value="menunggu" <?= $data['status']=='menunggu'?'selected':'' ?>>Menunggu</option>
                    <option value="proses" <?= $data['status']=='proses'?'selected':'' ?>>Proses</option>
                    <option value="selesai" <?= $data['status']=='selesai'?'selected':'' ?>>Selesai</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><b>Feedback Admin</b></td>
            <td>
                <textarea name="feedback" rows="4"><?= $data['feedback']; ?></textarea>
            </td>
        </tr>
    </table>

    <div class="aksi">
    <button type="submit" name="simpan"><b>UPDATE !</b></button>
        <a href="data-pengaduan.php">
            <button type="button"><b>KEMBALI</b></button>
        </a>
    </div>
</form>
</div>

</body>
</html>
