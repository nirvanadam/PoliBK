<?php
session_start();

// Periksa apakah pengguna sudah login sebagai dokter
if ($_SESSION['role'] !== 'dokter') {
    header("Location: ../../pages/auth/dokter_login.php");
    exit();
}

// Halaman dashboard dokter
echo "Selamat datang, " . $_SESSION['username'] . "! Ini adalah halaman dashboard dokter.";
?>
