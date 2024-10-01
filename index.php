<?php
    require_once "./application/init.php";

    $data = query("SELECT * FROM users WHERE role='admin' LIMIT 1");
    if(count($data) == 0){
        header("Location: initial-register-admin.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .jumbotron{
            width: 100%;
        }

        .jumbotron h2{
            font-size: 4em;
            color: var(--secondary);
        }
    </style>
</head>

<body>
   <?php require_once "./partials/navbar.php" ?>
    <!-- MAIN -->
    <section class="content-wrapper">
        <!-- SIDEBAR -->
        <?php require_once "./partials/aside.php" ?>
        <!-- MAIN CONTENT -->
        <main>
            <article>
                <section class="jumbotron">
                    <h2>Selamat datang di <br>PT. Solusi Teknoalogi Inovatif</h2>
                    <p>PT. Solusi Teknologi Inovatif didirikan pada tahun 2010 oleh sekelompok profesional IT yang berpengalaman dengan tujuan untuk menyediakan solusi teknologi terdepan bagi bisnis di seluruh Indonesia. Dengan latar belakang yang kuat dalam pengembangan perangkat lunak dan konsultasi IT, perusahaan ini telah berkembang menjadi salah satu penyedia solusi digital terkemuka, melayani berbagai sektor mulai dari manufaktur, keuangan, hingga kesehatan.</p>
                </section>
            </article>
        </main>
    </section>
</body>

</html>
