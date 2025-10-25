<?php
require 'db.php';
$id =$_GET['id'];

$stmt = $conn->prepare("delete from users while id=:id");
$stmt-> execute([':id'=> $id]);

header("Location: manage_users.php");
exit;
?>
