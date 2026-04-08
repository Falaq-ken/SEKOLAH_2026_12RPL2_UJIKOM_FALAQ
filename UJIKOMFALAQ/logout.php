<?php
session_start(); 
// // mulai session → wajib dipanggil dulu sebelum bisa menghapus session

session_destroy(); 
// // menghapus semua data session yang tersimpan
// // efeknya user dianggap logout (data login hilang)

header("Location: index.php"); // // redirect / arahkan user ke halaman index.php setelah logout
exit; // // menghentikan eksekusi script supaya tidak lanjut