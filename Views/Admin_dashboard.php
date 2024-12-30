<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    header('Location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: /Medira/Views/index.php"); // Redirect to the same page after logout
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical System - Admin Dashboard</title>
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

        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        input,
        select {
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .button:hover {
            opacity: 0.9;
        }

        .button-primary {
            background: var(--primary);
            color: white;
        }

        .button-danger {
            background: var(--danger);
            color: white;
        }

        .button-success {
            background: var(--success);
            color: white;
        }

        .users-table {
            width: 100%;
            background: var(--surface);
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .users-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .users-table th {
            background: #f8fafc;
            padding: 0.25rem;
            text-align: left;
            font-weight: 600;
            color: var(--secondary);
        }

        .users-table td {
            padding: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-buttons {
            display: none;
            gap: 0.5rem;
        }

        .action-buttons.show {
            display: flex;
        }

        .users-table {
            width: 100%;
            background: var(--surface);
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .users-table table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .users-table th,
        .users-table td {
            padding: 1rem;
            text-align: left;
            width: 25%;
            /* Equal width for all columns */
        }

        .users-table th {
            background: #f8fafc;
            font-weight: 600;
            color: var(--secondary);
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }

        .users-table td {
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        /* Specific column widths */
        .users-table th:nth-child(1),
        .users-table td:nth-child(1) {
            width: 20%;
            padding-left: 2rem;
        }

        .users-table th:nth-child(2),
        .users-table td:nth-child(2) {
            width: 25%;
            padding-left: 2rem;
        }

        .users-table th:nth-child(3),
        .users-table td:nth-child(3) {
            width: 15%;
            padding-left: 2rem;
        }

        .users-table th:nth-child(4),
        .users-table td:nth-child(4) {
            width: 20%;
            padding-left: 2rem;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-block;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Search bar styles */
        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            align-items: center;
            padding: 1rem;
            background: var(--surface);
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        input,
        select {
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: opacity 0.2s;
            background: var(--primary);
            color: white;
        }

        .button:hover {
            opacity: 0.9;
        }

        .role-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-block;
        }

        .role-user,
        .role-healthcare {
            background: #dcfce7;
            color: #166534;
        }

        .role-banned {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Update existing status badge styles for consistency */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-block;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }





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
            --secondary-color: #f5a623;
            --background-color: #f0f4f8;
            --text-color: #333;
            --header-color: #2c3e50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        } */

        .container1 {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
            margin-left:300px;
        }

        .header {
            background-color: var(--header-color);
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .welcome-message {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .messages-table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: var(--primary-color);
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }

        .message-cell {
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .timestamp {
            color: #6c757d;
            font-size: 0.9em;
        }

        .email {
            color: var(--primary-color);
            text-decoration: none;
        }

        .email:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container1 {
                padding: 10px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .welcome-message {
                font-size: 1rem;
            }

            th, td {
                padding: 10px;
            }

            .message-cell {
                max-width: 200px;
            }
        }

















    </style>




</head>

<head>
    
    
    
    <!-- Core Css -->
    <link rel="stylesheet" href="/Medira/Media/css/theme.css" />

    
      
    <header class="header">
        <div class="container1">
            <h1>Admin Dashboard</h1>
            <p class="welcome-message">Welcome back, Admin! Here are the latest contact messages.</p>
        </div>
    </header>
   
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
                    <button class="text-base font-semibold hover:bg-blue-700 btn"onclick="location.href='?logout=true';">logout</button>
                </div>
                <!-- </aside> -->
            </aside>
            <div class=" w-full page-wrapper xl:px-6 px-0 ">

                <!-- Main Content -->
                <main class="h-full  max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">
                        <!--  Header Start -->
                        <header class=" bg-white shadow-md rounded-md w-full text-sm py-4 px-6">


                            <!-- ========== HEADER ========== -->

                            <nav class=" w-ful flex items-center justify-between" aria-label="Global">
                                <ul class="icon-nav flex items-center gap-4">
                                    <li class="relative xl:hidden">
                                        <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                                            data-hs-overlay="#application-sidebar-brand"
                                            aria-controls="application-sidebar-brand" aria-label="Toggle navigation"
                                            href="javascript:void(0)">
                                            <i class="ti ti-menu-2 relative z-1"></i>
                                        </a>
                                    </li>

                                    <li class="relative">

                                        <div
                                            class="hs-dropdown relative inline-flex [--placement:bottom-left] sm:[--trigger:hover]">
                                            <a class="relative hs-dropdown-toggle inline-flex hover:text-gray-500 text-gray-300"
                                                href="#">
                                                <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                                                <div
                                                    class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-blue-600 w-2 h-2 rounded-full -top-[1px] -right-[6px]">
                                                </div>
                                            </a>
                                            <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[300px] hidden z-[12]"
                                                aria-labelledby="hs-dropdown-custom-icon-trigger">
                                                <div>
                                                    <h3 class="text-gray-500 font-semibold text-base px-6 py-3">
                                                        Notification</h3>
                                                    <ul class="list-none  flex flex-col">
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">Roman
                                                                    Joined the Team!</p>
                                                                <p class="text-xs text-gray-400 font-medium">
                                                                    Congratulate him</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">New message
                                                                    received</p>
                                                                <p class="text-xs text-gray-400 font-medium">Salma sent
                                                                    you new message</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">New Payment
                                                                    received</p>
                                                                <p class="text-xs text-gray-400 font-medium">Check your
                                                                    earnings</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">Jolly
                                                                    completed tasks</p>
                                                                <p class="text-xs text-gray-400 font-medium">Assign her
                                                                    new tasks</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">Roman
                                                                    Joined the Team!</p>
                                                                <p class="text-xs text-gray-400 font-medium">
                                                                    Congratulate him</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                                <div class="flex items-center gap-4">

                                    <div
                                        class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                                        <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                                            <img class="object-cover w-9 h-9 rounded-full" aria-hidden="true">
                                        </a>
                                        <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="card-body p-0 py-2">
                                                <a href="javscript:void(0)"
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                                                    <i class="ti ti-user  text-xl "></i>
                                                    <p class="text-sm ">My Profile</p>
                                                </a>
                                                <a href="javscript:void(0)"
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                                                    <i class="ti ti-mail  text-xl"></i>
                                                    <p class="text-sm ">My Account</p>
                                                </a>
                                                <a href="javscript:void(0)"
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                                                    <i class="ti ti-list-check  text-xl "></i>
                                                    <p class="text-sm ">My Task</p>
                                                </a>
                                                <div class="px-4 mt-[7px] grid">
                                                    <a href="/Medira/Media/pages/authentication-login.html"
                                                        class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">Logout</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </nav>

<body>

    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search users..." style="width: 300px;">
        <select id="roleFilter">
            <option>All Roles</option>
            <option>Healthcare Provider</option>
            <option>User</option>
        </select>
        <select id="statusFilter">
            <option>All Status</option>
            <option>Active</option>
            <option>In Active</option>
        </select>
        <select id="nameSort">
            <option>All Names</option>
            <option>Sort A-Z</option>
            <option>Sort Z-A</option>
        </select>
        <button class="button" onclick="searchUsers()">Search</button>
    </div>
    <div class="users-table">
        <table>
            <thead>

                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Birth Date</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../Controllers/AdminController.php';
                require_once '../Models/Admin.php';

                $model = new Admin();
                $controller = new AdminController();
                $users = $controller->getAllUsers();

                foreach ($users as $user) {
                    $userId = htmlspecialchars($user['id']);
                    $userName = htmlspecialchars($user['name']);
                    $userRole = htmlspecialchars($user['role']);
                    $statusClass = $user['status'] === 'Active' ? 'status-active' : 'status-inactive';
                    echo "<tr data-userid='{$userId}' data-role='{$userRole}'>";
                    echo "<td>{$userName}</td>";
                    echo "<td><span class='role-badge " . ($userRole === 'Banned' ? 'role-banned' : 'role-user') . "'>{$userRole}</span></td>";
                    echo "<td><span class='status-badge " . ($user['status'] === 'Active' ? 'status-active' : 'status-inactive') . "'>" . htmlspecialchars($user['status']) . "</span></td>";
                    echo "<td>" . htmlspecialchars($user['registration_date']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function applyFilters() {
            const roleSelect = document.getElementById('roleFilter');
            const statusSelect = document.getElementById('statusFilter');
            const tableRows = document.querySelectorAll('tbody tr');

            tableRows.forEach(row => {
                const roleCell = row.querySelector('td:nth-child(2)');
                const statusCell = row.querySelector('td:nth-child(3)');
                const roleMatch = roleSelect.value === 'All Roles' || roleCell.textContent === roleSelect.value;
                const statusMatch = statusSelect.value === 'All Status' ||
                    (statusSelect.value === 'In Active' && statusCell.textContent.includes('In Active'))||
                    statusCell.textContent=== statusSelect.value ;
                if (roleMatch && statusMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function filterUsersByRole() {
            const roleSelect = document.getElementById('roleFilter');
            roleSelect.addEventListener('change', applyFilters);
        }

        function filterUsersByStatus() {
            const statusSelect = document.getElementById('statusFilter');
            statusSelect.addEventListener('change', applyFilters);
        }

        function sortUsersByName() {
            const sortSelect = document.getElementById('nameSort');
            const tbody = document.querySelector('tbody');

            sortSelect.addEventListener('change', function () {
                const selectedSort = this.value;
                const rows = Array.from(tbody.querySelectorAll('tr'));

                rows.sort((a, b) => {
                    const nameA = a.querySelector('td:first-child').textContent.toLowerCase();
                    const nameB = b.querySelector('td:first-child').textContent.toLowerCase();

                    if (selectedSort === 'Sort A-Z') {
                        return nameA.localeCompare(nameB);
                    } else if (selectedSort === 'Sort Z-A') {
                        return nameB.localeCompare(nameA);
                    }
                    return 0;
                });

                tbody.innerHTML = '';
                rows.forEach(row => tbody.appendChild(row));
            });
        }



        function searchUsers() {
            const searchInput = document.getElementById('searchInput');
            const searchTerm = searchInput.value.toLowerCase().trim();
            const tableRows = document.querySelectorAll('tbody tr');
            let found = false;

            tableRows.forEach(row => {
                const nameCell = row.querySelector('td:first-child');
                const name = nameCell.textContent.toLowerCase();

                if (searchTerm === '' || name.includes(searchTerm)) {
                    row.style.display = '';
                    found = true;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show alert if no users found
            if (!found && searchTerm !== '') {
                alert('No users found matching your search.');
            }
        }

        // Also add real-time search as user types
        document.getElementById('searchInput').addEventListener('input', function (e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            const tableRows = document.querySelectorAll('tbody tr');
            let found = false;

            tableRows.forEach(row => {
                const nameCell = row.querySelector('td:first-child');
                const name = nameCell.textContent.toLowerCase();

                if (searchTerm === '' || name.includes(searchTerm)) {
                    row.style.display = '';
                    found = true;
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Call all functions when the page loads
        document.addEventListener('DOMContentLoaded', function () {
            filterUsersByRole();
            filterUsersByStatus();
            sortUsersByName();
        });
    </script>
</body>
</html>