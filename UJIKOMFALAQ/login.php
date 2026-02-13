<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body{
            font-family: 'Baloo 2';
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 0;
            height: 90vh;
            background-color:  rgb(255, 55, 82);
            text-align: center;
        }

        img{
            width: 70px;
            height: 50px;
            margin-bottom: -35px;
        }

        .box{
            margin-top: 9%;
            background-color: white;
            padding: 25px;
            border: 1px solid;
            border-radius: 15px;
            width: 190px;
            transition: all 0.2s ease;
        }
        .box:hover{
                cursor: pointer;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                transform: translateY(-3px);
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        input{
            font-family: 'Baloo 2';
            margin-bottom: 10px;
            width: 100%;
            height: 35px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        form{
            font-family: 'Baloo 2';
        }
        
        .button{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(255, 55, 82);
            border-radius: 5px;
            font-family: 'Baloo 2';
            margin-top: 5px;
            width: 60%;
            height: 35px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .button:hover{
            background-color:  rgb(204, 30, 53);
            cursor: pointer;
            color: white;
            font-weight: bold;
            font-size: 17px;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
    </head>
    <body>

<!-- ngambil/Import font dari Google-->
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

<div class="box">

    <!-- action mengarah ke proses-login.php
         method POST digunakan untuk keamanan data -->
    <form action="proses-login.php" method="POST">

        <img 
            src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small/profile-icon-design-free-vector.jpg" 
            alt="icon user"
        >

        <b><h2>LOGIN</h2></b>

        <!-- name digunakan agar bisa diproses di PHP -->
        <input 
            placeholder="Username" 
            type="text" 
            name="username" 
            required
        >
        <!-- type password agar kata disembunyikan -->
        <input 
            placeholder="Password" 
            type="password" 
            name="password" 
            required
        >

        <!-- type submit untuk mengirim data form -->
        <button class="button" type="submit">
            <b>LOGIN !</b>
        </button>

        <a href="index.php">
            <button class="button" type="button">
                <b>KEMBALI</b>
            </button>
        </a>
        </form>
    </div>
    </body>
    </html>