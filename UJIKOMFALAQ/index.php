<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PENGADUAN MUTU</title>
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
        padding-left: 4px;
        padding-top: 4px;
    }

    .isinav{
        display: flex;
        align-items: start;
        font-family: 'Baloo 2';
        color: black;
        font-size: 25px;
        text-align: start;
    }

    .button{
         border: none;
            border: 1px solid;
            padding: 5px;
            background-color:  rgb(255, 55, 82);
            border-radius: 7px;
           font-family: 'Baloo 2';
            margin-top: 10px;
            margin-bottom: 10px;
            width: 150px;
            height: 35px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid black;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.2s ease;
            
        }
    .button:hover{
                background-color:  rgb(190, 18, 41);
                cursor: pointer;
                color: white;
                font-weight: bold;
                font-size: large;
                transform: translateY(-3px);
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
                }
        

    .isi{
        margin-top: 15%;
        text-align: center ;
        width: 500px;
        font-family: 'Baloo 2';
        font-size: 140%;
        transition: all 0.2s ease;
        border-radius: 10px;
        padding: 20px;
        
    }

    .isi:hover{
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            
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
 
<a href="login.php"> <button class="button">LOGIN !</button></a> 

</div>
</body>
</html>

