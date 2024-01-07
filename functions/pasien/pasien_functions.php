<?php 
require "../../connection.php";

function registrasi($data_form){
    global $conn;

    $nama = stripslashes($data_form["nama"]);
    $alamat = mysqli_real_escape_string($conn, $data_form["alamat"]);
    $no_ktp = mysqli_real_escape_string($conn, $data_form["no_ktp"]);
    $no_hp = mysqli_real_escape_string($conn, $data_form["no_hp"]);

    // Cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT no_ktp FROM pasien WHERE no_ktp = '$no_ktp'");
    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('Pengguna sudah terdaftar!');
            </script>
        ";
        return false;
    }
    
    // Enkripsi Password
    $no_ktp = password_hash($no_ktp, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO pasien VALUES('', '$nama', '$alamat', '$no_ktp', '$no_hp', '')");

    return mysqli_affected_rows($conn);
}
?>