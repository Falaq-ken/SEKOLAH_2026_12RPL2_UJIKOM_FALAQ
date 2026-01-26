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
            background-color: white;
            padding: 25px;
            border: 1px solid;
            border-radius: 15px;
            width: 190px;
            margin: auto;
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
            margin-top: 10px;
            margin-bottom: 10px;
            width: 50%;
            height: 35px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    

<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">



<div class="box">
<form action="proses-login.php" method="POST">

    <img src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small/profile-icon-design-free-vector.jpg" alt="">
   <b><h2>LOGIN</h2></b>

    <input placeholder="Username" type="text" name="username" required>
    <input placeholder="Password" type="password" name="password" required>
     <button class="button" type="submit"><b>LOGIN !</b></button>
    
</form>
   
</div>

</body>
</html>
