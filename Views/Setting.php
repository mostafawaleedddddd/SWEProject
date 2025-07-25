<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html   lang="en" >

<head>
	<!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Favicon icon-->
<link rel="shortcut icon" type="image/png" href="/Medira/Media/assets/images/logos/favicon.png" />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
  rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
<!-- Core Css -->
<link rel="stylesheet" href="/Medira/Media/css/theme.css" />
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
  <button class="text-base font-semibold hover:bg-blue-700 btn">Logout</button>
</div>
<!-- </aside> -->
			</aside>
			<div class=" w-full page-wrapper xl:px-6 px-0">

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
          <a href="#" class="btn text-base font-medium hover:bg-blue-700" aria-current="page">Upgrade to Pro</a>
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
                <a href="../../pages/authentication-login.html" class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">Logout</a>
            </div>

        </div>
    </div>
</div>


        </div>
    </nav>

  <!-- ========== END HEADER ========== -->
				</header>
				<!--  Header End -->
                <div class="card">
                    <div class="card-body flex flex-col gap-6">
                        <h6 class="text-lg text-gray-500 font-semibold">Forms</h6>
                        <div class="card">
                            <div class="card-body">
                            <form>
                                <div class="mb-6">
                                    <label for="input-label-with-helper-text"
                                        class="block text-sm mb-2 text-gray-400">Email address</label>
                                    <input type="email" id="input-label-with-helper-text"
                                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
                                        placeholder="you@site.com" aria-describedby="hs-input-helper-text">
                                    <p class="text-sm  text-gray-400 opacity-75 mt-2" id="hs-input-helper-text">We'll never share your email with anyone else.</p>
                                </div>
                                <div class="mb-6">
                                    <label for="input-label-with-helper-text"
                                        class="block text-sm mb-2 text-gray-400">Password</label>
                                    <input type="password" id="input-label-with-helper-text"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 "
                                        placeholder="*******" aria-describedby="hs-input-helper-text">
                                </div>
                                <div class="flex mb-4">
                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-400 rounded-[4px] text-blue-600 focus:ring-blue-500 " id="hs-default-checkbox">
                                    <label for="hs-default-checkbox" class="text-sm text-gray-400 ms-3">Check me out</label>
                                  </div>
                                  <button class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
                                </form>
                            </div>
                        </div>
                        <h6 class="text-lg text-gray-500 font-semibold">Disabled forms</h6>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-2xl text-gray-400 mb-4">Disabled fieldset example</h6>
                                <form action="" class="flex flex-col gap-4">
                                <div>
                                    <label for="input-label-with-helper-text"
                                        class="block text-sm mb-2 text-gray-400">Disabled input</label>
                                    <input type="email" id="input-label-with-helper-text"
                                        class="py-3 px-4 block w-full border-gray-200 text-sm rounded-sm  focus:border-blue-600 focus:ring-0 bg-gray-200 disabled:opacity-60  disabled:pointer-events-none disabled:shadow-xl"
                                        placeholder="Disabled input" aria-describedby="hs-input-helper-text" disabled>
                                </div>
                                <div>
                                    <label for="input-label-with-helper-text"
                                        class="block text-sm mb-2 text-gray-400">Disabled select menu</label>
                                        <select class="py-3 px-4 pe-9 block w-full disabled:bg-gray-200 placeholder:opacity-40 border-gray-200 rounded-sm text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:shadow-xl disabled:opacity-60" disabled>
                                            <option selected>Disabled select</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                          </select>
                                </div>
                                <div class="flex opacity-60">
                                    <input type="checkbox" class="shrink-0 mt-0.5 rounded-[4px] border-gray-400 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-disabled-checkbox" disabled>
                                    <label for="hs-disabled-checkbox" class="text-sm text-gray-500 ms-3 ">Can't check this</label>
                                  </div>
                                  <button class="btn py-2.5 text-base text-white font-medium w-fit hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" disabled>Submit</button>
                                </form>
                            </div>                                        
                            </div>
                        </div>
                    </div>
					</div>


				</main>
				<!-- Main Content End -->
				
			</div>
		</div>
		<!--end of project-->
	</main>


	<script src="/Medira/views/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/Medira/views/assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/Medira/views/assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
<script src="/Medira/views/assets/libs/@preline/dropdown/index.js"></script>
<script src="/Medira/views/assets/libs/@preline/overlay/index.js"></script>
<script src="/Medira/views/assets/js/sidebarmenu.js"></script>



	<script src="/Medira/views/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/Medira/views/assets/js/dashboard.js"></script>

</body>

</html>