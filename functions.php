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

// Function to validate login credentials
function validate_login($email, $password) {
    global $users;
    return isset($users[$email]) && $users[$email] === $password;
}

// Guard function to check login status and redirect to index if not logged in
// Function to get the logged-in user's email
function getUserEmail() {
    return $_SESSION['user_email'] ?? ''; // Return the user's email if set
}

// Function to process the login form
function process_login_form() {
    $error_message = "";

    // Only process if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check for empty fields and validate email format
        if (empty($email) || empty($password)) {
            $error_message = "<br>- Email is required<br>- Password is required";
        } elseif (!str_ends_with($email, '@gmail.com')) {
            $error_message = "<br>- Invalid Email format";
        } elseif (!validate_login($email, $password)) {
            $error_message = "<br>- Invalid Email or Password";
        } else {
            // Successful login
            $_SESSION['user_email'] = $email;  // Store user's email in session

            // Redirect to the dashboard page
            header("Location: dashboard.php");
            exit;
        }
    }
    return $error_message;

?>

