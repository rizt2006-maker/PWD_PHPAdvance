<?php
    require 'koneksi.php';
    
    echo '<h1>Daftar Film</h1>';
    
    $result = mysqli_query($conn, 'SELECT * FROM film ORDER BY rating DESC');
    
    echo '<table border="1" cellpadding="5">';
    echo '<tr><th>No</th><th>Judul</th><th>Genre</th><th>Rating</th><th>Aksi</th></tr>';
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $no . '</td>';
        echo '<td>' . htmlspecialchars($row['judul']) . '</td>';
        echo '<td>' . htmlspecialchars($row['genre']) . '</td>';
        echo '<td>' . htmlspecialchars($row['rating']) . '</td>';
        echo '<td><a href="hapus.php?id=' . $row['id'] . '">Hapus</a></td>';
        echo '</tr>';
        $no++;
    }
    
    echo '</table>';
    
    echo '<p>Jumlah data: ' . mysqli_num_rows($result) . '</p>';
?>
