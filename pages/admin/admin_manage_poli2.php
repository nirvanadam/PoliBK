<?php
// Sertakan file koneksi
include '../../connection.php';

// Fungsi untuk menghindari injeksi SQL
function cleanInput($input)
{
    $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Hapus tag script
        '@<[\/\!]*?[^<>]*?>@si',            // Hapus tag HTML
        '@<style[^>]*?>.*?</style>@siU',    // Hapus tag style
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Hapus komentar multi-line
    );

    $output = preg_replace($search, '', $input);
    return $output;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek jenis aksi (tambah, edit, hapus)
    $action = cleanInput($_POST['action']);

    if ($action == 'tambah') {
        // Ambil data dari formulir tambah poli
        $nama_poli = cleanInput($_POST['nama_poli']);
        $keterangan = cleanInput($_POST['keterangan']);

        // Query untuk tambah poli
        $query = "INSERT INTO poli (nama_poli, keterangan) VALUES ('$nama_poli', '$keterangan')";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query tambah poli gagal: " . mysqli_error($mysqli));
        }
    } elseif ($action == 'edit') {
        // Ambil data dari formulir edit poli
       $id = cleanInput($_POST['id']);
    $nama_poli = isset($_POST['nama_poli']) ? cleanInput($_POST['nama_poli']) : '';
    $keterangan = isset($_POST['keterangan']) ? cleanInput($_POST['keterangan']) : '';

        // Query untuk edit poli
    $query = "UPDATE poli SET nama_poli='$nama_poli', keterangan='$keterangan' WHERE id=$id";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        die("Query edit poli gagal: " . mysqli_error($mysqli));
    }
    } elseif ($action == 'hapus') {
        // Ambil id poli yang akan dihapus
        $id = cleanInput($_POST['id']);

        // Query untuk hapus poli
        $query = "DELETE FROM poli WHERE id=$id";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query hapus poli gagal: " . mysqli_error($mysqli));
        }
    }
}

// Query untuk mengambil data poli
$query_select = "SELECT * FROM poli";
$result_select = mysqli_query($mysqli, $query_select);
if (!$result_select) {
    die("Query select poli gagal: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Poli</title>
</head>
<body>
    <h2>Manajemen Poli</h2>

    <!-- Formulir Tambah Poli -->
    <h3>Tambah Poli</h3>
    <form action="admin_manage_poli.php" method="post">
        <input type="hidden" name="action" value="tambah">
        <label>Nama Poli:</label>
        <input type="text" name="nama_poli" required>
        <label>Keterangan:</label>
        <input type="text" name="keterangan" required>
        <button type="submit">Tambah Poli</button>
    </form>

    <!-- Tabel Daftar Poli -->
    <h3>Daftar Poli</h3>
    <table border="1">
        <tr>
            <th>ID Poli</th>
            <th>Nama Poli</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result_select)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama_poli']; ?></td>
                <td><?php echo $row['keterangan']; ?></td>
                <td>
                    <form action="admin_manage_poli.php" method="post">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Edit</button>
                    </form>
                    <form action="admin_manage_poli.php" method="post">
                        <input type="hidden" name="action" value="hapus">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
