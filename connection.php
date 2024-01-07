<?php
$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';
$databaseName = 'poli';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
