<?php
    $conn = mysqli_connect('localhost', 'root', '', 'mp9_php_advance');
        if (!$conn) {
            die('Koneksi gagal: ' . mysqli_connect_error());
        }
?>