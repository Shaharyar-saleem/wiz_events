<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?= PROJECT_TITLE ?></title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inria+Serif&amp;display=swap" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/scss/main.scss" />
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.webp" type="image/x-icon" />
	<link href="<?= base_url() ?>assets/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Dropify -->
	<link rel="stylesheet" href="<?= base_url('node_modules/dropify/dist/css/dropify.min.css') ?>">
	<!-- Jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Toaster -->
	<link rel="stylesheet" href="<?= base_url('node_modules/jquery-toast-plugin/dist/jquery.toast.min.css') ?>">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' />
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css' />
	<script src="<?= base_url('node_modules/jquery-toast-plugin/dist/jquery.toast.min.js') ?>" charset="utf-8"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Second Design starts prefix with 'S-?' STYLE SHEET -->
	<link rel='stylesheet' href="<?= base_url() ?>assets/css/S-style.css">	
	
</head>

<body class="pt-5">
	<?php if (empty($hide_navbar)): ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-0">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?= base_url() ?>">
			
					<img style="transform:translate(-5px,-5px)" src="<?= base_url() ?>assets/img/s-images/logo-new.png" class="header_logo" alt="logo" / height="50px">
				
			</a>
			<button class="navbar-toggler" data-target="#main-navbar" data-toggle="collapse" aria-controls="main-navbar"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="main-navbar">
				<ul class="navbar-nav animated fadeIn main-nav m-auto flex-row justify-content-between mr-md-4">
					<li class="nav-item ml-md-5">
						<a class="nav-link" href="<?= base_url() ?>">
							<img src="<?= base_url() ?>assets/img/s-images/header-icon-1.png" alt="">
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('event-finder') ?>">
						<img src="<?= base_url() ?>assets/img/s-images/header-icon-2.png" alt="">
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>">
						<img src="<?= base_url() ?>assets/img/s-images/header-icon-3.png" alt="">
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('members') ?>">
						<img src="<?= base_url() ?>assets/img/s-images/header-icon-4.png" alt="">
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>">
						<img src="<?= base_url() ?>assets/img/s-images/header-icon-5.png" alt="">
						</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto flex-row justify-content-between navbar-right">
					<li class="nav-item">
						<a class="nav-link btn btn-create-event text-white font-weight-bold btn-sm px-4"
							href="<?= base_url('create-event') ?>">Sign up</a></li>
					<?php if (empty($this->session->user_login)): ?>
					<li title="Login" style="transform:translateY(-3px)" class="nav-item">
						<a class="nav-link p-0 ml-2" href="<?= base_url('login') ?>">
							<img src="<?=asset_img('user-icon.png')?>" alt="">
							<span class="text-md">Log In</span>
						</a>
					</li>
					<?php else: ?>
					<li class="nav-item dropdown">
						<a class="nav-link p-0 ml-2 dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?=asset_img('user-icon.png')?>" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item"
								href="<?= base_url('user-profile/').$this->session->user_login["public_key"] ?>">Profile</a>
							<a class="dropdown-item" href="<?= base_url('my-event') ?>">My Event</a>
							<a class="dropdown-item" href="<?= base_url('update/account') ?>">Update Account</a>
							<a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
						</div>
					</li>
					<?php endif; ?>
				</ul>
			</div>
	</nav>
	<?php endif; ?>
	<?php require_once APPPATH . 'views/shared/message.php';?>