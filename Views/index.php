<?php
session_start();
if (!isset($_SESSION['user_type'])) {
  $_SESSION['user_type'] = 'guest';
}
$user_type = $_SESSION['user_type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/Medira/Media/js/index.js" defer></script>
  <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
  <link rel="stylesheet" href="/Medira/Media/css/Styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Medira</title>
</head>

<body>
  <!-- Navbar -->
  <div id="navbar">
    <?php include "NavBar.php"; ?>
  </div>

  <!-- Slider Section -->
  <div class="slider-area position-relative" style="background-image: url('/Medira/Media/images/h1_hero.png');">
    <div class="slider-active">
      <!-- Single Slider -->
      <div class="single-slider slider-height d-flex align-items-center">
        <div class="container">
          <div >
            <div >
              <div class="hero__caption">
                <span>Committed to success</span>
                <h1 class="cd-headline letters scale">We care about your 
                  <strong class="cd-words-wrapper">
                    <b class="is-visible">health</b>
                    <b>sushi</b>
                    <b>steak</b>
                  </strong>
                </h1>
                <p data-animation="fadeInLeft" data-delay="0.1s">
                  Empowering healthcare professionals and patients with accurate medical <br>answers. Discover how our NLP-driven
                  system enhances clinical decision-<br>making.
                </p>
                <!-- Button Container -->
                <div class="button-container">
                  <?php if ($user_type == 'healthcare'): ?>
                    <!-- Add a button for healthcare user type if needed -->
                  <?php elseif ($user_type == 'admin'): ?>
                    <!-- Add a button for admin user type if needed -->
                  <?php elseif ($user_type == 'patient'): ?>
                    <button class="started" 
                            onclick="location.href='/Medira/Views/Chat.php';" 
                            data-animation="fadeInLeft" data-delay="0.5s" 
                            style="animation-delay: 0.5s;"> 
                      Start Chatting 
                      <i class="fa-solid fa-arrow-right"></i>
                    </button>
                  <?php else: ?>
                    <button class="started" 
                            onclick="location.href='/Medira/Views/Signup.php';" 
                            data-animation="fadeInLeft" data-delay="0.5s" 
                            style="animation-delay: 0.5s;"> 
                      Get Started 
                      <i class="fa-solid fa-arrow-right"></i>
                    </button>
                  <?php endif; ?>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <!-- Footer Start -->
<div class="footer-area section-bg" data-background="/Medira/Media/images/A_black_image.jpg">
    <div class="container">
        <div class="footer-top footer-padding">
            <div class="row d-flex justify-content-between">
                <!-- Logo Section -->
                    <div class="single-footer-caption mb-50">
                        <!-- logo -->
                        <div class="footer-logo">
                            <a href="#"><img src="/Medira/Media/images/LOGO-footer.png" alt=""></a>
                        </div>
                    </div>
                <!-- About Us Section -->
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>About Us</h4>
                            <div class="footer-pera">
                                <p class="info1">
                                Helping healthcare professionals and patients access accurate medical information.</p>
                                <p class="info1">See how our NLP-driven technology supports better clinical decision-making.</p>
                            </div>
                        </div>
                    </div>
                <!-- Phone Number and Email Section -->
                    <div class="single-footer-caption mb-50">
                        <div class="footer-number-mb-50">
                            <h4><span>+20 </span>115 648 226</h4>
                            <p>Medira @outlook.com</p>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="row d-flex justify-content-between align-items-center">
                    <div class="footer-copy-right">
                        <p>
                            Copyright &copy; 2024 Medira. All rights reserved. Empowering healthcare professionals and patients with reliable
                            medical information.
                        </p>
                    </div>
                    <!-- Footer Social -->
                    <div class="footer-social f-right">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fas fa-globe"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End-->
</footer>

  <!-- Feedback Button -->
  <!-- <div class="feedback-button" id="feedbackButton" onclick="location.href='/Medira/Views/Feedback.php';">Feedback</div> -->
</body>
</html>
