<?php require('db.php'); ?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    
    <title>Document</title>
</head>

<body class="login-body">
    <div class="login-container">
        <h1>LOGIN</h1>

        <div class="input-group">
            <label for="em"></label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="input-group">
            <label for="password">PASSWORD</label>
            <input type="password" id="password" placeholder="••••••••" required>
        </div>

        <button type="submit" name="login">SIGN IN</button>

        <div class="divider">OR</div>

        <div class="social-login">
            <div class="social-btn">G</div>
            <div class="social-btn">F</div>
            <div class="social-btn">X</div>
        </div>

        <div class="footer">
            Don't have an account? <a href="register.php">Sign up</a>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['login'])) {

    $sql = "select * from users where username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $_POST['username']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "X Invalid username or password!";
    }
}


?>


