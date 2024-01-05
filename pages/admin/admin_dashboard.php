<?php
session_start();

// Periksa apakah pengguna sudah login sebagai admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Halaman dashboard admin
echo "Selamat datang, " . $_SESSION['username'] . "! Ini adalah halaman dashboard admin.";
?>
