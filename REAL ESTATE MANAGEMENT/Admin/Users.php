<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php"); exit;
}
include "../header.php";
$res = $conn->query("SELECT * FROM users");
?>
<h2>All Users</h2>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $res->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= htmlspecialchars($row['role']) ?></td>
        <td>
            <?php if($row['role'] != 'admin'): ?>
            <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete user?')">Delete</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<?php include "../footer.php"; ?>