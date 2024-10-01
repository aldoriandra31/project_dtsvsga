<?php
// require_once "./DatabaseConnection.php";

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//untuk cek berhasil atau tidak?
function rowCount(){
    global $conn;
    return mysqli_affected_rows($conn);
}

//tidak mengembalikan data
function statement($query){
    global $conn;
    mysqli_query($conn,$query);
    if (rowCount() <= 0){
        die(mysqli_error($conn));
    }
}
