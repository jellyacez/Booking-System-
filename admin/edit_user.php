<?php
require '../db.php';
$id = $_GET['id'];

$stmt = $conn->query("Select * from users where id=:id");
$stmt->execute([':id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $update = $conn->prepare("UPDATE users where Set username=:username,email=:email,role=:role where id=:id");
    $update->execute([':username' => $username, ':email' => $email, ':role' => $role]);
    echo "User updated";
}
?>
<form method="POST">
    Username: <input type="text" name="username" value="<?= $username['username'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $email['email'] ?>"><br>
    Role: <select name="role">
        <option value="user" <? $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
        <option value="admin" <? $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
    </select> <br> <br>
    <button name="update">Update</button>
</form>