<?php
    require_once "./../../application/init.php";

    if(!isset($_SESSION["login"]) && !$_SESSION["login"] && !$_SESSION["user"]){
        header("Location: " . BASE_PATH . "index.php");
    }

    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $content =  trim($_POST["content"]);
        $user_id = $_SESSION["user"]["id"];
        $author = $_SESSION["user"]["username"];

         statement("INSERT INTO artikel (author, title, content, user_id)
                     VALUES ('$author', '$title', '$content', $user_id) ");
         if(rowCount() > 0){
            $path = BASE_PATH . "dashboard/artikel";
             echo "<script>
                alert('Data Berhasil ditambahkan');
                document.location.href = '$path';
             </script>";
            //  header("Location: " . BASE_PATH . "dashboard/admin");
         }else{
             echo "<script>alert('Data Gagal Ditambahkan')</script>";
         }
    }

    $author = $_SESSION["user"]["username"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="<?= BASE_PATH . 'dashboard/dashboard.css' ?>">

</head>
<body>
    <?php include_once "../../partials/dashboard-header-sidebar.php" ?>
    <!-- Main Content -->
    <main>
        <h1>Buat Artikel</h1>

        <form class="beautiful-form" action="" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <button class="btn-apply" type="submit" name="submit">Tambah</button>
        </form>

    </main>

  <script>

  </script>
</body>
</html>
