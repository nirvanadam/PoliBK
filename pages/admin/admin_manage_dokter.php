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
        // Ambil data dari formulir tambah dokter
        $nama = cleanInput($_POST['nama']);
        $alamat = cleanInput($_POST['alamat']);
        $no_hp = cleanInput($_POST['no_hp']);

        // Query untuk tambah dokter
        $query = "INSERT INTO dokter (nama, alamat, no_hp) VALUES ('$nama', '$alamat', '$no_hp')";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query tambah dokter gagal: " . mysqli_error($mysqli));
        }
    } elseif ($action == 'edit') {
        // Ambil data dari formulir edit dokter
        $id_dokter = cleanInput($_POST['id_dokter']);
        $nama = cleanInput($_POST['nama']);
        $alamat = cleanInput($_POST['alamat']);
        $no_hp = cleanInput($_POST['no_hp']);

        // Query untuk edit dokter
        $query = "UPDATE dokter SET nama='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id_dokter=$id_dokter";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query edit dokter gagal: " . mysqli_error($mysqli));
        }
    } elseif ($action == 'hapus') {
        // Ambil id dokter yang akan dihapus
        $id_dokter = cleanInput($_POST['id_dokter']);

        // Query untuk hapus dokter
        $query = "DELETE FROM dokter WHERE id_dokter=$id_dokter";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query hapus dokter gagal: " . mysqli_error($mysqli));
        }
    }
}

// Query untuk mengambil data dokter
$query_select = "SELECT * FROM dokter";
$result_select = mysqli_query($mysqli, $query_select);
if (!$result_select) {
    die("Query select dokter gagal: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Dokter</title>
</head>
<body>
    <h2>Manajemen Dokter</h2>

    <!-- Formulir Tambah Dokter -->
    <h3>Tambah Dokter</h3>
    <form action="admin_manage_dokter.php" method="post">
        <input type="hidden" name="action" value="tambah">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>Alamat:</label>
        <input type="text" name="alamat" required>
        <label>No. HP:</label>
        <input type="text" name="no_hp" required>
        <button type="submit">Tambah Dokter</button>
    </form>

    <!-- Tabel Daftar Dokter -->
    <h3>Daftar Dokter</h3>
    <table border="1">
        <tr>
            <th>ID Dokter</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result_select)) { ?>
            <tr>
                <td><?php echo $row['id_dokter']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td>
                    <form action="admin_manage_dokter.php" method="post">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id_dokter" value="<?php echo $row['id_dokter']; ?>">
                        <button type="submit">Edit</button>
                    </form>
                    <form action="admin_manage_dokter.php" method="post">
                        <input type="hidden" name="action" value="hapus">
                        <input type="hidden" name="id_dokter" value="<?php echo $row['id_dokter']; ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
