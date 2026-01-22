<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PENGADUAN MUTU</title>
<style>

    body{
        margin: 0;
        padding: 0;
        font-family: 'Baloo 2';
        flex-direction: column ;
        justify-content: start;
        display: flex;
        
    }


    .navbar {
        width: 100%;
        height: 50px;
        background-color: rgb(105, 182, 255);
        margin-bottom: 20px;
        border: 1px solid black;
    }

    .isidiv{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 95%;
        margin: 0 auto;
        font-family: 'Baloo 2';
        color: black;
        font-size: small;
        text-align: start;
    }

    .button{
         border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(55, 98, 240);
            border-radius: 7px;
           font-family: 'Baloo 2';
            margin-top: 10px;
            margin-bottom: 10px;
            width: 150px;
            height: 35px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            font-weight: bold;
        }

    .isi{
        margin-left: 5px;
        padding: 30px;
        text-align: start;
        width: 500px;
        font-family: 'Baloo 2';
        margin-top: 5%;
        font-size: 130%;
    }


</style>
</head>
<body> 

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">



<nav class="navbar"> 
    <div class="isidiv">
    <h1 style="color: black; margin: 0;">PENGADUAN MUTU</h1>
    <a href="login.php"> <button class="button">LOGIN !</button></a> 
    </div>
</nav>

<div class="isi"> 
     <h1><b>Selamat datang di! Pengaduan MUTU</b></h1>
      <h3><b>silahkan pilih ingin buat pengaduan atau hanya ingin cari pengaduan</b></h3>
   
<div>
 
<a href="form-pengaduan.php"> <button class="button">BUAT PENGADUAN</button></a> 
  <a href="cari-pengaduan.php"> <button class="button">CARI PENGADUAN</button></a>
</div>
</div>
</body>
</html>

