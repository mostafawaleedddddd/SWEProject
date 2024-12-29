<?php

if (!isset($_SESSION['user_type'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en" >

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
		<div id="main-wrapper" class=" flex p-5 xl:pr-0">
			<aside id="application-sidebar-brand"
				class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar   transition-all duration-300" >
				<!-- ---------------------------------- -->
<!-- Start Vertical Layout Sidebar -->
<!-- ---------------------------------- -->
<div class="p-4" >
  
  <a href="../" class="text-nowrap">
    <img
      src="/Medira/views/assets/images/logos/logo-light.svg"
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
        <img class="object-cover w-9 h-9 rounded-full" src="/Medira/Views/assets/images/profile/user-1.jpg" alt=""
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
                      <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                         <div class="col-span-2">
							<div class="card">
								<div class="card-body">
									<div class="flex  justify-between mb-5">
										<h4 class="text-gray-500 text-lg font-semibold sm:mb-0 mb-2">Traffic Per day</h4>
										<div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
											<a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                                                <i class="ti ti-dots-vertical text-2xl text-gray-400"></i>
											</a>
											<div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[150px] hidden z-[12]"
												aria-labelledby="hs-dropdown-custom-icon-trigger">
												<div class="card-body p-0 py-2">
													<a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-2.5 hover:bg-gray-200 text-gray-400">
														<p class="text-sm ">Action</p>
													</a>
													<a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-2.5 hover:bg-gray-200 text-gray-400">
														<p class="text-sm ">Another Action</p>
													</a>
													<a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-2.5 hover:bg-gray-200 text-gray-400">
														<p class="text-sm ">Something else here</p>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div id="profit"></div>
								</div>
							</div>
						 </div>
                         





						 <!-- //</> -->




						 <div class="flex flex-col gap-6">
							<div class="card">
								<div class="card-body">
									<h4 class="text-gray-500 text-lg font-semibold mb-4">Traffic Distribution</h4>
									<div class="flex items-center justify-between gap-12">
                                    <div >
										<h3 class="text-[22px] font-semibold text-gray-500 mb-4">36,358 person</h3>
										<div class="flex items-center gap-1 mb-3">
                                           <span class="flex items-center justify-center w-5 h-5 rounded-full bg-teal-400">
											<i class="ti ti-arrow-up-left text-teal-500"></i>
										   </span>
										   <p class="text-gray-500 text-sm font-normal ">+9%</p>
										   <p class="text-gray-400 text-sm font-normal text-nowrap">last year</p>
										</div>
										<div class="flex gap-4">
                                           <div class="flex gap-2 items-center">
											<span class="w-2 h-2 rounded-full bg-blue-600"></span>
											<p class="text-gray-400 font-normal text-xs">Oragnic</p>
										   </div>
                                           <div class="flex gap-2 items-center">
											<span class="w-2 h-2 rounded-full bg-red-500"></span>
											<p class="text-gray-400 font-normal text-xs"> Refferal</p>
										   </div>
										</div>
									</div>
									<div class="flex  items-center">
										<div id="grade"></div>
									</div>
									</div>
								</div>
							</div>


							<!-- kvibsjrvrg -->




							<div class="card">
								<div class="card-body">
									<div class="flex gap-6 items-center justify-between">
                                    <div class="flex flex-col gap-4">
										<h4 class="text-gray-500 text-lg font-semibold">patintes</h4>
										<div class="flex flex-col gap-4">
										<h3 class="text-[22px] font-semibold text-gray-500">6,820</h3>
										<div class="flex items-center gap-1">
                                           <span class="flex items-center justify-center w-5 h-5 rounded-full bg-red-400">
											<i class="ti ti-arrow-down-right text-red-500"></i>
										   </span>
										   <p class="text-gray-500 text-sm font-normal ">+9%</p>
										   <p class="text-gray-400 text-sm font-normal text-nowrap">last year</p>
										</div>
									</div>
									</div>
									
										<div class="w-11 h-11 flex justify-center items-center rounded-full bg-red-500 text-white self-start">
											<i class="ti ti-currency-dollar text-xl"></i>
										</div>
							
									</div>
								</div>
								<div id="earning"></div>
							</div>
						 </div>


					  </div>
                       <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                          <div class="card">
							<div class="card-body">
							<h4 class="text-gray-500 text-lg font-semibold mb-5">Upcoming Schedules</h4>
							<ul class="timeline-widget relative">
                               <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                                   <div class="timeline-time text-gray-500 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                                       9:30 am
								   </div>
								   <div class="timeline-badge-wrap flex flex-col items-center ">
                                     <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-600 my-[10px]">
									 </div>
									 <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
								   </div>
								   <div class="timeline-desc py-[6px] px-4">
									<p class="text-gray-500 text-sm font-normal">Payment received from John Doe of $385.90</p>
								   </div>
							   </li>
                               <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                                   <div class="timeline-time text-gray-500 min-w-[90px] py-[6px] text-sm pr-4 text-end">
                                       10:00 am
								   </div>
								   <div class="timeline-badge-wrap flex flex-col items-center ">
                                     <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-300 my-[10px]">
									 </div>
									 <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
								   </div>
								   <div class="timeline-desc py-[6px] px-4 text-sm">
									<p class="text-gray-500  font-semibold">New sale recorded</p>
									<a href="javascript:void('')" class="text-blue-600">#ML-3467</a>
								   </div>
							   </li>

                               <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
								<div class="timeline-time text-gray-500 min-w-[90px] text-sm py-[6px] pr-4 text-end">
									12:00 am
								</div>
								<div class="timeline-badge-wrap flex flex-col items-center ">
								  <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
								  </div>
								  <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
								</div>
								<div class="timeline-desc py-[6px] px-4">
								 <p class="text-gray-500 text-sm font-normal">Payment was made of $64.95 to Michael</p>
								</div>
							</li>
							
							<li class="timeline-item flex relative overflow-hidden min-h-[70px]">
								<div class="timeline-time text-gray-500 min-w-[90px] text-sm py-[6px] pr-4 text-end">
									9:30 am
								</div>
								<div class="timeline-badge-wrap flex flex-col items-center ">
								  <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-yellow-500 my-[10px]">
								  </div>
								  <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
								</div>
								<div class="timeline-desc py-[6px] px-4 text-sm">
								 <p class="text-gray-500 font-semibold">New sale recorded</p>
								 <a href="javascript:void('')" class="text-blue-600">#ML-3467</a>
								</div>
							</li>

							<li class="timeline-item flex relative overflow-hidden min-h-[70px]">
								<div class="timeline-time text-gray-500 text-sm min-w-[90px] py-[6px] pr-4 text-end">
									9:30 am
								</div>
								<div class="timeline-badge-wrap flex flex-col items-center ">
								  <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-red-500 my-[10px]">
								  </div>
								  <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
								</div>
								<div class="timeline-desc py-[6px] px-4">
								 <p class="text-gray-500 text-sm font-semibold">New arrival recorded</p>
								</div>
							</li>
							<li class="timeline-item flex relative overflow-hidden">
								<div class="timeline-time text-gray-500 text-sm min-w-[90px] py-[6px] pr-4 text-end">
									12:00 am
								</div>
								<div class="timeline-badge-wrap flex flex-col items-center ">
								  <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
								  </div>
								  <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
								</div>
								<div class="timeline-desc py-[6px] px-4">
								 <p class="text-gray-500 text-sm font-normal">Payment Done</p>
								</div>
							</li>							
							   
							</ul>
							</div>
						  </div>
						 
							</div>
						  </div>
					   </div>
					
						
	</main>


	
<script src="\Medira\Media\spike-free-tailwind-v1 2\dist\assets\libs\jquery\dist\jquery.min.js"></script>
<script src="/Medira/Media/assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/Medira/Media/assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
<script src="/Medira/Media/assets/libs/@preline/dropdown/index.js"></script>
<script src="/Medira/Media/assets/libs/@preline/overlay/index.js"></script>
<script src="/Medira/Media/assets/js/sidebarmenu.js"></script>



	<script src="/Medira/Media/Spike/dist/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/Medira/Media/spike/dist/assets/js/dashboard.js"></script>
	
</body>

</html>