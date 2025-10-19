<?php
require "config.php";
$msg = "";
if($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $conn->query("INSERT INTO contacts(name,email,message) VALUES('$name','$email','$message')");
    $msg = "Thank you for your message!";
}
include "header.php";
?>
<h2>Contact Us</h2>
<form method="post">
    <input name="name" required placeholder="Your Name"><br>
    <input name="email" required type="email" placeholder="Your Email"><br>
    <textarea name="message" required placeholder="Message"></textarea><br>
    <button>Send</button>
</form>
<?php echo $msg; ?>
<?php include "footer.php"; ?>