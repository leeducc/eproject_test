<?php
include 'php/config.php';
?>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!--Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="home.php"><?php echo $websiteName; ?><span>.</span></a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Intro</a></li>
          <li><a class="nav-link scrollto" href="about-us.html">About</a></li>
          <li><a class="nav-link scrollto" href="#product">Product</a></li>
          <li class="dropdown">
            <a href="#"><span>Content</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-search nav__search" id="search-btn"></i>
        <?php
        if (isset($_SESSION['SESSION_EMAIL'])) {
          echo '<div class="dropdown">';
          echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">';
          echo '<i class="bi bi-person-fill"></i>'; // User icon
          echo '</button>';
          echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
          echo '<li><a class="dropdown-item" href="#">Profile</a></li>';
          echo '<li><a class="dropdown-item" href="#">Cart</a></li>';
          echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>'; // Logout link
          echo '</ul>';
          echo '</div>';
        } else {
          echo '<i class="bi bi-person nav__login" id="login-btn"></i>';
        }
        ?>

        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->

    </div>

  </header><!-- End Header -->
  <!--==================== SEARCH ====================-->
  <div class="search" id="search">
    <i class="bi bi-x search__close" id="search-close"></i>
    <form action="" class="search__form">
      <i class="bi bi-search search__icon"></i>
      <input type="search" placeholder="What are you looking for?" class="search__input">
    </form>
  </div>

  <!--==================== LOGIN ====================-->
  <div class="login" id="login">
    <i class="bi bi-x login__close" id="login-close"></i>
    <form action="" class="login__form">
      <h2 class="login__title">Log In</h2>

      <div class="login__group">
        <div>
          <label for="email" class="login__label">Email</label>
          <input type="email" placeholder="Write your email" id="login_email" class="login__input">
        </div>

        <div>
          <label for="password" class="login__label">Password</label>
          <input type="password" placeholder="Enter your password" id="login_password" class="login__input">
        </div>
      </div>

      <div>
        <p class="login__signup">
          You do not have an account? <a href="register.php">Register</a>
        </p>

        <a href="#" class="login__forgot">
          You forgot your password?
        </a>

        <button type="submit" class="login__button">Log In</button>
      </div>
    </form>
  </div>



  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Product Details</h2>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <?php
    include 'php/dbconnect.php';


    if (isset($_GET['product_id'])) {
      // Sanitize the input to prevent SQL injection
      $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);

      $query = "SELECT * FROM products WHERE product_id = '$product_id'";

      $result = mysqli_query($conn, $query);


      if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        // Output product details within the HTML structure
    ?>
        <!-- ======= Product Details Section ======= -->
        <section id="product-details" class="product-details">
          <div class="container">
            <div class="row gy-4">
              <div class="col-lg-8">
                <div class="product-details-slider swiper">
                  <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide">
                      <img src="<?php echo $row['image']; ?>" alt="">
                    </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="product-info">
                  <h3>Product information</h3>
                  <ul>
                    <li><strong>Category:</strong> <?php echo $row['category_id']; ?></li>
                    <li><strong>Tag:</strong> <?php echo $row['tag']; ?></li>
                    <li><strong>Price:</strong> <?php echo $row['price']; ?></li>
                    <li><strong>Quantity:</strong> <?php echo $row['quantity']; ?></li>
                    <li>
                      <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                      </form>
                    </li>
                  </ul>
                </div>
                <div class="product-description">
                  <h2>Product description</h2>
                  <p><?php echo $row['description']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </section><!-- End product Details Section -->
    <?php
      } else {
        // If no product found with the given ID
        echo "Product not found.";
      }
    } else {
      // If product_id is not set in the URL
      echo "Product ID not specified.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">

      <div class="footer-newsletter">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <h4>Join Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              <form action="subscribe.php" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3><?php echo $websiteName; ?><span>.</span></h3>
              <p>
                <?php echo nl2br($address); ?><br><br>
                <strong>Phone:</strong> <?php echo $phone; ?><br>
                <strong>Email:</strong> <?php echo $email; ?><br>
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Productions</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Submit your post</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Social Networks</h4>
              <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
              <div class="social-links mt-3">
                <?php foreach ($socialLinks as $social => $link) { ?>
                  <a href="<?php echo $link; ?>" class="<?php echo $social; ?>"><i class="bx bxl-<?php echo $social; ?>"></i></a>
                <?php } ?>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="container py-4">
        <div class="copyright">
          &copy; Copyright <strong><span><?php echo $websiteName; ?></span></strong>. All Rights Reserved
        </div>
      </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!--Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>