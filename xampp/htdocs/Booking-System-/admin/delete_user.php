<?php
// deletes user from the database
require('../db.php');
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM users where id=:id");
$stmt->execute([':id' => $id]);

$logs = $conn->prepare("INSERT INTO audit_logs (action, username) VALUES (:action, :username)");
$logs->execute([':action' => 'Deleted user with ID ' . $id, ':username' => $_SESSION['user']]);

header("Location: manage_users.php");
exit;
