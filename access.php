<?php
session_start();

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);
    $query = "SELECT * FROM users WHERE username='$input_username' AND password='$input_password'";
    $result = mysqli_query($conn,$query)

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $input-username;
        header("Location: manage.php");
        exit();
    } else {
        echo "Login failed. Try again.";
    }
}
?>