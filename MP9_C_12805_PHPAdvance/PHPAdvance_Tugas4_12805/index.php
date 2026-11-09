<?php
    session_start();
    
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
    $error = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama    = trim($_POST['nama'] ?? '');
        $favorit = $_POST['favorit'] ?? '';
    
        if ($nama === '' || !in_array($favorit, ['Makanan', 'Minuman', 'Camilan'], true)) {
            $error = 'Harap isi nama dan pilih kategori favorit.';
        } else {
            $_SESSION['nama'] = $nama;
            $_SESSION['favorit'] = $favorit;
            $_SESSION['pesanan'] = 0;
        }
    }
    
    if (isset($_GET['pesan']) && isset($_SESSION['nama'])) {
        $_SESSION['pesanan']++;
    }
    
    if (isset($_SESSION['nama'])) {
        echo '<h1>Halo, ' . htmlspecialchars($_SESSION['nama']) . '!</h1>';
        echo '<p>Kategori favoritmu: ' . htmlspecialchars($_SESSION['favorit']) . '</p>';
        echo '<p>Jumlah pesanan: ' . $_SESSION['pesanan'] . '</p>';
        echo '<p>Session ID: ' . session_id() . '</p>';
        echo '<a href="index.php?pesan=1">Tambah Pesanan</a> | <a href="index.php?logout=1">Logout</a>';
    } else {
        echo '<h1>Selamat Datang di Kantin</h1>';
        if ($error !== '') {
            echo '<p style="color:red;">!! ' . $error . ' !!</p>';
        }
        echo '<form method="POST" action="">';
        echo '<p>Nama : <br /><input type="text" name="nama" /></p>';
        echo '<p>Kategori Favorit : <br /><select name="favorit">';
        echo '<option value="">-- Pilih --</option>';
        echo '<option value="Makanan">Makanan</option>';
        echo '<option value="Minuman">Minuman</option>';
        echo '<option value="Camilan">Camilan</option>';
        echo '</select></p>';
        echo '<p><button type="submit">Simpan</button></p>';
        echo '</form>';
    }
?>
