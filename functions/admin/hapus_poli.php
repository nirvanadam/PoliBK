<?php 
require 'admin_functions.php';

$id = $_GET["id"];

if(hapus_poli($id) > 0){
     echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = '../../pages/admin/admin_manage_poli.php';
            </script>
        ";
} else{
     echo "
            <script>
                alert('Data gagal dihapus!');
                 document.location.href = '../../pages/admin/admin_manage_poli.php';
            </script>
        ";
}
 ?>