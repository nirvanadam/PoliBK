<?php 
require 'admin_functions.php';

$id = $_GET["id"];

if(hapus_obat($id) > 0){
     echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = '../../pages/admin/admin_manage_obat.php';
            </script>
        ";
} else{
     echo "
            <script>
                alert('Data gagal dihapus!');
                 document.location.href = '../../pages/admin/admin_manage_obat.php';
            </script>
        ";
}
 ?>