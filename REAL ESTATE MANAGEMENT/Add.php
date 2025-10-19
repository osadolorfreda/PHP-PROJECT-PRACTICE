<?php
require 'config.php';
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO contacts (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        $msg = "Error: " . $conn->error;
    }
}
?>
<h2>Add New Contact</h2>
<form method="post">
    Name: <input name="name" required> <br>
    Email: <input name="email"> <br>
    Phone: <input name="phone"> <br>
    <button>Add Contact</button>
</form>
<?php echo $msg; ?>
<a href="index.php">Back to List</a>