<?php
// Start the session
session_start();

// Include the database connection file
include 'dbconnect.php';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Retrieve user data from the database based on email
    $sql = "SELECT user_id, password_hash FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();
        
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variable to indicate user is logged in
            $_SESSION['user_id'] = $user_id;
            // Redirect to home page
            header("Location: ../home.php");
            exit(); // Ensure script stops execution after redirection
        } else {
            $error_message = "Incorrect email or password.";
        }
    } else {
        $error_message = "User not found.";
    }
    $stmt->close();
}

// Handle logout
if (isset($_GET['logout'])) {
    // Unset session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect to login page or any other page
    header("Location: ../login_signup.html");
    exit(); // Ensure script stops execution after redirection
}

// Close the database connection
$conn->close();
?>
