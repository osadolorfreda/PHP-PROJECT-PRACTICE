<?php
require "config.php";
include "header.php";
if(!isset($_GET['id'])) die("Property not found.");
$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM properties WHERE id=$id");
if($res->num_rows < 1) die("Property not found.");
$p = $res->fetch_assoc();
?>
<h2><?= htmlspecialchars($p['title']) ?></h2>
<img class="property-img" src="<?= htmlspecialchars($p['image']) ?>" alt="Property Image" />
<p><b>Description:</b> <?= nl2br(htmlspecialchars($p['description'])) ?></p>
<p>
    <b>Price:</b> $<?= number_format($p['price'],2) ?><br>
    <b>Address:</b> <?= htmlspecialchars($p['address']) ?><br>
    <b>Type:</b> <?= htmlspecialchars($p['type']) ?><br>
    <b>Bedrooms:</b> <?= $p['bedrooms'] ?><br>
    <b>Bathrooms:</b> <?= $p['bathrooms'] ?><br>
    <b>Size:</b> <?= $p['size'] ?> sqft
</p>
<a class="btn" href="index.php">Back</a>
<?php include "footer.php"; ?>