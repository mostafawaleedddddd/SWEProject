<?php
require_once '../Models/User.php';
require_once '../Controllers/User.php';
require_once '../Media/js/signup.php'; // Include validation file

$model = new User();
$controller = new UserController($model);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input data
    $errors = validateSignupData($_POST);

    // If no errors, proceed to the controller
    if (empty($errors)) {
        $controller->insert();
        header("Location: /Medira/Views/Signedup.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Medira</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Medira/Media/css/signup.css">
    <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
</head>

<body>
    <div id="navbar">
        <?php include "NavBar.php"; ?>
    </div>

    <div class="center-container">
        <div class="container">
            <h1 class="form-title">Register</h1>
            <form action="Signup.php" method="post">
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
                        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" required />
                    </div>
                    <div class="user-input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required />
                    </div>
                </div>

                <div class="gender-details-box">
                    <span class="gender-title">Date of Birth</span>
                    <div class="gender-category">
                        <select id="day" name="day" required>
                            <option value="">Day</option>
                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <select id="month" name="month" required>
                            <option value="">Month</option>
                            <?php
                            $months = [
                                "January", "February", "March", "April", "May",
                                "June", "July", "August", "September", "October", "November", "December"
                            ];
                            foreach ($months as $index => $month) :
                            ?>
                                <option value="<?php echo $index + 1; ?>"><?php echo $month; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select id="year" name="year" required>
                            <option value="">Year</option>
                            <?php for ($i = 1944; $i <= date("Y"); $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <span class="gender-title">Gender</span>
                    <div class="gender-category">
                        <input type="radio" name="gender" value="Male" id="male">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" value="Female" id="female">
                        <label for="female">Female</label>
                        <input type="radio" name="gender" value="Other" id="other">
                        <label for="other">Other</label>
                    </div>
                </div>
                <div class="form-submit-btn">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>

    <!-- Show errors as JavaScript alerts -->
    <?php if (!empty($errors)) : ?>
        <script>
            <?php foreach ($errors as $error) : ?>
                alert("<?php echo addslashes($error); ?>");
            <?php endforeach; ?>
        </script>
    <?php endif; ?>
</body>

</html>
