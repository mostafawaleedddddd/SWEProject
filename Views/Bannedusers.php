<?php

if (!isset($_SESSION['user_type'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .icon {
            font-size: 64px;
            color: #ff0000;
            margin-bottom: 1rem;
        }
        h1 {
            color: #ff0000;
            margin-bottom: 1rem;
        }
        p {
            color: #333;
            margin-bottom: 1rem;
        }
        .contact {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <?php
    // You can add any necessary PHP logic here, such as checking if the user is actually banned
    $isBanned = true; // This should be set based on your actual logic
    ?>

    <div class="container">
        <?php if ($isBanned): ?>
            <div class="icon">🚫</div>
            <h1>Access Denied</h1>
            <p>We're sorry, but your account has been banned and you cannot access this website.</p>
            <p class="contact">If you believe this is an error, please contact our support team.</p>
        <?php else: ?>
            <p>You are not banned. You should be redirected to the main page.</p>
            <script>
                // Redirect to main page if not banned
                window.location.href = 'index.php';
            </script>
        <?php endif; ?>
    </div>
</body>
</html>