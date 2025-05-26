<?php
session_start();
require_once("settings.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = trim($_POST['username']);
    $input_password = trim($_POST['password']);
    if ($input_username === 'user' && $input_password === 'password') {
        $_SESSION['logged_in'] = true;
        header("Location: manage.php");
        exit();
    } else {
        echo "Login failed. Try again.";
    }
}
?>

<form method="POST" action="access.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
