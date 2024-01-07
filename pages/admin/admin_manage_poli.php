<?php 
require "../../functions/admin/admin_functions.php";

// Ambil data dari tabel poli
$poli = query("SELECT * FROM poli");

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    // Cek apakah data berhasil ditambahkan atau tidak
    if(tambah_poli($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambah!');
            </script>
        ";
        header("refresh: 0;");
    } else{
         echo "
            <script>
                alert('Data gagal ditambah!');
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
            <div class="flex flex-col gap-3">
                <label for="nama_poli" class="text-white text-lg">Nama Poli</label>
                <input type="text" name="nama_poli" id="nama_poli" placeholder="Nama Poli"
                    class="px-4 py-3 outline-none rounded-lg">
            </div>

            <div class="flex flex-col gap-3">
                <label for="keterangan" class="text-white text-lg">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan"
                    class="px-4 py-3 outline-none rounded-lg">
            </div>

            <button type="submit" name="submit" class="bg-[#004079] w-fit py-4 px-6 text-white font-medium rounded-lg">Tambah
                Data</button>
        </form>

        <article class="bg-white mt-14 p-5 rounded-lg">
            <h1>Data Poli</h1>
            <table  class=" w-full table-fixed">
                <thead class="bg-slate-600 text-white">
                    <tr>
                        <th class="w-[5%] border border-slate-500 py-3">No</th>
                        <th class="w-[20%] border border-slate-500 py-3">Nama Poli</th>
                        <th class="w-[50%] border border-slate-500 py-3">Keterangan</th>
                        <th class="w-[25%] border border-slate-500 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-slate-400">
                    <?php $index = 1; ?>
                     <?php foreach($poli as $item) : ?>
                    <tr>
                        <td class="border border-slate-500 py-5 text-center"><?= $index  ?></td>
                        <td class="border border-slate-500 py-5 text-center"><?= $item["nama_poli"]  ?></td>
                        <td class="border border-slate-500 py-5"><?= $item["keterangan"] ?></td>
                        <td class="border border-slate-500 py-5 text-center">
                            <a href="admin_edit_poli.php?id=<?= $item["id"] ?>" class="bg-green-500 px-7 py-3 rounded-lg text-white mr-3">Edit</a>
                            <a href="../../functions/admin/hapus_poli.php?id=<?= $item["id"] ?>" class="bg-red-500 px-7 py-3 rounded-lg text-white">Delete</a>
                        </td>
                    </tr>
                    <?php $index++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </article>
    </main>
</body>

</html>