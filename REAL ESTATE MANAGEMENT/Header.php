<?php
?>
<!DOCTYPE html>
<html>

<head>
    <title>Real Estate Management System</title>
    <style>
    body {
        font-family: Arial;
        margin: 0;
        padding: 0;
        background: #f6f7fb;
    }

    .topnav {
        background: #333;
        color: #fff;
        padding: 15px;
    }

    .topnav a {
        color: #fff;
        margin: 0 15px;
        text-decoration: none;
    }

    .container {
        max-width: 900px;
        margin: 30px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
    }

    .btn {
        padding: 7px 20px;
        background: #007BFF;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        border: none;
    }

    .btn-danger {
        background: #dc3545;
    }

    .property-img {
        max-width: 200px;
        max-height: 150px;
    }

    .form-input {
        width: 300px;
        padding: 5px;
        margin: 7px 0;
    }

    .property-card {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 6px;
        background: #fafbfc;
    }
    </style>
</head>

<body>
    <div class="topnav">
        <a href="/index.php">Home</a>
        <a href="/about.php">About Us</a>
        <a href="/contact.php">Contact</a>
        <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'): ?>
        <a href="/admin/dashboard.php">Admin Dashboard</a>
        <a href="/logout.php">Logout</a>
        <?php elseif(isset($_SESSION['role']) && $_SESSION['role']=='user'): ?>
        <a href="/user/dashboard.php">User Dashboard</a>
        <a href="/logout.php">Logout</a>
        <?php else: ?>
        <a href="/register.php">Register</a>
        <a href="/login.php">Login</a>
        <?php endif; ?>
    </div>
    <div class="container">