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
            border-radius: 15px;
        }
        
        .button{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(105, 182, 255);
            border-radius: 7px;
            font-family: monospace;

        }
            
         .button1{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(105, 182, 255);
            border-radius: 7px;
            font-family: monospace;
        }

            
    </style>
</head>
<body>
    




<div class="box">
<form action="proses-pengaduan.php" method="POST">
   <b>HALAMAN PENGADUAN </b>  <br>
    <br>
    <label for="">Nis :</label><br>
    <input type="text" name="nis"> <br>

    <div>
    <label for="">Kategori</label>
    <br>
    <select name="kategori" id="kategori">
        <option value="" hidden selected>Pilih Kategori</option>
        <option value="Fasilitas">Fasilitas</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Barang">Barang</option>
    </select>
    </div>
    
    <label for="">lokasi :</label><br>
    <input type="text" name="lokasi">

    <div>
    <label for="">Keterangan :</label> <br>
    <textarea name="keterangan"></textarea>
    </div>

  <br>  <a href="index.php"> <button class="button1">BATAL</button></a>
   <button class="button">KIRIM !</button> 
</div>


</form>

    
</body>
</html>
