<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : 'guest';
?>

<nav class="navbar">
    <div class="logo"><a href="/Medira/Views/index.php"><img src="/Medira/Media/images/LOGO.png"></a> </div>
    <ul>
        <?php if ($user_type == 'healthcare'): ?>
            <li><a href="/Medira/Views/index.php">Home</a></li>
            <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum</a></li>
        <?php elseif ($user_type == 'admin'): ?>
            <li><a href="/Medira/Views/Admin.php">Admin Home</a></li>
            <li><a href="/Medira/Views/Manage.php">Manage Users</a></li>
            <li><a href="/Medira/Views/Analytics.php">Analytics</a></li>
        <?php elseif ($user_type == 'patient'): ?>
            <li><a href="/">Home</a></li>
            <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum</a></li>
            <li><a href="/Medira/Views/ContactUs.php">Contact Us</a></li>
        <?php else: ?>
            <li><a href="/Medira/Views/index.php">Home</a></li>
            <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum</a></li>
            <li><a href="/Medira/Views/ContactUs.php">Contact Us</a></li>
            <button class="Signup" onclick="location.href='/Medira/Views/signup.php';">SignUp</button>
            <button class="SignIn" onclick="location.href='/Medira/Views/login.php';">SignIn</button>
        <?php endif; ?>
    </ul>
</nav>
