<?php
session_start();

// Periksa apakah pengguna sudah login sebagai admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Halaman dashboard admin
// <!-- echo "Selamat datang, " . $_SESSION['username'] . "! Ini adalah halaman dashboard admin."; -->
// ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex gap-5 bg-[#1A1F2B]">
    <!-- Side Bar -->
    <?= include("../../components/admin/sidebar.php"); ?>
    <!-- Side Bar End -->
   

    <main class="items-center w-full bg-[#292E3B] px-10 py-8 rounded-2xl my-7 mr-5">
        <h1 class="text-white text-6xl">Selamat datang, Admin!</h1>
        <article class="grid grid-cols-2 gap-10 mt-10">
            <a href="admin_dashboard.php"
                class="flex justify-between items-center gap-5 bg-[#004079] px-14 py-10 rounded-2xl hover:bg-[#2C3E50] transition-all duration-300">
                <h1 class="text-white text-5xl font-medium">Dokter</h1>
                <img src="../../assets/icons/stethoscope-icon.svg" alt="" width="100px" class="p-2 rounded-lg">
            </a>

            <a href=""
                class="flex justify-between items-center gap-5 bg-[#004079] px-14 py-10 rounded-2xl hover:bg-[#2C3E50] transition-all duration-300">
                <h1 class="text-white text-5xl font-medium">Pasien</h1>
                <img src="../../assets/icons/pasien-icon.svg" alt="" width="100px" class="p-2 rounded-lg">
            </a>

            <a href="admin_manage_poli.php"
                class="flex justify-between items-center gap-5 bg-[#004079] px-14 py-10 rounded-2xl hover:bg-[#2C3E50] transition-all duration-300">
                <h1 class="text-white text-5xl font-medium">Poli</h1>
                <img src="../../assets/icons/building-icon.svg" alt="" width="100px" class="p-2 rounded-lg">
            </a>
            <a href="admin_manage_obat.php"
                class="flex justify-between items-center gap-5 bg-[#004079] px-14 py-10 rounded-2xl hover:bg-[#2C3E50] transition-all duration-300">
                <h1 class="text-white text-5xl font-medium">Obat</h1>
                <img src="../../assets/icons/pill-icon.svg" alt="" width="100px" class="p-2 rounded-lg">
            </a>

        </article>
    </main>
</body>

</html>