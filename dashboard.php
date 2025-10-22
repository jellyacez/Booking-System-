<?php
session_start();
require 'db.php';

if (isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}


// Count total users
$totalUsers = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();

// Count total logs
$totalLogs = $conn->query("SELECT COUNT(*) FROM audit_logs")->fetchColumn();

?>

<!DOCTYPE html>
<html>

<head>
    <title>System Dashboard</title>
</head>

<body>
    <div class="container">
        <h2>Welcome, <?= $_SESSION['user']; ?>!</h2>
        <p>Your role: <strong><?= $_SESSION['role']; ?></strong></p>
        <div class="grid">
            <div class="card">
                <h3>Total Users</h3>
                <p><?= $totalUsers; ?></p>
            </div>
            <div class="card">
                <h3>Audit Logs</h3>
                <p><?= $totallogs; ?></p>
            </div>
        </div>
        <div class="card">
            <h3> Quick Links</h3>
            <ul>
                <li><a href="manage_users.php">User Management</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</body>

</html>


<h3>Recent Users</h3>
<table border="1" cellpadding>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Date Registered</th>
    </tr>

    <?php
    $stmt = $conn->query("SELECT * FROM users ORDER BY created_at DESC LIMIT 5");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo " <tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['created_at']}</td></tr>";
    }
    ?>
</table>