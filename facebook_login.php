<?php
require 'vendor/autoload.php';
include "config.php";

use League\OAuth2\Client\Provider\Facebook;

session_start();

$facebook = new Facebook([
    'clientId'        => '1631774954152382',
    'clientSecret'    => '73bd49bb1fcda418b564404c0eae68c9',
    'redirectUri'     => 'http://localhost/skillxpert/facebook_login.php',
    'graphApiVersion' => 'v17.0'
]);

if (!isset($_GET['code'])) {
    // 🔥 Request email and public profile permissions
    $authUrl = $facebook->getAuthorizationUrl([
        'scope' => ['email', 'public_profile'] 
    ]);

    $_SESSION['oauth2state'] = $facebook->getState();
    header('Location: ' . $authUrl);
    exit;
} else {
    try {
        $token = $facebook->getAccessToken('authorization_code', ['code' => $_GET['code']]);
        $user = $facebook->getResourceOwner($token);
        $userArray = $user->toArray(); // Convert to array

        // 🔥 Fetch user details
        $id = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail(); // Email might be NULL
        $profile_picture = "https://graph.facebook.com/" . $id . "/picture?type=large"; // Fetch Facebook Profile Picture

        // 🔥 Ensure email is not NULL
        if (empty($email)) {
            $email = $id . "@facebook.com"; // Assign a fake email if not provided
        }

        // Check if user exists in DB
        $stmt = $conn->prepare("SELECT id FROM users WHERE oauth_id = ? AND oauth_provider = 'facebook'");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            // Insert user with profile picture
            $stmt = $conn->prepare("INSERT INTO users (name, email, oauth_provider, oauth_id, profile_picture) VALUES (?, ?, 'facebook', ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $id, $profile_picture);
            $stmt->execute();
        }

        // 🔹 Store user data in session
        $_SESSION["user_name"] = $name;
        $_SESSION["user_picture"] = $profile_picture;

        header("Location: user_dashboard.php");
        exit();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
