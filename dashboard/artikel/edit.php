<?php
    require_once "./../../application/init.php";

    if(!isset($_SESSION["login"]) && !$_SESSION["login"] && !$_SESSION["user"]){
        header("Location: " . BASE_PATH . "index.php");
    }

    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $content =  trim($_POST["content"]);
        $artikel_id = $_POST["artikel_id"];
        $user_id = $_SESSION["user"]["id"];
        $author = $_SESSION["user"]["username"];

        statement("UPDATE artikel SET
                                author='$author',
                                title='$title',
                                content='$content'
                        WHERE id=$artikel_id");

         $path = BASE_PATH . "dashboard/artikel";
         if(rowCount() > 0){
             echo "<script>
                alert('Data Berhasil diupdate');
                document.location.href = '$path';
                </script>";
                //  header("Location: " . BASE_PATH . "dashboard/admin");
            }else{
                echo "<script>
                alert('Data Gagal Diupdate');
                document.location.href = '$path';
             </script>";
         }
    }

    // GET ARTIKEL
    $id = $_GET["id"];
    $artikel = query("SELECT * FROM artikel WHERE id=$id")[0];

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
        <h1>Edit Artikel</h1>

        <form class="beautiful-form" action="" method="post">
            <input type="hidden" name="artikel_id" value="<?= $id; ?>">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?= $artikel["title"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" required><?= $artikel["content"]; ?></textarea>
            </div>
            <button class="btn-apply" type="submit" name="submit">Edit</button>
        </form>

    </main>

  <script>

  </script>
</body>
</html>
