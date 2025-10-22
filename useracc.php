<?php
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];


    $sql = "Insert into (username,email,password,role) values(:username,:email,:password,:role";
    $stmt = $conn->prepare($sql);
}
