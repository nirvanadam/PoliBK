<?php 
require "../../functions/admin/admin_functions.php";

// Ambil data id di URL
$id = $_GET["id"];

// Ambil data dari tabel poli
$poli = query("SELECT * FROM poli WHERE id = $id")[0];

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan atau tidak
    if(edit_poli($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil diedit!');
                document.location.href = '../../pages/admin/admin_manage_poli.php';
            </script>
        ";
        header("refresh: 0;");
    } else{
         echo "
            <script>
                alert('Data gagal diedit!');
                document.location.href = '../../pages/admin/admin_manage_poli.php';
            </script>
        ";
        header("refresh: 0;");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Poli</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex gap-5 bg-[#1A1F2B]">
    <!-- Side Bar -->
    <?= include("../../components/admin/sidebar.php"); ?>
    <!-- Side Bar End -->

    <main class="items-center w-full bg-[#292E3B] px-10 py-8 rounded-2xl my-7 mr-5">
        <h1 class="text-white text-2xl">Mengelola Poli</h1>
        <form action="" method="post" class="flex flex-col gap-5 mt-5">
            <input type="hidden" name="id" id="id" value="<?= $poli["id"] ?>">
            <div class="flex flex-col gap-3">
                <label for="nama_poli" class="text-white text-lg">Nama Poli</label>
                <input type="text" name="nama_poli" id="nama_poli" placeholder="Nama Poli" value="<?= $poli["nama_poli"] ?>"
                    class="px-4 py-3 outline-none rounded-lg">
            </div>

            <div class="flex flex-col gap-3">
                <label for="keterangan" class="text-white text-lg">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?= $poli["keterangan"] ?>"
                    class="px-4 py-3 outline-none rounded-lg">
            </div>

            <button type="submit" name="submit" class="bg-[#004079] w-fit py-4 px-6 text-white font-medium rounded-lg">Edit
                Data</button>
        </form>
    </main>
</body>

</html>