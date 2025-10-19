<?php
require "config.php";
$msg = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn->query("INSERT INTO users(username,password,role) VALUES('$username','$password','user')");
    $msg = "Registration successful. <a href='login.php'>Login here</a>.";
}
include "header.php";
?>
<h2>User Registration</h2>
<form method="post">
    <input name="username" required placeholder="Username"><br>
    <input name="password" type="password" required placeholder="Password"><br>
    <button>Register</button>
</form>
<?php echo $msg; ?>
<?php include "footer.php"; ?>