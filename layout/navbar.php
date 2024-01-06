<?php 
session_start();

if (!isset($_SESSION['id_operator'])){
	header("Location: login.php?err=true");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Title -->
	<title>Data Mahasiswa</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Yosi Bagus Sadar Rasuli">
	<meta name="robots" content="">


	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon icon -->
	<link rel="shortcut icon" type="image/x-icon" href="https://unibamadura.ac.id/page/images/profil/1.png">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist.min.css">
	<link href="assets/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link href="assets/css/style.css" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
		rel="stylesheet">
</head>

<body>

	<!--*******************
        Preloader start
    ********************-->
	<div id="preloader" style="display: none;">
		<div class="sk-three-bounce">
			<div class="sk-child sk-bounce1"></div>
			<div class="sk-child sk-bounce2"></div>
			<div class="sk-child sk-bounce3"></div>
		</div>
	</div>
	<!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->




	<div id="main-wrapper" class="show">

		<!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
			<a href="index.html" class="brand-logo" aria-label="Gymove">
				<img class="logo-abbr" width="50" src="https://unibamadura.ac.id/page/images/profil/1.png" alt="">


				<h4 class="logo-compact mt-2">Informatika <span style="font-size: 10px">Uniba Madura</span>
				</h4>
				<h4 class="brand-title mt-2">Informatika <span style="font-size: 10px">Uniba Madura </span>
				</h4>
			</a>

			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>
		<!--**********************************
            Nav header end
        ***********************************-->


		<!--**********************************
            Header start
        ***********************************-->
		<header class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
								<?php
								$currentPage = basename($_SERVER['PHP_SELF']);

								$menuNames= [
									'home.php' => 'Dashboard',
									'data_jurusan.php' => 'Jurusan',
									'data_mahasiswa.php' => 'Mahasiswa',
									'data_operator.php' => 'Operator',
								];

								if (array_key_exists($currentPage, $menuNames)) {
									echo $menuNames[$currentPage];
								} else {
									echo 'Nama Halaman Default';
								}

								?>
							</div>
						</div>
						<ul class="navbar-nav header-right">



							<li class="nav-item dropdown header-profile">
								<a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
									<img src="http://127.0.0.1:8000/foto/yosi.jpg" width="20" alt="">
									<div class="header-info">
										<span class="text-black"><strong>Admin</strong></span>
										<p class="fs-12 mb-0">admin@gmail.com</p>
									</div>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="/setting" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
											width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="logout.php" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
											width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
											stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
											<polyline points="16 17 21 12 16 7"></polyline>
											<line x1="21" y1="12" x2="9" y2="12">
											</line>
										</svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

		<!--**********************************
            Sidebar start
        ***********************************-->
		<div class="deznav">
			<div class="deznav-scroll mm-active">
				<ul class="metismenu mm-show" id="menu">
					<li class="<?= ($currentPage == 'home.php') ? 'mm-active' : '' ?>">
					<a href="home.php" class="ai-icon mm-active" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
					<li class="<?= ($currentPage == 'data_jurusan.php') ? 'mm-active' : '' ?>">
					<a href="data_jurusan.php" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Data Jurusan</span>
						</a>
					</li>
					<li class="<?= ($currentPage == 'data_mahasiswa.php') ? 'mm-active' : '' ?>">
					<a href="data_mahasiswa.php" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Data Mahasiswa</span>
						</a>
					</li>
					<li class="<?= ($currentPage == 'data_operator.php.php') ? 'mm-active' : '' ?>">
					<a href="data_operator.php" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Operator Sistem</span>
						</a>
					</li>
				</ul>
				<div class="add-menu-sidebar">
					<img src="https://cdn-icons-png.flaticon.com/512/1053/1053210.png" width="50" alt="" class="me-3">
					<a href="logout.php" class="font-w500 mb-0">Logout</a>
				</div>
				<div class="copyright">
					<p><strong>T2S System</strong> © 2023 All Rights Reserved</p>
					<p>Made with <span class="heart"></span> by Yosi Bagus</p>
				</div>
			</div>
		</div>
		<!--**********************************
            Sidebar end
        ***********************************-->


		<!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body default-height">
			<div class="container-fluid">