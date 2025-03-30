<?php
// Plaintext password
$plaintext_password = "admin1234";

// Generate a hashed password using the PASSWORD_BCRYPT algorithm
$hashed_password = password_hash($plaintext_password, PASSWORD_BCRYPT);

// Output the hashed password
echo "Hashed Password: " . $hashed_password;
?>