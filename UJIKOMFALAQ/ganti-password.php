<?php
session_start(); 

var_dump($_SESSION);
exit;

$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq"); 

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}   

$id = $_SESSION['id']; 
// ambil id user yang lagi login

$pesan = ""; 
// variabel buat nampung pesan error / sukses

// kalo tombol GANTI dipencet
if (isset($_POST['ganti'])) {

    // ambil input dari form
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi    = $_POST['konfirmasi'];

    // ambil password lama dari database sesuai id login
    $query = mysqli_query($koneksi, "SELECT password FROM user WHERE id='$id'");
    $data  = mysqli_fetch_assoc($query);

    // cek password lama bener apa kagak
    if ($password_lama != $data['password']) {
        $pesan = "Password lama salah!";
    
    // cek password baru sama konfirmasi
    } elseif ($password_baru != $konfirmasi) {
        $pesan = "Konfirmasi password tidak sama!";
    
    // kalo aman semua
    } else {
        mysqli_query($koneksi, "UPDATE user SET password='$password_baru' WHERE id='$id'");
        // update password di database

        $pesan = "Password berhasil diganti!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ganti Password</title>

    <style>
        body{
            font-family: 'Baloo 2';
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            height: 100vh;
            background-color: rgb(255, 55, 82);
            text-align: center;
        }

        .box{
            background-color: white;
            padding: 25px;
            border: 1px solid black;
            border-radius: 15px;
            width: 250px;
            transition: all 0.2s ease;
        }

        .box:hover{
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
            transform: translateY(-3px);
        }

        input{
            margin-top: 7px;
            margin-bottom: 7px;
            width: 100%;
            height: 35px;
            padding: 0 12px;
            font-family: 'Baloo 2';
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
        }

        button{
            background-color: rgb(255, 55, 82);
            border: 1px solid black;
            border-radius: 10px;
            font-family: 'Baloo 2';
            width: 100%;
            height: 35px;
            margin-top: 5px;
            transition: all 0.2s ease;
        }

        button:hover{
            background-color: rgb(204, 30, 53);
            color: white;
            font-weight: bold;
            font-size: 16px;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.3);
            cursor: pointer;
        }
    </style>
</head>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">
<body>

<div class="box">
    <h2>GANTI PASSWORD</h2>

    <?php if ($pesan != "") { ?>
        <p><?= $pesan ?></p>
        <!-- nampilin pesan kalo ada -->
    <?php } ?>

    <form method="post">
        <input type="password" name="password_lama" placeholder="Password Lama" required>
        <input type="password" name="password_baru" placeholder="Password Baru" required>
        <input type="password" name="konfirmasi" placeholder="Konfirmasi Password" required>

        <button type="submit" name="ganti"><b>GANTI !</b></button>
    </form>

    <a href="siswa.php">
        <button><b>KEMBALI</b></button>
    </a>
</div>

</body>
</html>
