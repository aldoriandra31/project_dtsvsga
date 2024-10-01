<?php

require_once "./application/init.php";

$galleries = query("SELECT * FROM gallery");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .gallery-wrapper{
            display: grid;
            grid-template-columns: repeat(auto-fill, 250px);
            justify-content: center;
            gap: 12px;
            margin-top: 12px;
        }

        .gallery-wrapper .gallery-item img{
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
                <h1 class="title-article">Gallery Kami</h1>
                <div class="gallery-wrapper">
                    <?php foreach($galleries as $gallery): ?>
                    <div class="gallery-item">
                        <img src="<?= BASE_PATH . "/storage/gallery/" . $gallery["img"]; ?>" alt="<?= $gallery["title"]; ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </article>
        </main>
    </section>
</body>

</html>
