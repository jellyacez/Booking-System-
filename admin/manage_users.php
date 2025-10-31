<?php
session_start();
require("../db.php");

if ($_SESSION['role'] != 'admin') {
    die("access denied! admins only");
}

$stmt = $conn->query("select * from users ORDER by id Desc");
?>

<!DOCTYPE HTML>
<hmtl>

    <head>
        <title>User management </title>
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
        <h2>User Management </h2>
        <a href="add_user.php">ADD NEW USER</a>
        <a href="dashboard.php">BACK TO DASHBOARD</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <!--Shows the Users-->
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td> <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this user?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>

    </html>