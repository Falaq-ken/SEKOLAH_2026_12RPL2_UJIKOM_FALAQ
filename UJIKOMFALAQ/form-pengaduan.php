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
            text-align: center;
            
        }


        .box{
            background-color: white;
            padding: 25px;
            border: 1px solid;
            border-radius: 15px;
            width: 200px;
            
            
        }
        
        .button{
            border: none;
            border: 1px solid;
            padding: 5px;
            background-color: rgb(105, 182, 255);
            border-radius: 7px;
            font-family: monospace;
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
    

        a{
            text-decoration: none;
            color: black;
        }
            

        select{
            color: #999; /* abu-abu awal */
        }

        select:focus {
            color: #000;
        }

        select option {
            color: #000; /* opsi normal hitam */
        }

        input{
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

        textarea{
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
            height: 80px;
            padding: 12px;
            border-radius: 10px;
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
            border: 1px solid black;
            font-size: 14px;
            box-sizing: border-box;
            appearance: none;          /* hapus style default */
            -webkit-appearance: none;
            -moz-appearance: none;
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
    




<div class="box">
<form action="proses-pengaduan.php" method="POST">
   <b> <h2>HALAMAN PENGADUAN </h2></b>
    <input placeholder="Nis" type="text" name="nis"> 
    <div>
    <select name="kategori" id="kategori" class="input">
    <option value="" disabled selected hidden>Pilih Kategori</option>
    <option value="Fasilitas">Fasilitas</option>
    <option value="Elektronik">Elektronik</option>
    <option value="Barang">Barang</option>
</select>
    </div>
    <input placeholder="Lokasi" type="text" name="lokasi">
    <div>
    <textarea placeholder="Keterangan" name="keterangan"></textarea>
    </div>

   <button class="button">KIRIM !</button> 
</div>


</form>

    
</body>
</html>
