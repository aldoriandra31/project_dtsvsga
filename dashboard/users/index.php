<?php
    require_once "./../../application/init.php";

    if(!isset($_SESSION["login"]) && !$_SESSION["login"] && !$_SESSION["user"]){
        header("Location: " . BASE_PATH . "index.php");
    }

    $users = query("SELECT * FROM users WHERE role='anggota'");

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
        <h1>Daftar User</h1>

        <div class="tambah-wrapper">
            <a class="btn-tambah"href="<?= BASE_PATH . 'dashboard/users/tambah.php' ?>" >+ Tambah</a>
        </div>

        <table class="styled-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $i = 1;
            foreach($users as $user): ?>
            <?php if($user["id"] == $_SESSION["user"]["id"]){continue;} ?>
            <tr>
                <th><?= $i++; ?></th>
                <td><?= $user["username"]; ?></td>
                <td><?= $user["email"]; ?></td>
                <td><?= $user["status"]; ?></td>
                <td class="btn-action">
                    <a href="<?= BASE_PATH . "dashboard/users/edit.php?id=" . $user["id"]; ?>" class="btn-edit">edit</a>
                    <form action="<?= BASE_PATH . "dashboard/users/delete.php" ?>" method="get" onsubmit="return confirm('apakah anda yakin menghapus data?')">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
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
