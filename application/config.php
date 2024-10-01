<?php

$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';

$base = $httpProtocol.'://'.$_SERVER['HTTP_HOST'].'/'.'profile company 2/';

define("BASE_PATH", $base);
define("DB_HOST", "localhost");
define("DB_USERNAME",  "root");
define("DB_PASSWORD", "");
define("DB_NAME", "db_my_company");
define("DB_PORT", "3306");
