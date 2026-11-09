<?php
    session_start();
    
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $petugas = trim($_POST['petugas'] ?? '');
        if ($petugas !== '') {
            $_SESSION['petugas'] = $petugas;
            $_SESSION['pinjam'] = 0;
        }
    }
    
    if (isset($_GET['pinjam']) && isset($_SESSION['petugas'])) {
        $_SESSION['pinjam']++;
    }
    
    if (isset($_SESSION['petugas'])) {
        echo '<h1>Petugas: ' . htmlspecialchars($_SESSION['petugas']) . '</h1>';
        echo '<p>Buku dipinjam hari ini: ' . $_SESSION['pinjam'] . '</p>';
        echo '<p>Session ID: ' . session_id() . '</p>';
        echo '<a href="index.php?pinjam=1">Tambah Peminjaman</a> | <a href="index.php?logout=1">Logout</a>';
    } else {
        echo '<h1>Login Petugas</h1>';
        echo '<form method="POST" action="">';
        echo '<p>Nama Petugas : <br /><input type="text" name="petugas" /></p>';
        echo '<p><button type="submit">Masuk</button></p>';
        echo '</form>';
    }
?>
