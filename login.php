<?php
    require_once "./application/init.php";
    // var_dump($_SESSION);
    if(isset($_SESSION["login"]) && $_SESSION["login"]){
        header("Location: ./dashboard");
    }

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Get Users
        $user = query("SELECT * FROM users WHERE email='$email' LIMIT 1")[0];

        if(password_verify($password, $user["password"])){
            echo "<script>alert('Login Berhasil')</script>";
            unset($user["password"]);
            $_SESSION["login"] = true;
            $_SESSION["user"] = $user ;
            header("Location: ./dashboard");
        }else{
            echo "<script>alert('Login Gagal')</script>";
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
   <?php require_once "./partials/navbar.php" ?>
    <!-- MAIN -->
    <section class="content-wrapper">
        <!-- MAIN CONTENT -->
        <main>
            <div class="login-wrapper">
                <h1>Login</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <span style="margin: 20px auto; display: inline-block; font-size: 0.75em;" >Belum meiliki akun? <a href="register.php">buat akun</a></span>
                    <div class="">
                        <button type="submit" class="btn-submit" name="submit">Login</button>
                    </div>
                </form>
            </div>
        </main>
    </section>
</body>

</html>
