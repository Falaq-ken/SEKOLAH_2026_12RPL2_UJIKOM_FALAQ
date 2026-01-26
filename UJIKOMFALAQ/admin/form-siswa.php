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
            
            
        }
        
        .button{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(255, 55, 82);
            border-radius: 7px;
            font-family: 'Baloo 2';
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
            height: 35px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
        }


    
        input{
            margin-top: 10px;
            margin-bottom: 10px;
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

        select {
            background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
            
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
    </div>

   <button class="button">KIRIM !</button> 
</div>


</form>

    
</body>
</html>
