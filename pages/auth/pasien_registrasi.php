<?php 
require "../../functions/pasien/pasien_functions.php";

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
        alert('User baru berhasil ditambahkan');
        </script>";
        header("Location: ../../pages/auth/pasien_login.php");
    } else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-[100vh] bg-[#1A1F2B]">
    <form action="" method="post" class="bg-white w-[450px] px-6 py-10 rounded-lg">
        <h1 class="text-center text-3xl font-semibold">Register Pasien</h1>
        <div class="flex flex-col gap-5 mt-7">
            <input type="text" name="nama" id="" required placeholder="Nama"
                class="bg-gray-200 px-5 py-3 outline-none rounded-lg">

            <input type="text" name="alamat" id="" required placeholder=" Alamat"
                class="bg-gray-200 px-5 py-3 outline-none rounded-lg">

            <input type="number" name="no_ktp" id="" required placeholder=" Nomor KTP"
                class="bg-gray-200 px-5 py-3 outline-none rounded-lg">

            <input type="number" name="no_hp" id="" required placeholder=" Nomor HP"
                class="bg-gray-200 px-5 py-3 outline-none rounded-lg">
            <input type="hidden" name="role" value="pasien">

            <button type="submit" name="register"
                class="mt-3 bg-[#2C3E50] text-white py-3 font-medium rounded-lg">Register</button>

            <div class="flex justify-center gap-2">
                <h1>Sudah punya akun?</h1>
                <a href="pasien_login.php" class="font-medium">Login</a>
            </div>
        </div>
    </form>
</body>

</html>