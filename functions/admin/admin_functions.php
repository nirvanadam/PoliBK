<?php 
require "../../connection.php";

function query($query){
    global $conn;
    $data_pack = mysqli_query($conn, $query);
    $data = [];
    while ($item = mysqli_fetch_assoc($data_pack)) {
        $data[] = $item;
    }
    return $data;
}

// Fungsi Obat
function tambah_obat($data_form){
    global $conn;

     // Ambil data dari tiap elemen dalam form
    $nama_obat = htmlspecialchars($data_form["nama_obat"]);
    $kemasan = htmlspecialchars($data_form["kemasan"]);
    $harga = htmlspecialchars($data_form["harga"]);

    // Query insert data
    $query = "INSERT INTO obat VALUES ('', '$nama_obat', '$kemasan', '$harga')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_obat($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM obat WHERE id = $id");
    
    return mysqli_affected_rows($conn); 
}

function edit_obat($data_form){
    global $conn;

    // Ambil data dari tiap elemen dalam form
    $id = $data_form["id"]; 
    $nama_obat = htmlspecialchars($data_form["nama_obat"]);
    $kemasan = htmlspecialchars($data_form["kemasan"]);
    $harga = htmlspecialchars($data_form["harga"]);

    // Query insert data
    $query = "UPDATE obat SET nama_obat = '$nama_obat', kemasan = '$kemasan', harga = '$harga' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Obat End

// Fungsi Poli
function tambah_poli($data_form){
    global $conn;

     // Ambil data dari tiap elemen dalam form
    $nama_poli = htmlspecialchars($data_form["nama_poli"]);
    $keterangan = htmlspecialchars($data_form["keterangan"]);

    // Query insert data
    $query = "INSERT INTO poli VALUES ('', '$nama_poli', '$keterangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_poli($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM poli WHERE id = $id");
    
    return mysqli_affected_rows($conn); 
}

function edit_poli($data_form){
    global $conn;

    // Ambil data dari tiap elemen dalam form
    $id = $data_form["id"]; 
    $nama_poli = htmlspecialchars($data_form["nama_poli"]);
    $keterangan = htmlspecialchars($data_form["keterangan"]);

    // Query insert data
    $query = "UPDATE poli SET nama_poli = '$nama_poli', keterangan = '$keterangan' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// Fungsi Poli End
?>