<?php
// mulai session biar bisa ngakses data login
session_start();

// hapus semua data session (logout)
session_destroy();

// balikin user ke halaman awal
header("Location: ../index.php");

// hentikan proses biar nggak lanjut ke bawah
exit;