<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php"); exit;
}
if(!isset($_GET['id'])) die("User not found.");
$id = intval($_GET['id']);
$conn->query("DELETE FROM users WHERE id=$id AND role='user'");
header("Location: users.php");
exit;
?>