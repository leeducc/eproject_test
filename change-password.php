<?php

$msg = "";

include 'php/dbconnect.php';

if (isset($_GET['reset'])) {
    $reset_token = $_GET['reset'];
    // Prepare select query to check if the reset token exists
    $select_query = mysqli_prepare($conn, "SELECT * FROM users WHERE code = ?");
    mysqli_stmt_bind_param($select_query, "s", $reset_token);
    mysqli_stmt_execute($select_query);
    $result = mysqli_stmt_get_result($select_query);

    if (mysqli_num_rows($result) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

            if ($password === $confirm_password) {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                // Prepare update query to update password and clear the reset token
                $update_query = mysqli_prepare($conn, "UPDATE users SET password_hash=?, code='' WHERE code=?");
                mysqli_stmt_bind_param($update_query, "ss", $hashed_password, $reset_token);
                mysqli_stmt_execute($update_query);

                // Check if the query was successful
                if (mysqli_stmt_affected_rows($update_query) > 0) {
                    // Password updated successfully, redirect to login page
                    header("Location: login.php");
                    exit; // Terminate script execution after redirection
                } else {
                    // Error occurred during password update
                    $msg = "<div class='alert alert-danger'>Error updating password. Please try again.</div>";
                }

                // Close the statement
                mysqli_stmt_close($update_query);
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Reset Link do not match.</div>";
    }
} else {
    header("Location: forgot-password.php");
    exit; // Terminate script execution after redirection
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="assets/css/auth_css.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/image3.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Change Password</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" type="submit">Change Password</button>
                        </form>
                        <div class="social-icons">
                            <p>Back to! <a href="login.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>
