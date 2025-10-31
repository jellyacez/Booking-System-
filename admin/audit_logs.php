<?php
session_start();
require("../db.php");

if ($_SESSION['role'] != 'admin') {
    die("access denied! admins only");
}

$stmt = $conn->query("select * from audit_logs ORDER by id Desc");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Logs</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>

<body>
    <h2>Audit Logs </h2>
    <a href="dashboard.php">BACK TO DASHBOARD</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Action</th>
            <th>Timestamp</th>
        </tr>
        <!--Shows the Audit Logs-->
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['action'] ?></td>
                <td><?= $row['log_time'] ?></td>
            </tr>
        <?php endwhile; ?>
</body>

</html>