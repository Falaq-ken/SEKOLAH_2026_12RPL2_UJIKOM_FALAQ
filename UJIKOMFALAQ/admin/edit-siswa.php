<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];

    mysqli_query($koneksi, "
        UPDATE user SET
        username='$username',
        password='$password',
        nis='$nis',
        kelas='$kelas'
        WHERE id='$id'
    ");

    header("Location: data-siswa.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>

<h2>EDIT DATA SISWA</h2>

<form method="post">
    <label>Username</label><br>
    <input type="text" name="username" value="<?= $data['username'] ?>"><br><br>

    <label>Password</label><br>
    <input type="text" name="password" value="<?= $data['password'] ?>"><br><br>

    <label>NIS</label><br>
    <input type="text" name="nis" value="<?= $data['nis'] ?>"><br><br>

    <label>Kelas</label><br>
    <input type="text" name="kelas" value="<?= $data['kelas'] ?>"><br><br>

    <button type="submit" name="update">Update</button>
    <a href="data-siswa.php"><button type="button">Batal</button></a>
</form>

</body>
</html>
