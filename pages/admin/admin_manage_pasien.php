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
        // Ambil data dari formulir tambah pasien
        $nama = cleanInput($_POST['nama']);
        $alamat = cleanInput($_POST['alamat']);
        $no_ktp = cleanInput($_POST['no_ktp']);
        $no_hp = cleanInput($_POST['no_hp']);
        $no_rm = cleanInput($_POST['no_rm']);

        // Query untuk tambah pasien
        $query = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp', '$no_rm')";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query tambah pasien gagal: " . mysqli_error($mysqli));
        }
    } elseif ($action == 'edit') {
        // Ambil data dari formulir edit pasien
        $id = cleanInput($_POST['id']);
        $nama = cleanInput($_POST['nama']);
        $alamat = cleanInput($_POST['alamat']);
        $no_ktp = cleanInput($_POST['no_ktp']);
        $no_hp = cleanInput($_POST['no_hp']);
        $no_rm = cleanInput($_POST['no_rm']);

        // Query untuk edit pasien
        $query = "UPDATE pasien SET nama='$nama', alamat='$alamat', no_ktp='$no_ktp', no_hp='$no_hp', no_rm='$no_rm' WHERE id=$id";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query edit pasien gagal: " . mysqli_error($mysqli));
        }
    } elseif ($action == 'hapus') {
        // Ambil id pasien yang akan dihapus
        $id = cleanInput($_POST['id']);

        // Query untuk hapus pasien
        $query = "DELETE FROM pasien WHERE id=$id";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query hapus pasien gagal: " . mysqli_error($mysqli));
        }
    }
}

// Query untuk mengambil data pasien
$query_select = "SELECT * FROM pasien";
$result_select = mysqli_query($mysqli, $query_select);
if (!$result_select) {
    die("Query select pasien gagal: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pasien</title>
</head>
<body>
    <h2>Manajemen Pasien</h2>

    <!-- Formulir Tambah Pasien -->
    <h3>Tambah Pasien</h3>
    <form action="admin_manage_pasien.php" method="post">
        <input type="hidden" name="action" value="tambah">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>Alamat:</label>
        <input type="text" name="alamat" required>
        <label>No KTP:</label>
        <input type="text" name="no_ktp" required>
        <label>No HP:</label>
        <input type="text" name="no_hp" required>
        <label>No RM:</label>
        <input type="text" name="no_rm" required>
        <button type="submit">Tambah Pasien</button>
    </form>

    <!-- Tabel Daftar Pasien -->
    <h3>Daftar Pasien</h3>
    <table border="1">
        <tr>
            <th>ID Pasien</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No KTP</th>
            <th>No HP</th>
            <th>No RM</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result_select)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['no_ktp']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['no_rm']; ?></td>
                <td>
                    <form action="admin_manage_pasien.php" method="post">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Edit</button>
                    </form>
                    <form action="admin_manage_pasien.php" method="post">
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
