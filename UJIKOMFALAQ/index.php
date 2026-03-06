<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PENGADUAN MUTU</title>
<style>
            *{
            margin: 0;
            padding: 0;
        }

        body{
            font-family: 'Baloo 2', cursive;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            width: 100%;
            height: 60px;
            background-color: rgb(255, 55, 82);
            border-bottom: 2px solid black;
            display: flex;
            align-items: center;
        }

        .isinav{
            font-size: 25px;
            padding-left: 15px;
        }

        .isi{  
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 15%;
            text-align: center;
        }

        button{
            margin-top: 20px;
            width: 500px;
            height: 50px;
            background-color: rgb(255, 55, 82);
            border-radius: 10px;
            border: 2px solid black;
            font-family: 'Baloo 2';
            font-weight: bold;
            font-size: large;
            transition: all 0.2s ease;
        }

        button:hover{
            background-color: rgb(190, 18, 41);
            cursor: pointer;
            color: white;
            font-size: larger;
            transform: translateY(-4px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .button2{
            width: 120px;
            height: 35px;
            font-size: medium;
        }

        .button2:hover{
            font-size: large;
        }

</style>
</head>
<body>

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

<nav class="navbar"> 
    <h1 class="isinav">PENGADUAN SARPRAS MUTU</h1>
</nav>

<div class="isi"> 
    <h1><b>SELAMAT DATANG DI</b></h1>
    <h4><b>aplikasi pengaduan sarpras smk mutu</b></h4>
    <div>
        <a href="login.php">
            <button class="button">LOGIN !</button>
        </a> 
    </div>
</div>
</body>
</html>