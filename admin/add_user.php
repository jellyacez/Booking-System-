<?php
session_start();
require '../db.php';


if ($_SESSION['role'] != 'admin') {
    die("access denied! admins only");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user (admin)</title>
</head>

<body style="background-color:wheat;">
    <!--Add User From Admin-->
    <form method="POST">
        Username: <input type="text" required name="username"> <br><br>
        Email: <input type="email" required name="email"> <br><br>
        Password: <input type="password" required name="password" min="8"> <br><br>
        Role:
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <br><br>

        <button type="submit" name="adduser">ADD</button>
    </form>
    <!--End of Add User-->
    <a href="manage_users.php">go back</a>
</body>

</html>

<?php
//Process the Add User Form
if (isset($_POST['adduser'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];


    $sql = "INSERT INTO users(username, email, password, role) values(:username, :email, :password, :role)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password, ':role' => $role]);

    $logs = $conn->prepare("INSERT INTO audit_logs (action, username) VALUES (:action, :username)");
    $logs->execute([':action' => 'Added new user ' . $username, ':username' => $_SESSION['user']]);

    header("Location: manage_users.php");
}
?>