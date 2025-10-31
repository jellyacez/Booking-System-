<?php
session_start();
require('../db.php');

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
    <div class="container">
        <header id="navbar">
            <h1>Welcome, <?= $_SESSION['user']; ?>!</h1>
            <ul>
                <li><a href="manage_users.php">User Management</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="audit_logs.php">Audit Logs</a></li>
                <li><a id="lgOutbtn" href="../logout.php">Logout</a></li>

            </ul>
        </header>
        <p>Your role: <strong><?= $_SESSION['role']; ?></strong></p>
        <div class="grid">
            <div class="card">
                <h3>Total Users: <?= $totalUsers; ?></h3>

            </div>
            <div class="card">
                <h3>Audit Logs: <?= $totalLogs; ?></h3>
            </div>
        </div>
        <!--Gawin Menu nalang to? Like Side Nav or Nav Bar  Here-->
        <div class="card">
            <h3> Quick Links</h3>

        </div>
        <!-- Up to here -->
    </div>
    <script>

    </script>


    <h3>Total Users</h3>

    <h3>Active Users</h3>

    <h3>Recent Users</h3>
    <table style="border: 1;" cellpadding>
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

</body>



</html>