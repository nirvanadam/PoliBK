<?php 
session_start();

if(isset($_SESSION["login"])){
    header("Location: ../../index.php");
    exit;
}

require "../../functions/admin/admin_functions.php";

if(isset($_POST["login"])){
    $nama = $_POST["nama"];
    $no_ktp = $_POST["no_ktp"];

    $result = mysqli_query($conn, "SELECT * FROM pasien WHERE nama = '$nama'");

    // Cek username
    if(mysqli_num_rows($result) === 1){
        // Cek Password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($no_ktp, $row["no_ktp"])){
            // Set Session
            $_SESSION["login"] = true;

            header("Location: ../../pages/pasien/pasien_dashboard.php");
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-[100vh] bg-[#1A1F2B]">
    <form action="" method="post" class="bg-white w-[450px] px-6 py-10 rounded-lg">
        <h1 class="text-center text-3xl font-semibold">Login Pasien</h1>
        <div class="flex flex-col gap-5 mt-7">
            <input type="text" name="nama" id="" required placeholder="Nama"
                class="bg-gray-200 px-5 py-3 outline-none rounded-lg">

            <input type="password" name="no_ktp" id="" required placeholder="Nomor KTP"
                class="bg-gray-200 px-5 py-3 outline-none rounded-lg">

            <!-- <input type="hidden" name="role" value="pasien"> -->

            <button type="submit" name="login" class="mt-3 bg-[#2C3E50] text-white py-3 font-medium rounded-lg">Login</button>

            <div class="flex gap-2">
                <h1>Belum punya akun?</h1>
                <a href="pasien_registrasi.php" class="font-medium">Regsirasi</a>
            </div>
        </div>
    </form>
</body>

</html>