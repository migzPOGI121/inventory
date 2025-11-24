<?php
session_start();
require "config/db.php";

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if($conn->query($sql)){
        $message = "Account created! You can now login.";
    } else {
        $message = "Error: Username or email already exists!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Inventory System</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

<div class="container">
    <h2>Create Account</h2>

    <?php if($message != ""): ?>
        <p class="message"><?= $message ?></p>
    <?php endif; ?>

    <form method="POST" id="registerForm">
        <input type="text" name="username" id="username" placeholder="Username" required>
        <input type="email" name="email" id="email" placeholder="Email Address" required>
        <input type="password" name="password" id="password" placeholder="Password" required>

        <button type="submit">Register</button>

        <div class="link">
            <a href="login.php">Back to Login</a>
        </div>
    </form>
</div>

<script src="js/register.js"></script>

</body>
</html>
