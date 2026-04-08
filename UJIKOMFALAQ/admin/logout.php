<?php
session_start(); 
// // memulai session (kayak "penyimpanan sementara" buat data login user, harus dipanggil dulu sebelum akses session)

session_destroy(); 
// // menghapus SEMUA data session (artinya user dianggap logout karena data login dihapus semua)

header("Location: ../index.php"); 
// // setelah logout, user diarahkan (redirect) ke halaman index.php (biasanya halaman login)

exit; 
// // menghentikan semua proses PHP setelah redirect supaya tidak ada kode lain yang ikut jalan