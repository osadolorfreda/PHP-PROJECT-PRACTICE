<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php"); exit;
}
if(!isset($_GET['id'])) die("Property not found.");
$id = intval($_GET['id']);
$conn->query("DELETE FROM properties WHERE id=$id AND posted_by=".$_SESSION['user_id']);
header("Location: dashboard.php");
exit;
?>