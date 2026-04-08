<?php
if (isset($_SESSION['pesan'])) { 
    // // cek apakah di dalam session ada data dengan key 'pesan'
    // // dipakai untuk notifikasi (misalnya: sukses, error, dll)
    
    echo "<p>" . $_SESSION['pesan'] . "</p>";  
    // // menampilkan isi pesan ke halaman dalam tag <p>
    // // jadi user bisa lihat notifikasi yang dikirim dari halaman lain
    
    unset($_SESSION['pesan']);  
    // // menghapus data 'pesan' dari session setelah ditampilkan
    // // supaya pesan tidak muncul terus (hanya sekali tampil)
}
?>