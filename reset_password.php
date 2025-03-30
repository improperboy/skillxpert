<?php
include "config.php";

if (isset($_GET["token"])) {
    $token = $_GET["token"];
} else {
    die("❌ Invalid Token");
}

// Check if token exists
$stmt = $conn->prepare("SELECT email FROM users WHERE reset_token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($email);
$stmt->fetch();

if ($stmt->num_rows == 0) {
    die("❌ Invalid or Expired Token");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE email = ?");
    $stmt->bind_param("ss", $new_password, $email);
    $stmt->execute();
    echo "<p class='success'>✅ Password has been reset successfully! <a href='login.html'>Login</a></p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | SkillXpert</title>
<style>
    /* General Styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f7fc;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

.container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
    box-sizing: border-box;
}

h2 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

input[type="password"] {
    padding: 12px;
    font-size: 1rem;
    border: 2px solid #ddd;
    border-radius: 5px;
    margin-bottom: 15px;
    transition: border 0.3s ease;
}

input[type="password"]:focus {
    border-color: #4CAF50;
    outline: none;
}

button {
    padding: 12px;
    font-size: 1rem;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

/* Success message styling */
.success {
    background-color: #e8f7e7;
    color: #4CAF50;
    padding: 10px;
    margin-top: 20px;
    border-radius: 5px;
    font-size: 1.1rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    h2 {
        font-size: 1.6rem;
    }

    input[type="password"], button {
        font-size: 0.95rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 15px;
    }

    h2 {
        font-size: 1.4rem;
    }

    input[type="password"], button {
        font-size: 0.9rem;
    }
}

</style>
</head>
<body>

    <div class="container">
        <h2>Reset Your Password 🔄</h2>
        <form method="POST">
            <input type="password" name="password" placeholder="Enter New Password" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>

</body>
</html>
