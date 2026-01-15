<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form pengaduan</title>

    <style>

        body{
            font-family: monospace;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 0;
            height: 90vh;
            background-color: rgb(105, 182, 255);
        }


             

        .box{
            background-color: white;
            padding: 25px;
            border: 1px solid;
            border-radius: 5px;
        }
        
        .button{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(105, 182, 255);
            border-radius: 5px;
            font-family: monospace;

        }
            
         .button1{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(105, 182, 255);
            border-radius: 5px;
            font-family: monospace;
        }

            
    </style>
</head>
<body>
    




<div class="box">
<form action="">
   <b>HALAMAN PENGADUAN </b>  <br>
    <br>
    <label for="">Nis :</label><br>
    <input type="text"> <br>

    <label for="">Kategori :</label><br>
    <input type="text"> <br>
    
    <label for="">lokasi :</label><br>
    <input type="text">

</form>

    <div>
    <label for="">Keterangan</label> <br>
    <textarea></textarea>
    </div>

  <br>  <button class="button">Kirim</button>
    <a href="index.php"> <button class="button1">Ga jadi</button></a>
</div>

</body>
</html>
