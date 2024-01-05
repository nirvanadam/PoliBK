<?php
// Sertakan file koneksi
include 'connection.php';

// Query untuk mengambil data obat
$query = "SELECT * FROM obat";
$result = mysqli_query($mysqli, $query);

// Periksa apakah query berhasil dijalankan
if (!$result) {
    die("Query gagal: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Data Obat</h2>
    <table border="1">
        <tr>
            <th>ID Obat</th>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <!-- Tambahkan kolom lain sesuai kebutuhan -->
        </tr>

        <?php
        // Tampilkan data obat
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama_obat'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            // Tambahkan kolom lain sesuai kebutuhan
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    // Tutup hasil query
    mysqli_free_result($result);

    // Tutup koneksi database
    mysqli_close($mysqli);
    ?>
</body>
</html>