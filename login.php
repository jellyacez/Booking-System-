<?php require('db.php'); ?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary: #000000;
            --secondary: #FFFFFF;
            --accent: #FF5E5B;
            --shadow: 8px 8px 0px var(--primary);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', monospace;
        }

        body {
            background-color: var(--secondary);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            border: 1px solid var(--primary);
            padding: 40px 30px;
            background-color: var(--secondary);
            box-shadow: var(--shadow);
            position: relative;
            border-radius: 12px;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 6px;
            left: 6px;
            right: -6px;
            bottom: -6px;
            border: 1px solid var(--primary);
            z-index: -1;
            border-radius: 12px;
        }

        h1 {
            color: var(--primary);
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--primary);
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--primary);
            background-color: var(--secondary);
            font-size: 16px;
            outline: none;
            transition: all 0.3s;
        }

        input:focus {
            box-shadow: 4px 4px 0px var(--primary);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--accent);
            color: var(--secondary);
            border: 2px solid var(--primary);
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s;
        }

        button:hover {
            box-shadow: 4px 4px 0px var(--primary);
            transform: translate(-2px, -2px);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: var(--primary);
            font-weight: bold;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 2px solid var(--primary);
            margin: 0 10px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border: 2px solid var(--primary);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .social-btn:hover {
            box-shadow: 4px 4px 0px var(--primary);
            transform: translate(-2px, -2px);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: var(--primary);
        }

        .footer a {
            color: var(--primary);
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
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