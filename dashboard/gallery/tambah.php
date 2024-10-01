<?php
    require_once "./../../application/init.php";

    if(!isset($_SESSION["login"]) && !$_SESSION["login"] && !$_SESSION["user"]){
        header("Location: " . BASE_PATH . "index.php");
    }

    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $user_id = $_SESSION["user"]["id"];
        $author = $_SESSION["user"]["username"];

        if($_FILES["image"]["error"] === 4){
            echo "<script>alert('Gambar tidak ada')</script>";
        }else{
            $filename = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExntesion = ["jpg", "jpeg", "png"];
            $imageExtension = explode(".", $filename);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExntesion)){
                echo "<script>alert('Invalid image extension')</script>";
            }else if($fileSize > 1024 * 1024 * 10){
                echo "<script>alert('Ukuran image terlalu besar')</script>";
            }else{
                $newImageName = uniqid();
                $newImageName .= "." . $imageExtension;

                move_uploaded_file($tmpName, "./../../storage/gallery/" . $newImageName);
                statement("INSERT INTO gallery (author, title, img, user_id) VALUES
                            ('$author', '$title', '$newImageName', $user_id)");
                if(rowCount() > 0){
                    $path = BASE_PATH . "dashboard/gallery";
                     echo "<script>
                        alert('Data Berhasil ditambahkan');
                        document.location.href = '$path';
                     </script>";
                    //  header("Location: " . BASE_PATH . "dashboard/admin");
                 }else{
                     echo "<script>alert('Data Gagal Ditambahkan')</script>";
                 }
            }
        }


    }


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
        <h1>Tambah Gallery</h1>

        <form class="beautiful-form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" value="" required>
            </div>
            <button class="btn-apply" type="submit" name="submit">Tambah</button>
        </form>

    </main>

  <script>

  </script>
</body>
</html>
