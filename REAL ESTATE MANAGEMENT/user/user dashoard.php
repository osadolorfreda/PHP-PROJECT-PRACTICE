<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php"); exit;
}
include "../header.php";
// Fetch user's properties
$uid = $_SESSION['user_id'];
$res = $conn->query("SELECT * FROM properties WHERE posted_by=$uid");
?>
<h2>My Properties</h2>
<a href="add_property.php" class="btn">Add New Property</a>
<table border="1">
    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $res->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['status'] ?? 'pending') ?></td>
        <td>
            <a href="edit_property.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="delete_property.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<?php include "../footer.php"; ?>