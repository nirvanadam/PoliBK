<?php
// Sertakan file koneksi
include '../../connection.php';

// Ambil data dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];
$role = isset($_POST['role']) ? $_POST['role'] : ''; // Pastikan variabel $role terdefinisi

// Identifikasi role berdasarkan username
if ($username === 'admin1') {
    $role = 'admin';
} elseif (empty($role)) {
    // Atur default role jika tidak ada role yang dipilih
    $role = 'pasien';
}

// Query untuk memeriksa keberadaan pengguna
$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah query berhasil dijalankan
if (!$result) {
    die("Query gagal: " . mysqli_error($mysqli));
}

// Periksa apakah pengguna ditemukan
if (mysqli_num_rows($result) > 0) {
    // Set sesi dan arahkan ke dashboard sesuai peran
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    if ($role == 'pasien') {
        header("Location: ../../pages/pasien/pasien_dashboard.php");
    } elseif ($role == 'dokter') {
        header("Location: ../../pages/dokter/dokter_dashboard.php");
    } elseif ($role == 'admin') {
        header("Location: ../../pages/admin/admin_dashboard.php");
    }
} else {
    echo "Login gagal. Silakan cek kembali username, password, dan peran.";
}

// Tutup hasil query
mysqli_free_result($result);

// Tutup koneksi database
mysqli_close($mysqli);
?>
