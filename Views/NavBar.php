<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : 'guest';

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: /Medira/Views/index.php"); // Redirect to the same page after logout
    exit;
}


?>

<div class="navbar">
    <div class="logo"><a href="/Medira/Views/index.php"><img src="/Medira/Media/images/LOGO.png"></a> </div>
    <ul>
        <?php if ($user_type == 'healthCare'): ?>
            <li><a href="/Medira/Views/index.php">Home</a></li>
            <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum</a></li>
            <li><button class="Signup" onclick="location.href='?logout=true';">Logout</button></li>
        <?php elseif ($user_type == 'patient'): ?>
            <li><a href="/Medira/Views/index.php">Home</a></li>
            <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum</a></li>
            <li><a href="/Medira/Views/ContactUs.php">Contact Us</a></li>
            <li><button class="Signup" onclick="location.href='?logout=true';">Logout</button></li>
        <?php else: ?>
            <li><a href="/Medira/Views/index.php">Home</a></li>
            <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum</a></li>
            <li><a href="/Medira/Views/ContactUs.php">Contact Us</a></li>
            <button class="Signup" onclick="location.href='/Medira/Views/signup.php';">SignUp</button>
            <button class="SignIn" onclick="location.href='/Medira/Views/login.php';">SignIn</button>
        <?php endif; ?>
    </ul>
</div>
