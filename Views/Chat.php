<?php
session_start();
if (!isset($_SESSION['user_type'])) {
   
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chatbot</title>
    <link rel="stylesheet" href="/Medira/Media/css/Chat.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="/Medira/Media/js/Chat.js" defer></script>
  </head>
  <body>  
  <button class="button" onclick="window.location.href='index.php'">Go Back</button>
  <div class="show-chatbot">
    <div class="chatbot">
      <!-- Toggle button to open/close the chatbot -->
      <span class="chatbot-toggler">Toggle Chatbot</span>
      <header>
        <h2>Chatbot</h2>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there <br>How can I help you today?<br>Please provide your symptoms</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>
  </div>
  </body>
</html>
