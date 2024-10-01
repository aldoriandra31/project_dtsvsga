<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .list-kontak {
            list-style: initial;
            padding-left: 2em;
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
                <h1 class="title-article">Kontak Kami</h1>
                <ul class="list-kontak">
                    <li><b>Alamat:</b> Jl. Teknologi No. 10, Jakarta, Indonesia</li>
                    <li><b>Email:</b> info@solusitekno.com</li>
                    <li><b>Telepon:</b> +62 21 1234 5678</li>
                    <li><b>Website:</b> www.solusitekno.com</li>
                    <li><b>LinkedIn:</b> linkedin.com/company/solusitekno</li>
                    <li><b>Instagram:</b> @solusitekno</li>

                </ul>
            </article>
        </main>
    </section>
</body>

</html>
