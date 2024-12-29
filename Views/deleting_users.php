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
    <title>Admin Dashboard - User Management</title>
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
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #f39c12;
            --background-color: #f0f4f8;
            --text-color: #333;
            --success-color: #2ecc71;
            --error-color: #e74c3c;
        }

        /* body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        } */

        .container {
            max-width: 600px;
            margin: 0 auto;
            height: 20%;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--primary-color);
        }

        input[type="text"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e67e22;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            background-color: var(--success-color);
            color: white;
        }

        .error {
            background-color: var(--error-color);
            color: white;
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
        <h1>Admin Dashboard</h1>

        <?php
        require_once '../Controllers/AdminController.php';
        require_once '../Models/Admin.php';

        $model = new Admin();
        $controller = new AdminController();

        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            
            $userName = $_POST['userName'];
           

       if (!filter_var($userName, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='message error'>Please enter a valid name.</div>";
    } else {
        
        if ($controller->userExists($userName)) {
            
            if ($controller->deleteUserByName($userName)) {
                echo "<div class='message success'>User deleted successfully.</div>";
            }
        } else {
            echo "<div class='message error'>User Is Not Found.</div>";
        }
    } }
            
        ?>

        <form method="post">
            <label for="userName">User Name:</label>
            <input type="text" id="userName" name="userName" required placeholder="Enter user name to delete">
            <input type="hidden" name="action" value="delete">
            <button type="submit">Delete User</button>
        </form>
    </div>
</body>
</html>