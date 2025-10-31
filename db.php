<?php
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=localhost; dbname=bookingsystem_db", $username, $password);
    $conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
} catch (PDOException $e) {
    echo "connection failed " . $e->getMessage();
}


