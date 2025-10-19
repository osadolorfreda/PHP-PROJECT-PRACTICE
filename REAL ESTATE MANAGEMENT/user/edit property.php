<?php
require "../config.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php"); exit;
}
if(!isset($_GET['id'])) die("Property not found.");
$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM properties WHERE id=$id AND posted_by=".$_SESSION['user_id']);
if($res->num_rows < 1) die("Property not found or permission denied.");
$p = $res->fetch_assoc();
include "../header.php";
$msg = "";
if($_SERVER['REQUEST_METHOD']=="POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $price = floatval($_POST['price']);
    $address = $_POST['address'];
    $type = $_POST['type'];
    $bedrooms = intval($_POST['bedrooms']);
    $bathrooms = intval($_POST['bathrooms']);
    $size = intval($_POST['size']);
    $img = $p['image'];
    if(isset($_FILES['image']) && $_FILES['image']['tmp_name']) {
        $img = "../uploads/".uniqid().basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'],$img);
    }
    $conn->query("UPDATE properties SET title='$title',description='$desc',price=$price,address='$address',image='$img',type='$type',bedrooms=$bedrooms,bathrooms=$bathrooms,size=$size,status='pending' WHERE id=$id");
    $msg = "Property updated! (Re-approval required)";
}
?>
<h2>Edit Property</h2>
<form method="post" enctype="multipart/form-data">
    <input class="form-input" name="title" value="<?=htmlspecialchars($p['title'])?>" required><br>
    <textarea class="form-input" name="description" required><?=htmlspecialchars($p['description'])?></textarea><br>
    <input class="form-input" name="price" type="number" value="<?=$p['price']?>" step="0.01" required><br>
    <input class="form-input" name="address" value="<?=htmlspecialchars($p['address'])?>" required><br>
    <input class="form-input" name="type" value="<?=htmlspecialchars($p['type'])?>" required><br>
    <input class="form-input" name="bedrooms" type="number" value="<?=$p['bedrooms']?>" required><br>
    <input class="form-input" name="bathrooms" type="number" value="<?=$p['bathrooms']?>" required><br>
    <input class="form-input" name="size" type="number" value="<?=$p['size']?>" required><br>
    <img src="<?=htmlspecialchars($p['image'])?>" class="property-img"><br>
    <input class="form-input" type="file" name="image"><br>
    <button class="btn">Update Property</button>
</form>
<?php echo $msg; ?>
<?php include "../footer.php"; ?>