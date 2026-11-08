<?php
    session_start();
    
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = trim($_POST['nama'] ?? '');
        if ($nama !== '') {
            $_SESSION['nama'] = $nama;
            $_SESSION['kunjungan'] = 0;
        }
    }
    
    if (isset($_SESSION['nama'])) {
        $_SESSION['kunjungan']++;
        echo '<h1>Halo, ' . htmlspecialchars($_SESSION['nama']) . '!</h1>';
        echo '<p>Anda sudah membuka halaman ini ' . $_SESSION['kunjungan'] . ' kali.</p>';
        echo '<p>Session ID: ' . session_id() . '</p>';
        echo '<a href="index.php">Refresh</a> | <a href="index.php?logout=1">Logout</a>';
    } else {
        echo '<h1>Login</h1>';
        echo '<form method="POST" action="">';
        echo '<p>Nama : <br /><input type="text" name="nama" /></p>';
        echo '<p><button type="submit">Masuk</button></p>';
        echo '</form>';
    }
?>
