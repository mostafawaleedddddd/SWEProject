<?php
require_once '../Models/ContactUs.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $name=$_POST["name"];
 $username=$_POST["username"];
 $message=$_POST["message"];
 $model=new Contact($name,$message,$username);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="/Medira/Media/css/Styles.css">
  <link rel="stylesheet" href="/Medira/Media/css/Feedback.css">
  <link rel="stylesheet" href="/Medira/Media/css/ContactUs.css">
  <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
</head>

<body>
  <div id="navbar">
    <?php include "NavBar.php"; ?>
  </div>
  <div class="container">
    <div class="left-content">
      <h3>Get in touch</h3>
      <p>We are here for you! Now can we help?</p>
      <form action="ContactUs.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <label for="email">Email</label>
        <input type="email" name="username" id="email">

        <label for="message">Message</label>
        <textarea name="message" id="textarea" rows="5" cols="50"></textarea>
        <input class="btn" type="submit" value="Submit">
      </form>
    </div>
    <div class="right-content">
      <img src="/Medira/Media/images/Contact us-amico.png">
      <div class="contact-info">
        <div>
          <i class="ri-map-pin-line"></i>
          <span> 54 share3 Mabna Almain gnb far8al </span>
        </div>
        <div>
          <i class="ri-phone-fill"></i>
          <span> 45465462561</span>
        </div>
        <div>
          <i class="ri-mail-line"></i>
          <span> medira@outlook.com</span>
        </div>
      </div>
    </div>
  </div>
  <div class="social-btns">
    <a href="">
      <i class="ri-facebook-fill"></i>
    </a>
    <a href="">
      <i class="ri-instagram-line"></i>
    </a>
    <a href="">
      <i class="ri-linkedin-fill"></i>
    </a>
  </div>
  <div class="feedback-button" id="feedbackButton" onclick="location.href='/Medira/Views/Feedback.php';">Feedback</div>
</body>

</html>