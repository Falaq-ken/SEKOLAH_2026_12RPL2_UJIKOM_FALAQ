<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PENGADUAN MUTU</title>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        font-family: 'Baloo 2';
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .navbar {
        width: 100%;
        height: 50px;
        background-color: rgb(255, 55, 82);
        border: 1px solid black;
        padding-left: 4px;
        padding-top: 4px;
    }

    .isinav{
        display: flex;
        align-items: start;
        font-family: 'Baloo 2';
        color: black;
        font-size: 25px;
        text-align: start;
    }

    .button{
        background-color: rgb(255, 55, 82);
        border-radius: 10px;
        border: 1px solid black;
        font-family: 'Baloo 2';
        margin-top: 10px;
        margin-bottom: 10px;
        width: 150px;
        height: 35px;
        padding: 0 12px;
        font-size: 14px;
        font-weight: bold;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .button:hover{
        background-color: rgb(190, 18, 41);
        color: white;
        font-weight: bold;
        font-size: large;
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

    .isi{
        margin-top: 20%;
        text-align: center;
        width: 500px;
        font-family: 'Baloo 2';
        font-size: 140%;
        padding: 20px;
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    .isi:hover{
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

</style>
</head>

<body>

<!-- ngambil/Import font dari Google-->
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

<nav class="navbar"> 

    <h1 class="isinav">PENGADUAN SARPRAS MUTU</h1>
</nav>

<div class="isi"> 
    <h1><b>SELAMAT DATANG DI</b></h1>
    <h4><b>aplikasi pengaduan sarpras smk mutu</b></h4>

    <!-- Tombol ke halaman login -->
    <div>
        <a href="login.php">
            <button class="button">LOGIN !</button>
        </a> 
    </div>
</div>
</body>
</html>
