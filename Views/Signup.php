<?php
require_once '../Models/User.php';
require_once '../Controllers/User.php';

$model = new User();
$controller = new UserController($model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Medira</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
    <link rel="stylesheet" href="/Medira/Media/css/signup.css">
    <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <!-- phone number , gender , date of birth ,name , email , password -->
    <div id="navbar">
    <?php include "NavBar.php"; ?>
    </div>

    <div class="center-container">
        <div class="container">
            <h1 class="form-title">Register</h1>
            <form action="Signup.php?action=insert" method="post" onsubmit="">
                <div class="main-user-info">
                    <div class="user-input-box">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name" required />
                    </div>
                    <div class="user-input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email" required />
                    </div>
                    <div class="user-input-box">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number"
                            required />
                    </div>
                    <div class="user-input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required />
                    </div>
                </div>

                <div class="gender-details-box">
                    <span class="gender-title">Date of Birth</span>
                    <br>
                    <div class="gender-category">
                        <select id="day" name="day" required>
                            <option value="">Day</option>
                            <script>
                                for (let i = 1; i <= 31; i++) {
                                    document.write('<option value="' + i + '">' + i + '</option>');
                                }
                            </script>
                        </select>
                        <select id="month" name="month" required>
                            <option value="">Month</option>
                            <script>
                                const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                for (let i = 1; i <= 12; i++) {
                                    document.write('<option value="' + i + '">' + months[i - 1] + '</option>');
                                }
                            </script>
                        </select>
                        <select id="year" name="year" required>
                            <option value="">Year</option>
                            <script>
                                const currentYear = new Date().getFullYear();
                                for (let i = 1944; i <= currentYear; i++) {
                                    document.write('<option value="' + i + '">' + i + '</option>');
                                }
                            </script>
                        </select>
                    </div>
                    <br>
                    <span class="gender-title">Gender</span>
                    <div class="gender-category">
                        <input type="radio" name="gender" value="Male" id="male">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="Female" id="female">
                        <label for="female">Female</label>
                
                    </div>

                </div>
                <div class="form-submit-btn">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</body>

</html>