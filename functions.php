<?php
// Start session only if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Example users for validation (replace this with actual database logic in production)
$users = [
    "user1@gmail.com" => "password1",
    "user2@gmail.com" => "password2",
    "user3@gmail.com" => "password3",
    "user4@gmail.com" => "password4",
    "user5@gmail.com" => "password5"
];


?>

