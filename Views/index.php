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
  <title>Medira</title>
</head>
<body>
  <div id="navbar">
  <?php include "NavBar.php"; ?>
  </div>
  <div class="image-container">
     
    <p><b>Welcome to Medira</b></p>
    <h2>Empowering healthcare professionals and patients with accurate medical <br>answers. Discover how our NLP-driven system enhances clinical decision-<br>making.</h2>
    <div class="button-container">
        <button id="start"class="Started" onclick="location.href='/Signup';">Get Started</button>
    </div>
  </div>
  <footer>
    <div class="footer-content">
      <h3><img src="/Medira/Media/images/LOGO.png" alt="Medira Logo" class="footer-logo"></h3> 
      <nav>
        <ul>
          <li><a href="/DiscussionForum">Discussion Forum</a></li>
        </ul>
      </nav>
      <p>&copy; 2024 Medira. All rights reserved. </p>Empowering healthcare professionals and patients with reliable medical information.
    </div>
  </footer>
  <div class="feedback-button" id="feedbackButton" onclick="location.href='/Feedback';">Feedback</div>  
</body>
</html>
