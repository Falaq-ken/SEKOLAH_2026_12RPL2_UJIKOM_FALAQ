<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");



$query = mysqli_query($koneksi, "
    SELECT input_aspirasi.*, kategori.ket_kategori, user.username
    FROM input_aspirasi
    LEFT JOIN kategori
    ON input_aspirasi.id_kategori = kategori.id_kategori
    LEFT JOIN user
    ON input_aspirasi.nis = user.nis
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Aspirasi</title>

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
            overflow-x: auto;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th{
            background-color: rgb(255, 55, 82);
            color: white;
        }

        button{
            border: 1px solid black;
            background-color: rgb(255, 55, 82);
            color: black;
            border-radius: 10px;
            padding: 5px 10px;
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

        .kembali{
            margin-top: 20px;
        }

        a{
            text-decoration: none;
            color: inherit;
        }
    </style>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
</head>

<body>

<h2>LIST ASPIRASI</h2>

<div class="box">
<table id="datatable" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIS</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Feedback</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php $no = 1; ?>
    <?php while ($data = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['nis'] ?></td>
            <td><?= $data['lokasi'] ?></td>
            <td><?= date('d M Y', strtotime($data['tanggal'])) ?></td>
            <td><?= $data['ket_kategori'] ?></td>
            <td><?= $data['ket'] ?></td>
            <td><?= $data['status'] ?></td>
            <td><?= $data['feedback'] ?></td>
            <td>
                <a href="detail-pengaduan.php?id=<?= $data['id_pelapor'] ?>">
                    <button><b>DETAIL</b></button>
                </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>

<div class="kembali">
    <a href="admin.php">
        <button><b>KEMBALI</b></button>
    </a>
</div>

<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "paginate":{
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });
});
</script>
</body>
</html>
