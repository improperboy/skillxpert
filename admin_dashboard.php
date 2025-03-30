<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_role"] !== "admin") {
    header("Location: login.html");
    exit();
}
?>
<h1>Welcome Admin, <?php echo $_SESSION["user_name"]; ?>!</h1>
<a href="logout.php">Logout</a>
