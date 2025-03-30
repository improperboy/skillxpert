<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $hashed_password, $role);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["user_name"] = $name;
        $_SESSION["user_role"] = $role;

        if ($role === "admin") {
            echo json_encode(["status" => "success", "redirect" => "admin_dashboard.php"]);
        } else {
            echo json_encode(["status" => "success", "redirect" => "user_dashboard.php"]);
        }
    } 
    else {
        echo json_encode(["status" => "error", "message" => "Invalid email or password!"]);
    }

    $stmt->close();
}
$conn->close();
?>

