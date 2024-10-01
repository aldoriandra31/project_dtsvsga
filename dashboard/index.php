<?php

require_once "./../application/init.php";

$status = $_SESSION["user"]["status"];
$role = $_SESSION["user"]["role"];

if($status != "anggota"){
    $path = BASE_PATH . "dashboard/logout.php";
    echo "<script>
        alert('Tunggu admin melakukan verifikasi data');
        document.location.href = '$path';
        </script>";

}else{
    if($role == "admin"){
        header("Location: " . BASE_PATH . "dashboard/admin");
    }else{
        header("Location: " . BASE_PATH . "dashboard/artikel");
    }
}
