<?php

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
    <?= include("../../components/pasien/sidebar.php"); ?>
    <!-- Side Bar End -->
   
    <main class="items-center w-full bg-[#292E3B] px-10 py-8 rounded-2xl my-7 mr-5">
        <article class="grid grid-cols-2 gap-10">
          <section class="bg-[#1A1F2B] p-8 rounded-lg">
            <h1 class="text-white text-3xl font-medium">Daftar Poli</h1>
            <form action="" method="post" class="flex flex-col gap-5 mt-5">
              <div class="flex flex-col gap-3">
                  <label for="nama_poli" class="text-white text-lg">Nomor Rekam Medi</label>
                  <input type="text" name="nama_poli" id="nama_poli" placeholder="Nomor Rekam Medis"
                      class="px-4 py-3 outline-none rounded-lg">
              </div>

              <div class="flex flex-col gap-3">
                  <label for="keterangan" class="text-white text-lg">Pilih Poli</label>
                  <input type="text" name="keterangan" id="keterangan" placeholder="Pilih poli"
                      class="px-4 py-3 outline-none rounded-lg">
              </div>

              <div class="flex flex-col gap-3">
                  <label for="keterangan" class="text-white text-lg">Pilih Jadwal</label>
                  <input type="date" name="keterangan" id="keterangan" placeholder="Pilih Jadwal"
                      class="px-4 py-3 outline-none rounded-lg">
              </div>

              <div class="flex flex-col gap-3">
                  <label for="keterangan" class="text-white text-lg">Keluhan</label>
                  <input type="text" name="keterangan" id="keterangan" placeholder=""
                      class="px-4 py-3 outline-none rounded-lg">
              </div>

              <button type="submit" name="submit" class="bg-[#004079] w-fit py-4 px-6 text-white font-medium rounded-lg">Tambah
                  Data</button>
            </form>
          </section>

          <section class="bg-[#1A1F2B] p-8 rounded-lg">
            <h1 class="text-white text-3xl font-medium mb-5">Riwayat Daftar Poli</h1>
            <table  class=" w-full table-fixed">
                <thead class="bg-slate-600 text-white">
                    <tr>
                        <th class="border border-slate-500 py-3">No</th>
                        <th class=" border border-slate-500 py-3">Poli</th>
                        <th class=" border border-slate-500 py-3">Dokter</th>
                        <th class=" border border-slate-500 py-3">Hari</th>
                        <th class=" border border-slate-500 py-3">Mulai</th>
                        <th class=" border border-slate-500 py-3">Selesai</th>
                        <th class=" border border-slate-500 py-3">Antrian</th>
                        <th class=" border border-slate-500 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-slate-400">
                    <tr>
                       
                    </tr>
                </tbody>
            </table>
          </section>
        </article>
    </main>
</body>

</html>