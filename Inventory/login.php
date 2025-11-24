<?php
session_start();
require "config/db.php";

$error = "";

// Handle login submit
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $query->fetch_assoc();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Inventory System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if($error != ""): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" placeholder="Username" name="username" required>
        <input type="password" placeholder="Password" name="password" required>

        <button type="submit">Login</button>

        <div class="link">
            <a href="register.php">Create Account</a>
        </div>
    </form>
</div>

</body>
</html>
