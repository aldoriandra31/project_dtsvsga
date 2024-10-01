<?php
    require_once "./../../application/init.php";

    if(!isset($_SESSION["login"]) && !$_SESSION["login"] && !$_SESSION["user"]){
        header("Location: " . BASE_PATH . "index.php");
    }

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $newPassword = $_POST["password"];
        $role_id = $_POST["role"];
        $user_id = $_POST["id"];

         // Get Roles
         $roles = query("SELECT * FROM roles WHERE id=$role_id");
         $role_name = $roles[0]["role"];

         // Encrypt Password
         if($newPassword != ""){
            $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            statement("UPDATE users SET
                                username='$username',
                                email='$email',
                                password='$hashPassword',
                                role_id=$role_id,
                                role='$role_name'
                        WHERE id=$user_id");
         }else{
            statement("UPDATE users SET
                                username='$username',
                                email='$email',
                                role_id=$role_id,
                                role='$role_name'
                        WHERE id=$user_id");
         }

         $path = BASE_PATH . "dashboard/admin";
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

    // GET ROLES
    $user_id = $_GET["id"];
    $roles = query("SELECT * FROM roles");
    $user = query("SELECT * FROM users WHERE id=$user_id")[0];

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
        <h1>Edit Admin</h1>

        <form class="beautiful-form" action="" method="post">
            <input type="hidden" name="id" value="<?= $user["id"]; ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?= $user["username"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?= $user["email"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="">Select a role</option>
                    <?php foreach($roles as $role): ?>
                        <?php if($user["role_id"] == $role["id"]): ?>
                            <option value="<?= $role['id']; ?>" selected><?= $role['role']; ?></option>
                        <?php else: ?>
                            <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn-apply" type="submit" name="submit">Edit</button>
        </form>

    </main>

  <script>

  </script>
</body>
</html>
