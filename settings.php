<?php
$host = "localhost";
$user = "root";
$pwd = "";
$sql_db = "eoi";

// Create connection
$conn = new mysqli($host, $user, $pwd, $sql_db);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
