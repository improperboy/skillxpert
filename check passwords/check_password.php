<?php
$entered_password = "admin1234"; // The password you are using to log in
$stored_hash = "$2y$10$1Z4RT6DPxMwS2W0U2qrti.rYKDxNECn5Tvx3xNWDPl/i9apcJuk4a"; // Copy from phpMyAdmin

if (password_verify($entered_password, $stored_hash)) {
    echo "✅ Password is correct!";
} else {
    echo "❌ Password is incorrect!";
}
?>
