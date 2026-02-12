<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form pengaduan</title>

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


        .box{
            background-color: white;
            padding: 25px;
            border: 1px solid;
            border-radius: 15px;
            width: 270px;
            transition: all 0.2s ease;
        }

        .box:hover{
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }
        
        button{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(255, 55, 82);
            border-radius: 7px;
            font-family: 'Baloo 2';
            margin-top: 10px;
            margin-bottom: 10px;
            width: 90px;
            height: 35px;
            padding: 0 9px;
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

       button:hover{
        background-color:  rgb(204, 30, 53);
        cursor: pointer;
        color: white;
        font-weight: bold;
        font-size: 17px;
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
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

        textarea{
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
            height: 80px;
            padding: 12px;
            border-radius: 10px;
            font-family: 'Baloo 2';
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
            resize: none;
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
<form action="proses-pengaduan.php" method="POST">
   <b><h2>INPUT ASPIRASI
    <input placeholder="Nis" type="text" name="nis" required> 
    <div>
    <select name="kategori" id="kategori" class="input" required>
    <option value="" disabled selected hidden>Pilih Kategori</option>
    <option value="Fasilitas">Fasilitas</option>
    <option value="1">Elektronik</option>
    <option value="Barang">Barang</option>
</select>
    </div>
    <input placeholder="Lokasi" type="text" name="lokasi" required>
    <div>
    <textarea placeholder="Keterangan" name="keterangan" required></textarea>
    </div>
<a href="siswa.php"> <button type="button">BATAL</button></a>
   <button>KIRIM !</button> 
</div>


</form>

    
</body>
</html>
