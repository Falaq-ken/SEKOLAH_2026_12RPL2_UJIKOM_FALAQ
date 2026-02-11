<?php
   session_start();
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

   $username = $_POST['username'];
   $password = $_POST['password'];
   $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
   $data = mysqli_fetch_assoc($query);

   if ($data){
       $_SESSION['username'] = $data['username'];
       $_SESSION['password'] = $data['password'];

       if ($data['role'] == 'admin'){

            header("location:admin/admin.php");
       }
       else if($data['role'] == 'siswa'){

            header("location:siswa.php");
       }
   }
   else 
    {
       echo "username atau password salah.";
         echo "<a href='pwsalah.php'>Kembali</a>";
   }