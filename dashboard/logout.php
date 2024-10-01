<?php

require_once "./../application/init.php";
unset($_SESSION["login"]);
unset($_SESSION["user"]);
session_destroy();
header("Location: " . BASE_PATH . "index.php");
