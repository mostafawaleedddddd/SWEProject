<?php
    require_once '../Controllers/AdminController.php';
    require_once '../Models/Admin.php';

    $model = new Admin();
    $controller = new AdminController();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        
    
    if (empty($fullName) || empty($email)) {
      $errors[] = "All fields are required.";
  }
  if (!preg_match("/^[a-zA-Z\s]+$/", $fullName)) {
    $errors[] = "Invalid full name.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email.";
}

if (!empty($errors)) {
  $message = ''; 
  foreach ($errors as $error) {
      $message .= $error . " "; // Use .= to concatenate strings
  }
  echo "<div class='message error'>" . $message . "</div>";
} else {
  
  if ($controller->banUser($fullName,$email)) {
      echo "";
  } else {
      echo "";
  }
}

}    
    
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ban User Form</title>
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
        body {
            /* font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;34
            height: 100vh;
            margin: 0; */
        }
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
        }
        .title {
            color: #ff0000;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }
        .message {
            color: #ff0000;
            text-align: center;
            margin-bottom: 1rem;
        }
        label {
            margin-bottom: 1rem;
            position: relative;
        }
        .input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ff0000;
            border-radius: 4px;
            font-size: 16px;
        }
        .input:focus {
            outline: none;
            border-color: #ff5555;
        }
        span {
            position: absolute;
            top: -8px;
            left: 10px;
            background-color: #fff;
            padding: 0 5px;
            color: #ff0000;
            font-size: 12px;
        }
        .submit {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit:hover {
            background-color: #cc0000;
        }
    </style>
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
    <div class="container">
        <form class="form" method="POST" action="">
            <p class="title">Ban User</p>
            <p class="message">Caution: This action is irreversible</p>

            <label>
                <input class="input" type="text" placeholder="" required="" name="fullName">
                <span>Full Name</span>
            </label>

            <label>
                <input class="input" type="email" name="email" placeholder="" required="">
                <span>Email</span>
            </label>

            <button class="submit">Ban User</button>
        </form>
    </div>
</body>
</html>

