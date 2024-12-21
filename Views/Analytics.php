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
          <span class="text-xs text-gray-400 font-semibold">Admin_dash</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full" href="/Medira/Views/Analytics.php"
           >
            <i class="ti ti-article ps-2 text-2xl"></i> <span>Admin Dashboard</span>
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

  <!-- ========== END HEADER ========== -->
				</header>
				<!--  Header End -->
                        <!-- <div class="card">
							<div class="card-body flex flex-col gap-6">
								<h6 class="text-lg text-gray-500 font-semibold">Buttons</h6>
								<div class="card">
									<div class="card-body flex flex-wrap gap-3">
										<button type="button" class=" py-2 px-6 btn rounded-2xl text-base font-medium  border border-transparent bg-blue-600 text-white hover:bg-blue-700 ">
										Primary
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-transparent bg-gray-400 text-white hover:bg-gray-700">
											Secondary
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-transparent bg-teal-500 text-white hover:bg-teal-600">
											Success
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-transparent bg-yellow-500 text-white hover:bg-yellow-600">
											Warning
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-transparent bg-red-500 text-white hover:bg-red-600">
											Danger
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-transparent bg-blue-300 text-white hover:bg-blue-400">
											Info
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-transparent bg-gray-500 text-white hover:bg-gray-700">
											Dark
										  </button>										
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-transparent bg-gray-200 hover:bg-gray-600">
											Light
										  </button>	
										  <button type="button" class="inline-flex items-center gap-x-2 text-base font-medium rounded-2xl text-blue-600 hover:text-blue-700 ">
											Link
										  </button>									
									</div>
								</div>
								<h6 class="text-lg text-gray-500 font-semibold">Outline buttons</h6>
								<div class="card">
									<div class="card-body flex flex-wrap gap-3">
										<button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600">
											Primary
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-gray-400 text-gray-400 hover:border-gray-400 hover:text-white hover:bg-gray-400">
											Secondary
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-teal-500 text-teal-500 hover:border-teal-500 hover:text-white hover:bg-teal-500 ">
											Success
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border text-yellow-500 hover:border-yellow-500 hover:text-white hover:bg-yellow-500 border-yellow-500">
											Warning
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-red-500 text-red-500 hover:border-red-500 hover:text-white hover:bg-red-500">
											Danger
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-blue-300 text-blue-300  hover:border-blue-300 hover:text-white hover:bg-blue-300">
											Info
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border text-gray border-gray-700 hover:border-gray-700 hover:text-white hover:bg-gray-500">
											Dark
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-gray-200 text-gray-200 hover:border-transparent hover:text-gray-500 hover:bg-gray-200">
											Light
										  </button>
										  <button type="button" class="py-2 px-7 inline-flex items-center gap-x-2 text-base font-medium rounded-2xl border border-transparent text-gray-500 hover:border-transparent hover:text-blue-600">
											Link
										  </button>
									</div>
								</div>
							</div>
						</div>
					</div> -->
          <div class="col-span-2">
    <div class="card h-full">
        <div class="card-body">
            <h4 class="text-gray-500 text-lg font-semibold mb-5">Top Users</h4>
            <div class="relative overflow-x-auto">
                <!-- table -->
                <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
                    <thead>
                        <tr class="text-sm">
                            <th scope="col" class="p-4 font-semibold">Profile</th>
                            <th scope="col" class="p-4 font-semibold">Role</th>
                            <th scope="col" class="p-4 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-4 text-sm">
                                <div class="flex gap-6 items-center">
                                    <div class="h-12 w-12 inline-block">
                                        <img src="/Medira/Media/assets/images/profile/user-1.jpg" alt="" class="rounded-full w-100">
                                    </div>
                                    <div class="flex flex-col gap-1 text-gray-500">
                                        <h3 class="font-bold">Mark J. Freeman</h3>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <h3 class="font-medium">Healthcare Provider</h3>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center py-2 px-4 rounded-3xl font-semibold bg-teal-400 text-teal-500">Available</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 text-sm">
                                <div class="flex gap-6 items-center">
                                    <div class="h-12 w-12 inline-block">
                                        <img src="/Medira/Media/assets/images/profile/user-2.jpg" alt="" class="rounded-full w-100">
                                    </div>
                                    <div class="flex flex-col gap-1 text-gray-500">
                                        <h3 class="font-bold">Nina R. Oldman</h3>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <h3 class="font-medium">Normal User</h3>
                            </td>
                            <td class="p-4">
                            <span class="inline-flex items-center py-2 px-4 rounded-3xl font-semibold bg-teal-400 text-teal-500">Available</span>                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 text-sm">
                                <div class="flex gap-6 items-center">
                                    <div class="h-12 w-12 inline-block">
                                        <img src="/Medira/Media/assets/images/profile/user-3.jpg" alt="" class="rounded-full w-100">
                                    </div>
                                    <div class="flex flex-col gap-1 text-gray-500">
                                        <h3 class="font-bold">Arya H. Shah</h3>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <h3 class="font-medium">Healthcare Provider</h3>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center py-2 px-4 rounded-3xl font-semibold bg-red-400 text-red-500">Absent</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 text-sm">
                                <div class="flex gap-6 items-center">
                                    <div class="h-12 w-12 inline-block">
                                        <img src="/Medira/Media/assets/images/profile/user-4.jpg" alt="" class="rounded-full w-100">
                                    </div>
                                    <div class="flex flex-col gap-1 text-gray-500">
                                        <h3 class="font-bold">June R. Smith</h3>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <h3 class="font-medium">Normal User</h3>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center py-2 px-4 rounded-3xl font-semibold bg-yellow-400 text-yellow-500">Absent</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 text-sm">
                                <div class="flex gap-6 items-center">
                                    <div class="h-12 w-12 inline-block">
                                        <img src="/Medira/Media/assets/images/profile/user-3.jpg" alt="" class="rounded-full w-100">
                                    </div>
                                    <div class="flex flex-col gap-1 text-gray-500">
                                        <h3 class="font-bold">Liam P. Thompson</h3>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <h3 class="font-medium">Healthcare Provider</h3>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center py-2 px-4 rounded-3xl font-semibold bg-teal-400 text-teal-500">Available</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-4 text-sm">
                                <div class="flex gap-6 items-center">
                                    <div class="h-12 w-12 inline-block">
                                        <img src="/Medira/Media/assets/images/profile/user-4.jpg" alt="" class="rounded-full w-100">
                                    </div>
                                    <div class="flex flex-col gap-1 text-gray-500">
                                        <h3 class="font-bold">Emma W. Davis</h3>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <h3 class="font-medium">Normal User</h3>
                            </td>
                            <td class="p-4">
                            <span class="inline-flex items-center py-2 px-4 rounded-3xl font-semibold bg-teal-400 text-teal-500">Available</span>                            </td>
                        </tr>
                    </tbody>
                </table>
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


	
<script src="/Medira/Views/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/Medira/Views/assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/Medira/Views/assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
<script src="/Medira/Views/assets/libs/@preline/dropdown/index.js"></script>
<script src="/Medira/Views/assets/libs/@preline/overlay/index.js"></script>
<script src="/Medira/Views/assets/js/sidebarmenu.js"></script>


<script src="/Medira/Media/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/Medira/Media/assets/js/dashboard.js"></script>

</body>

</html>