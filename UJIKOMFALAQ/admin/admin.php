<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>HALAMAN ADMIN</title>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        font-family: 'Baloo 2';
        flex-direction: column ;
        justify-content: center;
        display: flex;
        align-items: center;
    }


    .navbar {
        width: 100%;
        height: 50px;
        background-color: rgb(255, 55, 82);
        border: 1px solid black;
    }

    .isinav{
        display: flex;
        align-items: start;
        font-family: 'Baloo 2';
        color: black;
        font-size: 25px;
        text-align: start;
        padding-left: 5px;
        padding-top: 4px;
    }

    button{
        border: none;
        border: 1px solid;
        padding: 5px;
        background-color:  rgb(255, 55, 82);
        border-radius: 7px;
        font-family: 'Baloo 2';
        margin-top:14px;
        width: 150px;
        height: 35px;
        padding: 0 12px;
        border-radius: 10px;
        border: 1px solid black;
        font-weight: bold;
        font-size: large;
        height: 50px;
        width: 500px;
        transition: all 0.2s ease;
    }

    button:hover{
        background-color:  rgb(190, 18, 41);
        cursor: pointer;
        color: white;
        font-weight: bold;
        font-size: larger;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

    .button2{
        width: 100px;
        height: 30px;
        padding: 0 12px;
        font-size: small;
    }

    .button2:hover{
        background-color:  rgb(204, 30, 53);
        cursor: pointer;
        color: white;
        font-weight: bold;
        font-size: medium;
    }

    .isi{  
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 13%;
    }

</style>
</head>
<body> 

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">



<nav class="navbar"> 
    <h1 class="isinav">HALAMAN ADMIN</h1>
</nav>
<div class="isi">
<a href="data-pengaduan.php"> <button>LIST ASPIRASI</button></a> 
<a href="form-siswa.php"> <button>BUAT AKUN SISWA</button></a> 
<a href="data-siswa.php"> <button>DATA AKUN SISWA</button></a> 
<a href="tambah-kategori.php"> <button>TAMBAH KATEGORI</button></a>
<a href="kategori.php"> <button>DATA KATEGORI</button></a> 
<a href="logout.php"> <button class="button2">LOGOUT!</button></a> 
</div>
</body>
</html>