<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    $_SESSION['user_type'] = 'guest'; 
}
$user_type = $_SESSION['user_type']; 
?>
<html>

<head>
	<link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
</head>

<body>
	<nav class="navbar">
		<div class="logo"><a href="/Medira/Views/index.php"><img src="/Medira/Media/images/LOGO.png"></a> </div>
		<ul>
            <?php if ($user_type == 'healthcare'): ?>
                <li><a href="/Medira/Views/index.php">Home</a></li>
                <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum </a></li>
            <?php elseif ($user_type == 'admin'): ?>
                <li><a href="/Medira/Views/Admin.php">Admin Home</a></li>
                <li><a href="/Manage">Manage Users</a></li>
                <li><a href="/Medira/Views/Analytics.php">Analytics</a></li>
            <?php elseif ($user_type == 'patient'): ?>
                <li><a href="/">Home</a></li>
                <li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum </a></li>
                <li><a href="/Medira/Views/ContuctUs.php">Contuct Us</a></li>
            <?php else: ?>
				<li><a href="/Medira/Views/index.php">Home</a></li>
				<li><a href="/Medira/Views/DiscussionForum.php">Discussion Forum </a></li>
                <li><a href="/Medira/Views/ContuctUs.php">Contuct Us</a></li>
				<button class="Signup" onclick="location.href='/Medira/Views/signup.php';">SignUp</button>
				<button class="SignIn" onclick="location.href='/Medira/Views/login.php';">SignIn</button>
            <?php endif; ?>
        </ul>
	</nav>
</body>

</html>