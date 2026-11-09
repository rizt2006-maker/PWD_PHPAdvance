<?php
    $conn = mysqli_connect('localhost', 'root', '', 'mp9_film');
    
    if (!$conn) {
        die('Koneksi gagal: ' . mysqli_connect_error());
    }
?>
