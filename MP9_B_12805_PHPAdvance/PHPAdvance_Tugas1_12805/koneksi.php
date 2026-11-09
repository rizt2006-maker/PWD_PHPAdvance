<?php
    $conn = mysqli_connect('localhost', 'root', '', 'mp9_perpustakaan');
    
    if (!$conn) {
        die('Koneksi gagal: ' . mysqli_connect_error());
    }
?>