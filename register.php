<?php
session_start();
require('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <h1>Register New User</h1>

    <div class="login-container">
        <form method="POST">
            Username: <input type="text" name="username" required> <br> <br>
            Email: <input type="email" name="email" required> <br> <br>
            Password: <input type="password" name="password" required minlength="8" placeholder="Min. 8 Characters"> <br> <br>
            <button type="submit" name="register">Register</button>
        </form>
        Already have an account? <a href="login.php">Login here</a>
    </div>

</body>
<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password, ':role' => 'user']);

    $logs = $conn->prepare("INSERT INTO audit_logs (action, username) VALUES (:action, :username)");
    $logs->execute([':action' => 'Registered new user ' . $username, ':username' => $username]);

    echo "Registration Complete you can now <a href = 'login.php'>login</a>";
}
?>

</html>