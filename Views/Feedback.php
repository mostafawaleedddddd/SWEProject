<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Medira/Media/css/Feedback.css">
  <title>Feedback</title>
</head>
<body>
  
  <section class="content">
    <div class="feedback-description">
        <h1 class="title">Have a questions?</h1>
        <p class="subtitle">Leave a message and we will help!</p>
    </div>
    <form class="feedback-form">
        <input type="email" placeholder="Email" class="feedback-form__email" required />
        <textarea cols="30" class="feedback-form__message" name="text" placeholder="Message" rows="5" required></textarea>
        <button class="feedback-form__submit" type="submit">Submit</button>
    </form>
    <div id="feedbackList"></div>
  </section>
</body>
</html>
