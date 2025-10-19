<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php"); exit;
}
if(!isset($_GET['id'])) die("Property not found.");
$id = intval($_GET['id']);
$conn->query("UPDATE properties SET status='approved' WHERE id=$id");
header("Location: properties.php");
exit;
?>