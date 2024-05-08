<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: home.php");
    die();
}

require 'assets/vendor/autoload.php';
include 'php/dbconnect.php';
$msg = "";

if (isset($_POST['submit'])) {
    $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
    $confirm_password = isset($_POST['confirm-password']) ? mysqli_real_escape_string($conn, $_POST['confirm-password']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';
    $dob = isset($_POST['dob']) ? mysqli_real_escape_string($conn, $_POST['dob']) : '';
    $code = md5(rand());

    if ($password !== $confirm_password) {
        $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
    } else {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address already exists.</div>";
        } else {
            $hashed_password = md5($password); // Hash the password

            $sql = "INSERT INTO users (username, email, password_hash, address, phone, dob, code) 
                    VALUES ('{$username}', '{$email}', '{$hashed_password}', '{$address}', '{$phone}', '{$dob}', '{$code}')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $mail = new PHPMailer(true);

                try {
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'leminhduc1212001@gmail.com';
                    $mail->Password   = 'xwmevapsofdidzjn';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;

                    $mail->setFrom('leminhduc1212001@gmail.com');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Verifi email';
                    $mail->Body    = 'Here is the verification link <b><a href="http://localhost/epro/eproject_test/login.php/?verification=' . $code . '">http://localhost/epro/eproject_test/login.php/?verification=' . $code . '</a></b>';

                    $mail->send();
                    $msg = "<div class='alert alert-info'>We've sent a verification link to your email address.</div>";
                } catch (Exception $e) {
                    $msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Something went wrong.</div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
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
                            <img src="images/image2.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="text" class="username" name="username" placeholder="Enter Your Username" value="<?php if (isset($_POST['submit'])) {
                                                                                                                            echo $username;
                                                                                                                        } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) {
                                                                                                                        echo $email;
                                                                                                                    } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Confirm Your Password" required>
                            <input type="text" class="address" name="address" placeholder="Enter Your Address" required>
                            <input type="text" class="phone" name="phone" placeholder="Enter Your Phone" required>
                            <input type="date" class="dob" name="dob" placeholder="Enter Your Date of Birth" required>
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Already have an account? <a href="login.php">Login</a>.</p>
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
        $(document).ready(function(c) {
            $('.alert-close').on('click', function(c) {
                $('.main-mockup').fadeOut('slow', function(c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>
