<?php
    require 'koneksi.php';
    
    echo '<h1>Daftar Menu</h1>';
    
    $result = mysqli_query($conn, 'SELECT * FROM menu ORDER BY kategori, nama_menu');
    
    echo '<table border="1" cellpadding="5">';
    echo '<tr><th>No</th><th>Nama Menu</th><th>Kategori</th><th>Harga</th><th>Aksi</th></tr>';
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $no . '</td>';
        echo '<td>' . htmlspecialchars($row['nama_menu']) . '</td>';
        echo '<td>' . htmlspecialchars($row['kategori']) . '</td>';
        echo '<td>Rp ' . number_format($row['harga'], 0, ',', '.') . '</td>';
        echo '<td><a href="hapus.php?id=' . $row['id'] . '">Hapus</a></td>';
        echo '</tr>';
        $no++;
    }
    
    echo '</table>';
    
    echo '<p>Jumlah data: ' . mysqli_num_rows($result) . '</p>';
?>
