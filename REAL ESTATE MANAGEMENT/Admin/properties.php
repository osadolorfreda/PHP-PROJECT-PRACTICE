<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php"); exit;
}
include "../header.php";
$res = $conn->query("SELECT * FROM properties ORDER BY id DESC");
?>
<h2>All Properties</h2>
<table border="1">
    <tr>
        <th>Title</th>
        <th>Owner ID</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $res->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= $row['posted_by'] ?></td>
        <td><?= htmlspecialchars($row['status']) ?></td>
        <td>
            <a href="edit_property.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="delete_property.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete property?')">Delete</a>
            <?php if($row['status']!='approved'): ?>
            <a href="approve_property.php?id=<?= $row['id'] ?>">Approve</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<?php include "../footer.php"; ?>