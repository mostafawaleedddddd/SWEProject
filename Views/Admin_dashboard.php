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

input, select {
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

.users-table th, .users-table td {
    padding: 1rem;
    text-align: left; /* Ensuring all text is aligned to the left */
    border-top: 1px solid #e2e8f0; /* Border between rows */
}

.users-table th {
    background: #f8fafc;
    font-weight: 600;
    color: var(--secondary);
}

.users-table td {
    color: #1e293b; /* Text color for better readability */
}

.users-table tr {
    margin: 0;
    padding: 0;
}

.users-table th:first-child,
.users-table td:first-child {
    padding-left: 1rem; /* Adding consistent padding for the first column */
}

.users-table th:last-child,
.users-table td:last-child {
    padding-right: 1rem; /* Adding consistent padding for the last column */
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

.bulk-actions {
    background: var(--surface);
    padding: 1rem;
    border-radius: 0.5rem;
    margin-top: 1rem;
    display: flex;
    gap: 1rem;
    align-items: center;
}

    </style>
</head>

<head>
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
	<title>Spike TailwindCSS HTML Admin Template</title>
</head>

<body class=" bg-surface">
	<main>
		<!--start the project-->
		<div id="main-wrapper" class=" flex p-5 xl:pr-0 min-h-screen">
			<aside id="application-sidebar-brand"
				class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar   transition-all duration-300" >
				<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<div class="p-4" >
  
  <a href="../" class="text-nowrap">
    <img
      src="/Medira/Media/assets/images/logos/logo-light.svg"
      alt="Logo-Dark"
    />
  </a>


</div>
<div class="scroll-sidebar" data-simplebar="">
    <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
      <ul  id="sidebarnav" class="text-gray-600 text-sm">
        <li class="text-xs font-bold pb-[5px]">
          <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
          <span class="text-xs text-gray-400 font-semibold">HOME</span>
        </li>


        <li class="sidebar-item">
          <a class="sidebar-link gap-3 py-2.5 my-1 text-base  flex items-center relative  rounded-md text-gray-500  w-full" href="/Medira/Views/Admin.php"
           >
            <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Analytics</span>
          </a>
        </li>

        <li class="text-xs font-bold mb-4 mt-6">
          <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
          <span class="text-xs text-gray-400 font-semibold">Admin_Board</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full" href="/Medira/Views/Admin_dashboard.php"
           >
            <i class="ti ti-article ps-2 text-2xl"></i> <span>Admin Dashboard</span>
          </a>
        </li>

		<li class="sidebar-item">
          <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full" href="/Medira/Views/Admin_home.php"
           >
            <i class="ti ti-cards ps-2 text-2xl"></i> <span>Manage Admin</span>
          </a>
        </li>

		<li class="text-xs font-bold mb-4 mt-6">
          <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
          <span class="text-xs text-gray-400 font-semibold">Discussion Form</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full" href="/Medira/Views/Setting.php"
           >
            <i class="ti ti-alert-circle ps-2 text-2xl"></i> <span>Discussion Form Over-Sight</span>
          </a>
        </li>        

        

       

       
        
       
        

      </ul>
    </nav>
</div>

<!-- Bottom Upgrade Option -->
<div class="m-4  relative grid">
  <button class="text-base font-semibold hover:bg-blue-700 btn">logout</button>
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
                    <a class="text-xl  icon-hover cursor-pointer text-heading"
                        id="headerCollapse" data-hs-overlay="#application-sidebar-brand"
                        aria-controls="application-sidebar-brand" aria-label="Toggle navigation" href="javascript:void(0)">
                        <i class="ti ti-menu-2 relative z-1"></i>
                    </a>
                </li>
           
            <li class="relative">
                
    <div class="hs-dropdown relative inline-flex [--placement:bottom-left] sm:[--trigger:hover]">
        <a class="relative hs-dropdown-toggle inline-flex hover:text-gray-500 text-gray-300" href="#">
            <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
            <div
                class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-blue-600 w-2 h-2 rounded-full -top-[1px] -right-[6px]">
            </div>
        </a>
        <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[300px] hidden z-[12]"
            aria-labelledby="hs-dropdown-custom-icon-trigger">
            <div>
               <h3 class="text-gray-500 font-semibold text-base px-6 py-3">Notification</h3>
               <ul class="list-none  flex flex-col">
                <li>
               <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                <p class="text-sm text-gray-500 font-medium">Roman Joined the Team!</p>
                <p class="text-xs text-gray-400 font-medium">Congratulate him</p>
               </a>
                </li>
                <li>
                <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                    <p class="text-sm text-gray-500 font-medium">New message received</p>
                    <p class="text-xs text-gray-400 font-medium">Salma sent you new message</p>
                </a>
                </li>
                <li>
                  <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                    <p class="text-sm text-gray-500 font-medium">New Payment received</p>
                    <p class="text-xs text-gray-400 font-medium">Check your earnings</p>
                  </a>
                </li>
                <li>
                 <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                    <p class="text-sm text-gray-500 font-medium">Jolly completed tasks</p>
                    <p class="text-xs text-gray-400 font-medium">Assign her new tasks</p>
                 </a>
                </li>
                <li>
                  <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                    <p class="text-sm text-gray-500 font-medium">Roman Joined the Team!</p>
                    <p class="text-xs text-gray-400 font-medium">Congratulate him</p>
                  </a>
                </li>
               </ul>
            </div>
        </div>
    </div>

            </li>
            </ul>
        <div class="flex items-center gap-4">
          <a href="#" class="btn text-base font-medium hover:bg-blue-700" aria-current="page">logout</a>
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
    <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
        <img class="object-cover w-9 h-9 rounded-full" src="/Medira/Media/assets/images/profile/user-1.jpg" alt=""
            aria-hidden="true">
    </a>
    <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
        aria-labelledby="hs-dropdown-custom-icon-trigger">
        <div class="card-body p-0 py-2">
            <a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                <i class="ti ti-user  text-xl "></i>
                <p class="text-sm ">My Profile</p>
            </a>
            <a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                <i class="ti ti-mail  text-xl"></i>
                <p class="text-sm ">My Account</p>
            </a>
            <a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                <i class="ti ti-list-check  text-xl "></i>
                <p class="text-sm ">My Task</p>
            </a>
            <div class="px-4 mt-[7px] grid">
                <a href="/Medira/Media/pages/authentication-login.html" class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">Logout</a>
            </div>

        </div>
    </div>
</div>


        </div>
    </nav>
<body>
    <!-- <div class="dashboard">
        <div class="sidebar">
            <div class="logo">Medical System</div>
            <div class="nav-item active">Dashboard</div>
            <div class="nav-item">View Users</div>
            <div class="nav-item">Edit Users</div>
            <div class="nav-item">Manage Roles</div>
            <div class="nav-item">Settings</div>
        </div> -->

        <div class="main-content">
            <div class="header">
                <h1>User Management</h1>
                <a href="/Medira/Views/Add_Users.php" class="button button-primary">+ Add New User</a>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Search users..." style="width: 300px;">
                <select>
                    <option>All Roles</option>
                    <option>Healthcare Provider</option>
                    <option>User</option>
                </select>
                <select>
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
                <button class="button button-primary">Search</button>
            </div>

            <div class="users-table">
                <table>
                    <thead>
                        <tr>
                            <th></th>
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
    echo "<tr data-userid='{$userId}' data-role='{$userRole}'>";
    echo "<td>     {$userName}</td>";
    echo "<td>      {$userRole}</td>";
    echo "<td><span class='status-badge status-active'>" . htmlspecialchars($user['status']) . "</span></td>";
    echo "<td>" . htmlspecialchars($user['registration_date']) . "</td>";
    echo "<td></td>";
    echo "</tr>";
}
?>

                    </tbody>
                </table>
            </div>

            <div class="bulk-actions">
                <select>
                    <option>Bulk Actions</option>
                    <option>Activate Selected</option>
                    <option>Deactivate Selected</option>
                    <option>Delete Selected</option>
                </select>
                <button class="button button-primary">Apply</button>
            </div>
        </div>
    </div>



    <link rel="shortcut icon" type="image/png" href="/Medira/Media/assets/images/logos/favicon.png" />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
  rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

    <script src="/Medira/Media/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/Medira/Media/assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/Medira/Media/assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
<script src="/Medira/Media/assets/libs/@preline/dropdown/index.js"></script>
<script src="/Medira/Media/assets/libs/@preline/overlay/index.js"></script>
<script src="/Medira/Media/assets/js/sidebarmenu.js"></script>



	<script src="/Medira/Media/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/Medira/Media/assets/js/dashboard.js"></script>
    
</body>
</html>