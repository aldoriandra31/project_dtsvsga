<?php

$conn = mysqli_connect(
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME,
    DB_PORT
);

if(!$conn){
    die("Conenction failde ". mysqli_connect_error());
}
