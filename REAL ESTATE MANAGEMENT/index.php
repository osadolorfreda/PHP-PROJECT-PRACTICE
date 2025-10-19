<?php
require "config.php";
include "header.php";
$res = $conn->query("SELECT * FROM properties WHERE status='approved' ORDER BY id DESC");
?>
<h2>Property Listings</h2>
<?php while($row = $res->fetch_assoc()): ?>
<div class="property-card">
    <img class="property-img" src="<?= htmlspecialchars($row['image']) ?>" />
    <h3><?= htmlspecialchars($row['title']) ?></h3>
    <b>Price:</b> $<?= number_format($row['price'],2) ?><br>
    <a class="btn" href="property.php?id=<?= $row['id'] ?>">Details</a>
</div>
<?php endwhile; ?>
<?php include "footer.php"; ?>