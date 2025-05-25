<?php
$host = "localhost";
$user = "root";
$pwd = "";
$sql_db = "process_eoi.php"; 

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}