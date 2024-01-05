<?php
session_start();

// Periksa apakah pengguna sudah login sebagai pasien
if ($_SESSION['role'] !== 'pasien') {
    header("Location: login.php");
    exit();
}

// Halaman dashboard pasien
echo "Selamat datang, " . $_SESSION['username'] . "! Ini adalah halaman dashboard pasien.";
?>
