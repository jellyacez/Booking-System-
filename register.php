<?php
require('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>

<body>
    <h2>Register New User</h2>
    <form method="POST">
        Username: <input type="text" name="username" required> <br> <br>
        Email: <input type="email" name="email" required> <br> <br>
        Password: <input type="password" name="register" required> <br> <br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
nigga
<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username, email, password) values(:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password]);

    echo "Registration Complete you can now <a href = 'login.php'>login</a>";
}
?>

</html>