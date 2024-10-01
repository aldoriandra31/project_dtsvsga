<?php

require_once "./application/init.php";

$users = query("SELECT username, email FROM users WHERE role='anggota'");

?>

<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>

    <link rel="stylesheet" href="style.css">

    <style>
        table tbody tr td:last-child{
            width: 100px;
            height: 100px;
        }
        table tbody tr td img{
            width: 100%;
            height: 100%;
            object-fit: cover;
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
                <h1 class="title-article">Daftar Klien</h1>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach($users as $user): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $user["username"]; ?></td>
                            <td><?= $user["email"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </article>
        </main>
    </section>
</body>

</html>
