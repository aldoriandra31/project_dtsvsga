<?php

require_once "./application/init.php";

if(!isset($_GET["id"])){
    header("Location: artikel.php");
}

$id = $_GET["id"];
$artikel = query("SELECT * FROM artikel WHERE id=$id")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .list-article{
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 12px;
        }

        .list-article .article{
            display: block;
            width: 100%;
            background-color: var(--white2);
            padding: 12px;
            border-radius: 4px;
            color: #000;
            transition: all 0.2s;
        }

        .list-article .article:hover{
            box-shadow:  4px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .list-article .article p{
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            display: -webkit-box;
        }

        .judul{
            font-size: 3em;
        }

        .info{
            display: flex;
            justify-content: space-between;
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
                <h1 class="judul"><?= $artikel["title"]; ?></h1>
                <div class="info">
                    <span>Author : <?= $artikel["author"]; ?></span>
                    <span>Published on : $<?= $artikel["created_at"]; ?></span>
                </div>

                <p>
                    <?= $artikel["content"]; ?>
                </p>
            </article>
        </main>
    </section>
</body>

</html>
