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
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
    
        if ($username === 'admin' && $password === '12345') {
            $_SESSION['user'] = $username;
            $_SESSION['kunjungan'] = 0;
        } else {
            $error = 'Username atau password salah.';
        }
    }
    
    if (isset($_SESSION['user'])) {
        $_SESSION['kunjungan']++;
        echo '<h1>Selamat datang, ' . htmlspecialchars($_SESSION['user']) . '!</h1>';
        echo '<p>Anda sudah membuka halaman ini ' . $_SESSION['kunjungan'] . ' kali.</p>';
        echo '<p>Session ID: ' . session_id() . '</p>';
        echo '<a href="index.php">Refresh</a> | <a href="index.php?logout=1">Logout</a>';
    } else {
        echo '<h1>Login Admin</h1>';
        if ($error !== '') {
            echo '<p style="color:red;">!! ' . $error . ' !!</p>';
        }
        echo '<form method="POST" action="">';
        echo '<p>Username : <br /><input type="text" name="username" /></p>';
        echo '<p>Password : <br /><input type="password" name="password" /></p>';
        echo '<p><button type="submit">Masuk</button></p>';
        echo '</form>';
    }
?>
