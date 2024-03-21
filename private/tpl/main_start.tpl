<!DOCTYPE html>
<html lang="pl" class="h-100">
	<head>
		<!-- title -->
		<title><?php print($title); ?></title>
		<!-- META -->
		<meta charset="<?php print(Flight::get('php.charset')); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Mateusz Tobor">
		<!-- Bootstrap core CSS -->
		<link href="<?php print(Flight::get('app.url').Flight::get('bootstrap.path')); ?>css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
		<!-- others -->
		<link href="<?php print(Flight::get('app.url')); ?>public/css/style.css" rel="stylesheet" crossorigin="anonymous">
		<link href="<?php print(Flight::get('app.url')); ?>public/img/favicon.png" rel="icon" sizes="256x256">
		<meta name="theme-color" content="#7952b3">
		<!-- jquery -->
		<script src="<?php print(Flight::get('app.url')); ?>public/js/jquery.min.js"></script>
		<script src="<?php print(Flight::get('app.url')); ?>public/js/preloader.js"></script>
		<!-- jquery ui -->
		<script src="<?php print(Flight::get('app.url')); ?>public/js/jquery-ui.min.js"></script>
		<link href="<?php print(Flight::get('app.url')); ?>public/css/jquery-ui.structure.min.css" rel="stylesheet">
		<link href="<?php print(Flight::get('app.url')); ?>public/css/jquery-ui.theme.min.css" rel="stylesheet">
	</head>
	<body class="d-flex flex-column h-100">
		<div class="preloader js-preloader flex-center">
			<div class="dots">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>
		<script>
			$('.preloader').preloadinator();
		</script>
		<header>
			<!-- Fixed navbar -->
			<nav class="navbar navbar-expand-md fixed-top bg-danger navbar-dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php print(Flight::get('app.url')); ?>">
					N<img src="<?php print(Flight::get('app.url')); ?>public/img/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">TUŚ
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="<?php print(Flight::get('lang.header_toggle_nav')); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav me-auto mb-2 mb-md-0">
							<?php
								if(Flight::get('user.type') != 0) {
									Flight::render('nav_user');
									if(Flight::get('user.type') == 2)
										Flight::render('nav_admin');
								}
								else Flight::render('nav_guest');
							?>
						</ul>
						<form class="d-flex" method="get" action="<?php print(Flight::get('app.url')); ?>">
							<input type="hidden" name="s" value="true">
							<input name="s_id" class="form-control me-2 col-lg shadow-sm" type="search" id="getnotus" placeholder="<?php print(Flight::get('lang.header_search_placeholder')); ?>" aria-label="Search">
							<button class="btn btn-dark" type="submit"><?php print(Flight::get('lang.header_search_btn')); ?></button>
						</form>
					</div>
				</div>
			</nav>
		</header>
		<main class="flex-shrink-0 mt-5">
			<div class="container mt-5 mb-5">
				<div class="shadow p-3 rounded bg-light">