<?php
   session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

   $username = $_POST['username'];
   $password = $_POST['password'];
   $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
   $data = mysqli_fetch_assoc($query);

   if ($data) {
    if(password_verify($password, $data['password'])) {
       $_SESSION['username'] = $data['username'];
       $_SESSION['password'] = $data['password'];

       if ($data['role'] == 'admin') 
        {
            header("location:admin/admin.php");

       } elseif ($data['role'] == 'siswa') 
       {
            header("location:siswa.php");

   }} else {
       echo "Username atau password salah.";
   }
   }
?>