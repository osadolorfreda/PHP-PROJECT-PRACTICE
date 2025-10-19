<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php"); exit;
}
include "../header.php";
?>
<h2>Admin Dashboard</h2>
<ul>
    <li><a href="properties.php">Manage Properties</a></li>
    <li><a href="users.php">Manage Users</a></li>
    <li><a href="messages.php">View Contact Messages</a></li>
</ul>
<?php include "../footer.php"; ?>