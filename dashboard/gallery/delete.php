<?php
require_once "./../../application/init.php";


$id = $_GET["id"];

$data = query("SELECT * FROM gallery WHERE id=$id")[0];
$storage_dir = "./../../storage/gallery/";
unlink($storage_dir . $data["img"]);
statement("DELETE FROM gallery WHERE id=$id");

$path = BASE_PATH . "dashboard/gallery";
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
