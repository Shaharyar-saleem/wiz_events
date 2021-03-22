<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= PROJECT_TITLE ?></title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="<?= base_url() ?>node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>node_modules/trumbowyg/dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/admin/images/favicon.png" />

	<!-- Jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<script src="<?= base_url() ?>assets/admin/vendors/js/vendor.bundle.base.js"></script>
	<!-- Toaster -->
	<link rel="stylesheet" href="<?= base_url('node_modules/jquery-toast-plugin/dist/jquery.toast.min.css') ?>">
	<script src="<?= base_url('node_modules/jquery-toast-plugin/dist/jquery.toast.min.js') ?>" charset="utf-8"></script>

</head>

<body>
	<div class="container-scroller">
		<!-- Nav bar -->
		<?php include APPPATH . 'views/admin/shared/navbar.php'?>

		<!-- partial -->
		<div class="container-fluid page-body-wrapper">

			<!-- Dide Bar -->
			<?php include APPPATH . 'views/admin/shared/sidebar.php'?>
			<div class="main-panel">


		<?php require_once APPPATH . 'views/shared/message.php';?>
