<?php
require "config.php";
$msg = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $res = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    if($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        if($row['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
        exit;
    } else {
        $msg = "Invalid login.";
    }
}
include "header.php";
?>
<h2>Login</h2>
<form method="post">
    <input name="username" required placeholder="Username"><br>
    <input name="password" type="password" required placeholder="Password"><br>
    <button>Login</button>
</form>
<?php echo $msg; ?>
<?php include "footer.php"; ?>