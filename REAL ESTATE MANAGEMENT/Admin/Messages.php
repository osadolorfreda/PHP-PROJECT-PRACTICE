<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php"); exit;
}
include "../header.php";
$res = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");
?>
<h2>Contact Messages</h2>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
    </tr>
    <?php while($row = $res->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td><?= htmlspecialchars($row['created_at']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<?php include "../footer.php"; ?>