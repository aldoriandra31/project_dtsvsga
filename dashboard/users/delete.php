<?php
require_once "./../../application/init.php";


$id = $_GET["id"];

statement("DELETE FROM users WHERE id=$id");

$path = BASE_PATH . "dashboard/users";
if(rowCount() > 0){
    echo "<script>
    alert('Data berhasil di hapus');
    document.location.href = '$path';
    </script>";
}else{
    echo "<script>
    alert('Data gagal di hapus');
    document.location.href = '$path';
    </script>";
}
