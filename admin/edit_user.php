<?php
session_start();
require('../db.php');
$id = $_GET['id'];

$stmt = $conn->prepare("Select * from users where id=:id");
$stmt->execute([':id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <!--Start of Edit User-->
    <form method="POST">
        Username: <input type="text" name="username" value="<?= $user['username'] ?>"><br>
        Email: <input type="email" name="email" value="<?= $user['email'] ?>"><br>
        Role: <select name="role">
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>> User</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>> Admin</option>
        </select> <br> <br>
        <button name="update">Update</button>
    </form>
    <!--End of Edit User-->
</body>

</html>

<?php
//Process the Edit User Form
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $update = $conn->prepare("UPDATE users SET username=:username, email=:email, role=:role where id=:id");
    $update->execute([':username' => $username, ':email' => $email, ':role' => $role, ':id' => $id]);

    $logs = $conn->prepare("INSERT INTO audit_logs (action, username) VALUES (:action, :username)");
    $logs->execute([':action' => 'Updated user ' . $username, ':username' => $_SESSION['user']]);

    echo "User updated";
    header("Location: manage_users.php");
}
?>