<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Login</h2>

<?php
if(isset($_SESSION['error'])){
    echo "<p class='error'>".$_SESSION['error']."</p>";
    unset($_SESSION['error']);
}
?>

<form action="auth/login.php" method="POST">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

<br>
<a href="#" id="createAccount">Create Account</a>

<script>
// Redirect to register.php when clicking link
document.getElementById("createAccount").addEventListener("click", function(e){
    e.preventDefault();        // stop default link behavior
    window.location.href = "register.php";  // go to register.php
});
</script>

</body>
</html>
