<?php
session_start();
if (!isset($_SESSION['user_type'])) {
  $_SESSION['user_type'] = 'guest';
}
$user_type = $_SESSION['user_type'];
echo "Welcome to Index!<br>";
echo "User type: " . ($_SESSION['user_type'] ?? 'guest');
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <title>Medira</title>
</head>

<body>
  <div id="navbar">
    <?php include "NavBar.php"; ?>
  </div>
  <div class="image-container">

    <p><b>Welcome to Medira</b></p>
    <h2>Empowering healthcare professionals and patients with accurate medical <br>answers. Discover how our NLP-driven
      system enhances clinical decision-<br>making.</h2>
    <div class="button-container">
      <?php if ($user_type == 'healthcare'): ?>

      <?php elseif ($user_type == 'admin'): ?>

      <?php elseif ($user_type == 'patient'): ?>
        <button id="start" class="Started" onclick="location.href='/Medira/Views/Chat.php';">Start Chatting</button>
      <?php else: ?>
        <button id="start" class="Started" onclick="location.href='/Medira/Views/Signup.php';">Get Started</button>
      <?php endif; ?>
    </div>
  </div>
  <footer>
    <div class="footer-content">
      <h3><img src="/Medira/Media/images/LOGO.png" alt="Medira Logo" class="footer-logo"></h3>
      <nav>
        <ul>
          <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum</a></li>
        </ul>
      </nav>
      <p>&copy; 2024 Medira. All rights reserved. </p>Empowering healthcare professionals and patients with reliable
      medical information.
    </div>
  </footer>
  <div class="feedback-button" id="feedbackButton" onclick="location.href='/Medira/Views/Feedback.php';">Feedback</div>
</body>

</html>