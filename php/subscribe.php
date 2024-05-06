<?php
include 'dbconnect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email form
    $email = $_POST['email'];

    // Check if email exists in the user table
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // User already exists, update user status to subscriber
        $updateQuery = "UPDATE users SET status = 'subscriber' WHERE email = '$email'";
        mysqli_query($conn, $updateQuery);
    } 

    // Insert email into subscribers table 
    $insertQuery = "INSERT INTO subscribers (email) VALUES ('$email')";
    mysqli_query($conn, $insertQuery);
    header("Location: ../home.php");
}
?>
