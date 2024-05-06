<?php
include 'php/config.php';
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
      // Check if user is logged in
      if (isset($_SESSION['user_id'])) {
        // If logged in, display user icon with dropdown menu
        ?>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill"></i> <!-- User icon -->
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Cart</a></li>
            <li><a class="dropdown-item" href="login_process.php?logout=true">Logout</a></li> <!-- Logout link -->
          </ul>
        </div>
        <?php
      } else {
        // If not logged in, display login button
        ?>
        <i class="bi bi-person nav__login" id="login-btn"></i>
      <?php } ?>

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
        You do not have an account? <a href="login_signup.html#sign-up-form">Sign up</a>
      </p>

      <a href="#" class="login__forgot">
        You forgot your password?
      </a>

      <button type="submit" class="login__button">Log In</button>
    </div>
  </form>
</div>



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>RainRenew</span></h1>
      <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h2>
      <div class="d-flex">
        <a href="#product" class="btn-get-started scrollto">Get Started</a>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <!-- <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section>End Featured Services Section -->


    <?php
    // Include database connection file
    include_once 'php/dbconnect.php';

    // Query to fetch categories
    $sql_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($conn, $sql_categories);

    // Function to fetch products with category names
    function fetchProductsWithCategories($conn)
    {
      $sql_products = "SELECT p.*, c.category_name 
                     FROM products p
                     INNER JOIN categories c ON p.category_id = c.category_id";
      $result_products = mysqli_query($conn, $sql_products);
      return $result_products;
    }

    ?>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="product-filters">
          <li data-filter="*" class="filter-active">All</li>
          <?php while ($row = mysqli_fetch_assoc($result_categories)) { ?>
            <li data-filter=".filter-<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>

    <div class="row product-container" data-aos="fade-up" data-aos-delay="200">
      <?php
      // Fetch products with category names
      $all_products = fetchProductsWithCategories($conn);

      // Function to generate product HTML
      function generateProductHTML($row)
      {
        echo '<div class="col-lg-4 col-md-6 product-item filter-' . $row['category_name'] . '">';
        echo '<img src="' . $row['image'] . '" class="img-fluid" alt="">';
        echo '<div class="product-info">';
        echo '<h4>' . $row['product_name'] . '</h4>';
        echo '<p>' . $row['price'] . '</p>';
        echo '<a href="#" class="add-to-cart" data-product-id="' . $row['product_id'] . '"><i class="bx bx-plus"></i></a>';
        echo '<a href="product-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>';
        echo '</div></div>';
      }

      // Generate HTML for all products
      while ($product_row = mysqli_fetch_assoc($all_products)) {
        generateProductHTML($product_row);
      }

      // Close database connection
      mysqli_close($conn);
      ?>
    </div>



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Contact Us</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>contact@example.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6">
            <form action="php/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

          <div id="popup-message" style="display: none;">
            Message inserted successfully
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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