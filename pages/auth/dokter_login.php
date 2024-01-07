<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dokter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-[100vh] bg-[#1A1F2B]">
    <form action="login_process.php" method="post" class="bg-white w-[450px] px-6 py-10 rounded-lg">
        <h1 class="text-center text-3xl font-semibold">Login Dokter</h1>
        <div class="flex flex-col gap-5 mt-7">
            <input type="text" name="username" id="" required placeholder="Username"
                class="bg-gray-200 px-5 py-3 outline-none rounded-lg">
            <input type="password" name="password" id="" required placeholder="Password"
                class="bg-gray-200 px-5 py-3 outline-none rounded-lg">
            <input type="hidden" name="role" value="dokter">

            <button type="submit" class="mt-3 bg-[#2C3E50] text-white py-3 font-medium rounded-lg">Login</button>
        </div>
    </form>
</body>

</html>