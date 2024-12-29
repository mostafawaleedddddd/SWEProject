<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="Medira/Views/assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="/Medira/Media/css/theme.css"" />
    <title>Register</title>
</head>
<body class=" bg-surface">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class=" flex p-5 xl:pr-0 min-h-screen">
            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar   transition-all duration-300">
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="p-4">

                    <a href="../" class="text-nowrap">

                    </a>


                </div>
                <div class="scroll-sidebar" data-simplebar="">
                    <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
                        <ul id="sidebarnav" class="text-gray-600 text-sm">
                            <li class="text-xs font-bold pb-[5px]">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs text-gray-400 font-semibold">HOME</span>
                            </li>


                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base  flex items-center relative  rounded-md text-gray-500  w-full"
                                    href="/Medira/Views/Admin.php">
                                    <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Analytics</span>
                                </a>
                            </li>

                            <li class="text-xs font-bold mb-4 mt-6">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs text-gray-400 font-semibold">Admin_dash</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                                    href="/Medira/Views/Admin_dashboard.php">
                                    <i class="ti ti-article ps-2 text-2xl"></i> <span>Admin Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                                    href="/Medira/Views/messages.php">
                                    <i class="ti ti-article ps-2 text-2xl"></i> <span> Messages</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                                    href="/Medira/Views/Admin_home.php">
                                    <i class="ti ti-article ps-2 text-2xl"></i> <span>Managing Users</span>
                                </a>
                            </li>

                            <li class="text-xs font-bold mb-4 mt-6">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>

                                <span class="text-xs text-gray-400 font-semibold">Discussion Form</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                                    href="/Medira/Views/Admin_dis.php">
                                    <i class="ti ti-alert-circle ps-2 text-2xl"></i> <span>Discussion Form
                                        Over-Sight</span>
                                </a>
                            </li>
                    </nav>
                </div>


                <!-- Bottom Upgrade Option -->
                <div class="m-4  relative grid">
                    <button class="text-base font-semibold hover:bg-blue-700 btn">logout</button>
                </div>
                <!-- </aside> -->
            </aside>
            
                          
                            </nav>
