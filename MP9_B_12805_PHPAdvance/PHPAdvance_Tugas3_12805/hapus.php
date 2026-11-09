<?php
    // 1. Panggil file koneksi (sama seperti Tugas 1 dan Tugas 2)
    require 'koneksi.php';

    // 2. Ambil id dari link (hapus.php?id=...) memakai $_GET['id'].
    // Beri nilai default '' jika id tidak ada.
    $id = $_GET['id'] ?? '';

    // 3. Validasi id: jika id kosong ATAU bukan angka (gunakan ctype_digit),
    // tampilkan pesan error warna merah: !! ID tidak valid. !!
    if ($id === '' || !ctype_digit($id)) {
        echo '<p style="color:red;">!! ID tidak valid. !!</p>';
    } else {
        // 4. Jika id valid, hapus datanya:
        // a. Tulis query DELETE berdasarkan id (pakai tanda ?)
        $query = 'DELETE FROM buku WHERE id = ?';

        // b. Siapkan query dengan mysqli_prepare()
        $stmt = mysqli_prepare($conn, $query);

        // c. Isi tanda ? dengan mysqli_stmt_bind_param()
        // (id berupa angka, jadi tipenya 'i')
        mysqli_stmt_bind_param($stmt, 'i', $id);

        // d. Jalankan dengan mysqli_stmt_execute()
        mysqli_stmt_execute($stmt);

        // 5. Cek hasilnya dengan mysqli_stmt_affected_rows():
        // - jika nilainya 1 -> tampilkan "Data berhasil dihapus."
        // - jika tidak -> tampilkan "Data tidak ditemukan."
        if (mysqli_stmt_affected_rows($stmt) === 1) {
            echo '<p>Data berhasil dihapus.</p>';
        } else {
            echo '<p>Data tidak ditemukan.</p>';
        }
    }

    // 6. Tampilkan link "Kembali" menuju index.php
    echo '<a href="index.php">Kembali</a>';
?>