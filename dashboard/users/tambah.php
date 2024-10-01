<?php
    require_once "./../../application/init.php";

    if(!isset($_SESSION["login"]) && !$_SESSION["login"] && !$_SESSION["user"]){
        header("Location: " . BASE_PATH . "index.php");
    }

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role_id = $_POST["role"];

         // Get Roles
         $roles = query("SELECT * FROM roles WHERE id=$role_id");
         $role_name = $roles[0]["role"];

         // Encrypt Password
         $hashPassword = password_hash($password, PASSWORD_DEFAULT);

         statement("INSERT INTO users (username, email, password, status, role_id, role)
                     VALUES ('$username', '$email', '$hashPassword', 'anggota', $role_id, '$role_name') ");
         if(rowCount() > 0){
            $path = BASE_PATH . "dashboard/users";
             echo "<script>
                alert('Data Berhasil ditambahkan');
                document.location.href = '$path';
             </script>";
            //  header("Location: " . BASE_PATH . "dashboard/admin");
         }else{
             echo "<script>alert('Data Gagal Ditambahkan')</script>";
         }
    }

    // GET ROLES
    $roles = query("SELECT * FROM roles");

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
        <h1>Tambah Users</h1>

        <form class="beautiful-form" action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="">Select a role</option>
                    <?php foreach($roles as $role): ?>
                        <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn-apply" type="submit" name="submit">Tambah</button>
        </form>

    </main>

  <script>

  </script>
</body>
</html>
