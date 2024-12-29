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
    } else {
        // Store the errors in the session
        session_start();
        $_SESSION['errors'] = $errors;

        // Redirect to the signup page to display the errors
        header("Location: /Medira/Views/Signup.php");
        exit;
    }
}

$currentYear = date("Y");
$currentMonth = date("m");
$currentDay = date("d");
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
                            <?php
                            // Check if the selected month and year are the current month and year
                            $selectedMonth = isset($_POST['month']) ? $_POST['month'] : $currentMonth;
                            $selectedYear = isset($_POST['year']) ? $_POST['year'] : $currentYear;
                            
                            // Get the number of days in the selected month
                            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);

                            // Loop through the days of the month
                            for ($i = 1; $i <= $daysInMonth; $i++) :
                                // Disable days that are in the future
                                if ($selectedYear == $currentYear && $selectedMonth == $currentMonth && $i > $currentDay) :
                            ?>
                                <option value="<?php echo $i; ?>" disabled><?php echo $i; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endif; endfor; ?>
                        </select>

                        <select id="month" name="month" required>
                            <option value="">Month</option>
                            <?php
                            // Loop through numbers 1 to 12 for months
                            for ($i = 1; $i <= 12; $i++) :
                                // Disable future months if the selected year is the current year
                                if ($selectedYear == $currentYear && $i > $currentMonth) :
                            ?>
                                <option value="<?php echo $i; ?>" disabled><?php echo $i; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endif; endfor; ?>
                        </select>

                        <select id="year" name="year" required>
                            <option value="">Year</option>
                            <?php for ($i = 1944; $i <= $currentYear; $i++) : ?>
                                <option value="<?php echo $i; ?>" <?php echo ($i == $currentYear) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
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

    <!-- Show errors as JavaScript alerts -->
    <?php
    session_start();

    // Check if there are any errors in the session
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) :
    ?>
        <script>
            <?php foreach ($_SESSION['errors'] as $error) : ?>
                alert("<?php echo addslashes($error); ?>");
            <?php endforeach; ?>
        </script>
    <?php
        // Clear the errors from the session after displaying the alerts
        unset($_SESSION['errors']);
    endif;
    ?>
</body>

</html>