<body>
    <style>
         :root {
            --primary: #2563eb;
            --secondary: #64748b;
            --success: #22c55e;
            --danger: #ef4444;
            --warning: #f59e0b;
            --background: #f8fafc;
            --surface: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: var(--background);
            color: #1e293b;
            line-height: 1.5;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            background: var(--surface);
            padding: 1.5rem;
            border-right: 1px solid #e2e8f0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 2rem;
        }
        
        .nav-item {
            padding: 0.75rem 1rem;
            margin: 0.5rem 0;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .nav-item:hover {
            background: #f1f5f9;
        }

        .nav-item.active {
            background: var(--primary);
            color: white;
        }

        .main-content {
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        /* body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: whitesmoke;
            font-family: Arial, sans-serif;
        } */

        .container {
            background-color: #fff;
            padding: 2rem;
            height: 20%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        
        .form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
            padding: 30px;
            border-radius: 20px;
            background-color: #1a1a1a;
            color: #fff;
            border: 1px solid #333;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            letter-spacing: -1px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 30px;
            color: #00bfff;
            margin: 0 0 10px 0;
        }

        .title::before {
            width: 18px;
            height: 18px;
        }

        .title::after {
            width: 18px;
            height: 18px;
            animation: pulse 1s linear infinite;
        }

        .title::before,
        .title::after {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            border-radius: 50%;
            left: 0px;
            background-color: #00bfff;
        }

        .message {
            font-size: 14.5px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 10px;
        }

        .form label {
            position: relative;
            width: 100%;
        }

        .form label .input {
            width: 100%;
            padding: 20px 10px 8px 10px;
            outline: none;
            background-color: #333;
            color: #fff;
            border: 1px solid rgba(105, 105, 105, 0.397);
            border-radius: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .form label .input:focus {
            border-color: #00bfff;
        }

        .form label .input+span {
            color: rgba(255, 255, 255, 0.5);
            position: absolute;
            left: 10px;
            top: 0px;
            font-size: 0.9em;
            cursor: text;
            transition: 0.3s ease;
            padding: 0 5px;
        }

        .form label .input:placeholder-shown+span {
            top: 12.5px;
            font-size: 0.9em;
        }

        .form label .input:focus+span,
        .form label .input:valid+span {
            color: #00bfff;
            top: 0px;
            font-size: 0.7em;
            font-weight: 600;
        }

        .date-gender-section {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 5px;
        }

        .section-title {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            margin-bottom: 5px;
        }

        .date-selects {
            display: flex;
            gap: 10px;
        }

        .date-selects select {
            flex: 1;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: 1px solid rgba(105, 105, 105, 0.397);
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            cursor: pointer;
        }

        .date-selects select:focus {
            border-color: #00bfff;
        }

        .gender-options {
            display: flex;
            gap: 20px;
            padding: 10px 0;
        }

        .gender-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .gender-option input[type="radio"] {
            accent-color: #00bfff;
            cursor: pointer;
        }

        .gender-option label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            cursor: pointer;
        }

        .submit {
            width: 100%;
            border: none;
            outline: none;
            padding: 12px;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transition: .3s ease;
            background-color: #00bfff;
            cursor: pointer;
            margin-top: 15px;
        }

        .submit:hover {
            background-color: #00bfff96;
            transform: translateY(-2px);
        }

        @keyframes pulse {
            from {
                transform: scale(0.9);
                opacity: 1;
            }

            to {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        .message {
            padding: 15px 25px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            width: 300px;
            text-align: center;
            animation: fadeInOut 4s ease-in-out forwards;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            opacity: 0;
        }

        .success {
            background-color: rgba(0, 191, 255, 0.9);
            color: white;
            border: 1px solid rgba(0, 191, 255, 0.3);
        }

        .error {
            background-color: rgba(255, 69, 58, 0.9);
            color: white;
            border: 1px solid rgba(255, 69, 58, 0.3);
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            10% {
                opacity: 1;
                transform: translateY(0);
            }

            80% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }
    </style>

    <?php
    require_once '../Controllers/AdminController.php';
    require_once '../Models/Admin.php';

    $model = new Admin();
    $controller = new AdminController();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phoneNumber'];
        $gender = $_POST['gender'];
        $errors = [];
        $day = str_pad($_POST['day'], 2, '0', STR_PAD_LEFT);
        $month = str_pad($_POST['month'], 2, '0', STR_PAD_LEFT);
        $year = $_POST['year'];
        $birthdate = "$year-$month-$day";
        if (empty($fullName) || empty($email) || empty($password) || empty($phone) || empty($gender) || empty($birthdate)) {
            $errors[] = "All fields are required.";
        }
        if (!preg_match("/^[a-zA-Z\s]+$/", $fullName)) {
            $errors[] = "Invalid full name.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email.";
        }
        if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password)) {
            $errors[] = "Password must be at least 8 characters long and contain One UpperCase letter.";
        }
        if ($controller->userExist($email)){

            $errors[] = "Email Already exist Try another one ";
        }
        if (!preg_match("/^\d{11}$/", $phone)) {
            $errors[] = "Invalid phone number.";
        }
        if (!empty($errors)) {
            $message = ''; 
            foreach ($errors as $error) {
                $message .= $error . " "; // Use .= to concatenate strings
            }
            echo "<div class='message error'>" . $message . "</div>";
        } else {
            
            if ($controller->addUser($fullName, $password, $email, $birthdate, $gender, $phone)) {
                echo "<div class='message success'>User added successfully!</div>";
            } else {
                echo "<div class='message error'>Error adding user. Please try again.</div>";
            }
        }
    }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('.form');
            const messageContainer = document.getElementById('messageContainer');

            form.addEventListener('submit', function (e) {
                // If there's already a message showing, remove the show class
                const existingMessage = document.querySelector('.message.show');
                if (existingMessage) {
                    existingMessage.classList.remove('show');
                }

                // If we have a message container, show it
                if (messageContainer) {
                    setTimeout(() => {
                        messageContainer.classList.add('show');
                    }, 100);

                    // Remove the message after animation completes
                    setTimeout(() => {
                        messageContainer.classList.remove('show');
                    }, 4000);
                }
            });
        });
    </script>
    <div class="container">
        <form class="form" method="POST" action="">
            <p class="title">Adding HealthCare Provider</p>
            <p class="message">Here you can Add Users</p>

            <label>
                <input class="input" type="text" placeholder="" required="" name="fullName">
                <span>Full Name</span>
            </label>

            <label>
                <input class="input" type="email" name="email" placeholder="" required="">
                <span>Email</span>
            </label>

            <label>
                <input class="input" type="password" placeholder="" name="password" required="">
                <span>Password</span>
            </label>

            <label>
                <input class="input" type="tel" placeholder="" name="phoneNumber" required="">
                <span>Phone Number</span>
            </label>

            <div class="date-gender-section">
                <div>
                    <p class="section-title">Date of Birth</p>
                    <div class="date-selects">
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
                                for (let i = currentYear; i >= 1970; i--) {
                                    document.write('<option value="' + i + '">' + i + '</option>');
                                }
                            </script>
                        </select>
                    </div>
                </div>

                <div>
                    <p class="section-title">Gender</p>
                    <div class="gender-options">
                        <div class="gender-option">
                            <input type="radio" name="gender" value="Male" id="male" required>
                            <label for="male">Male</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" name="gender" value="Female" id="female" required>
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
            </div>

            <button class="submit">AddUser</button>
        </form>
    </div>
</body>

</html>