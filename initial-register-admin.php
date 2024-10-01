<?php
    require_once "./application/init.php";
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Get Roles
        $roles = query("SELECT * FROM roles WHERE role='admin'");
        $role_id = $roles[0]["id"];
        $role_name = $roles[0]["role"];

        // Encrypt Password
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);




        statement("INSERT INTO users (username, email, password, status, role_id, role)
                    VALUES ('$username', '$email', '$hashPassword', 'anggota', $role_id, '$role_name') ");
        if(rowCount() > 0){
            echo "<script>alert('Registrasi Berhasil')</script>";
            header("Location: index.php");
        }else{
            echo "<script>alert('Registrasi Gagal coba lagi')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>

    <link rel="stylesheet" href="style.css">

    <style>
        main{
            float: none;
            display: block;
            width: max-content;
            min-width: 400px;
            margin: auto;
            border-radius: 20px;
            padding: 20px;
            background-color: var(--white2);
        }

        .login-wrapper{
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: center;
        }

        .login-wrapper h1{
            font-size: 2em;
            font-weight: 500;
        }

        form{
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .login-wrapper .form-group{
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
    </style>
</head>

<body>
    <!-- MAIN -->
    <section class="content-wrapper">
        <!-- MAIN CONTENT -->
        <main>
            <div class="login-wrapper">
                <h1>Register Admin</h1>
                <form action="" method="post" >
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="username">email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="">
                        <button type="submit" class="btn-submit" name="submit">Register</button>
                    </div>
                </form>
            </div>
        </main>
    </section>
</body>

</html>
