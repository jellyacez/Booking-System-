<?php require('db.php');
session_start();
?>
<!-- DEBUG STATUS: ONGOING -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Log In</title>
</head>

<body class="login-body">
    <div>
        <header>
            <h1>Pampanga State University</h1>
        </header>
    </div>

    <div class="login-container">
        <form method="POST">

            <h1>LOGIN</h1>

            <div class="input-group">
                <label for="em">USERNAME</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="input-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="login" name="login">SIGN IN</button>


        </form>
        <?php

        if (isset($_POST['login'])) {

            $sql = "SELECT username, password, role from users WHERE BINARY username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':username' => $_POST['username']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'admin') {
                    header("Location: admin/dashboard.php");
                    exit();
                } else {
                    header("Location: index.php");
                    exit();
                }
            } else {
                echo '<div style="color:red; text-align:center; margin-top:15px;">&#10006; Invalid username or password!</div>';
            }
        }

        ?>
        <div class="divider">OR</div>

        <div class="alternate-login">
            <div class="social-login">
                <div class="social-btn">G</div>
                <div class="social-btn">F</div>
                <div class="social-btn">X</div>
            </div>


            <div class="footer">
                Don't have an account? <a href="register.php">Sign up</a>
            </div>
        </div>
    </div>

</body>

</html>