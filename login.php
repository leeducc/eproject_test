<?php
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: home.php");
    die();
}

include 'php/dbconnect.php';
$msg = "";

if (isset($_GET['verification'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
        
        if ($query) {
            $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
        }
    } else {
        header("Location: login.php");
    }
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch the hashed password from the database based on the provided email
    $sql = "SELECT password_hash FROM users WHERE email='{$email}'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password_hash'];

        // Verify the entered password against the hashed password retrieved from the database
        if (password_verify($password, $hashed_password)) {
            // Passwords match, user is authenticated
            // Check if the account is verified
            $sql = "SELECT * FROM users WHERE email='{$email}' AND code = ''";
            $result_verified = mysqli_query($conn, $sql);

            if ($result_verified && mysqli_num_rows($result_verified) === 1) {
                // Account is verified, set session and redirect to home
                $_SESSION['SESSION_EMAIL'] = $email;
                header("Location: home.php");
                exit; // Terminate script execution after redirection
            } else {
                // Account not verified
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        } else {
            // Passwords do not match
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    } else {
        // No user found with the provided email
        $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
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
                            <img src="images/image.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Login Now</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="submit" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account! <a href="register.php">Register</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="../assets/js/jquery.min.js"></script>
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
