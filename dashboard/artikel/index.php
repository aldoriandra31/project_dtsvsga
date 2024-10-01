<?php
    require_once "./../../application/init.php";

    if(!isset($_SESSION["login"]) && !$_SESSION["login"] && !$_SESSION["user"]){
        header("Location: " . BASE_PATH . "index.php");
    }

    $user_id = $_SESSION["user"]["id"];
    $artikels = query("SELECT * FROM artikel WHERE user_id=$user_id");

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
        <h1>Kelola Artikel</h1>

        <div class="tambah-wrapper">
            <a class="btn-tambah"href="<?= BASE_PATH . 'dashboard/artikel/tambah.php' ?>" >+ Tambah</a>
        </div>

        <table class="styled-table">
        <thead>
            <tr>
                <th>No</th>
                <th>judul</th>
                <th>author</th>
                <th>dibuat pada</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $i = 1;
            foreach($artikels as $artikel): ?>
            <tr>
                <th><?= $i++; ?></th>
                <td><?= $artikel["title"]; ?></td>
                <td><?= $artikel["author"]; ?></td>
                <td><?= $artikel["created_at"]; ?></td>
                <td class="btn-action">
                    <a href="<?= BASE_PATH . "dashboard/artikel/edit.php?id=" . $artikel["id"]; ?>" class="btn-edit">edit</a>
                    <form action="<?= BASE_PATH . "dashboard/artikel/delete.php" ?>" method="get" onsubmit="return confirm('apakah anda yakin menghapus data?')">
                        <input type="hidden" name="id" value="<?= $artikel['id']; ?>">
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- table rows will be added here -->
            <?php endforeach ?>
        </tbody>
        </table>


    </main>

  <script>

  </script>
</body>
</html>
