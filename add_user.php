<?php
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];


    $sql = "INSERT INTO (username,email,password,role) values(:username,:email,:password,:role";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username, ':email' => $email, ':password' => $password, ':role' => $role]);

    echo "you are now pregnant";
}
?>
<form method="POST">
    Username: <input type="text" required name="username">
    Email: <input type="email" required name="username">
    Password: <input type="password" required name="username" min="8">
    Role <select name="Role">
        <option value="user"></option>
        <option value="admin"></option>
</form>