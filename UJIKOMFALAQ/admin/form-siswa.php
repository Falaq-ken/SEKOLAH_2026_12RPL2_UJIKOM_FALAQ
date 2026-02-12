<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form siswa</title>

    <style>

        body{
            font-family: 'Baloo 2';
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 0;
            height: 90vh;
            background-color: rgb(255, 55, 82);
            text-align: center;
        }

        .box{
            background-color: white;
            padding: 25px;
            border: 1px solid;
            border-radius: 15px;
            width: 250px;
            transition: all 0.2s ease;
            
        }

        .box:hover{
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }
        
        .button{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(255, 55, 82);
            border-radius: 7px;
            font-family: 'Baloo 2';
            margin-top:5px;
            width: 100%;
            height: 35px;
            padding: 0 9px;
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        button:hover{
                background-color:  rgb(190, 18, 41);
                cursor: pointer;
                color: white;
                font-weight: bold;
                font-size: medium;
                transform: translateY(-3px);
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
                }

        input{
            margin-top: 5px;
            margin-bottom: 5px;
            width: 100%;
            height: 35px;
            padding: 0 12px;
            font-family: 'Baloo 2';
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
        }

        .input {
            width: 100%;
            height: 35px;
            padding: 0 12px;
            border-radius: 10px;
            font-family: 'Baloo 2';
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
            appearance: none;     

        }

    </style>
</head>
<body>
    
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&display=swap" rel="stylesheet">

<div class="box">
<form action="proses-siswa.php" method="POST">
<b> <h2>BUAT AKUN SISWA</h2></b>
    <input placeholder="Nis" type="text" name="nis" required> 
    <div>
    </div>
    <input placeholder="Nama" type="text" name="nama" required>
    <div>
    <input placeholder="Kelas" type="text" name="kelas" required>
    <div>
    <input placeholder="Password" type="password" name="password" required>    
    </div>

   <button class="button"><b>TAMBAH !</b></button>
    <a href="admin.php"> <button class="button" type="button"><b>KEMBALI</b></button></a>
</div>
</form>
 
</body>
</html>
