<?php

include_once 'conexion.php';

$sql_leer = 'SELECT * FROM canciones ORDER BY name_c LIMIT 4';

$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

$result = $gsent->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Poyofy</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="My Podcast template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_400">

		<!-- Logo -->
		<div class="logo">
			<a href="#"><img src="images/logo.png" style="width:50px; height:50px; alt="" > Poyofy</a>
		</div>

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-start justify-content-start">
								<li><a href="index.php">Home</a></li>
								<li><a href="about.html">Canciones</a></li>
								<li><a href="episodes.html">Playlist</a></li>
								<li><a href="blog.html">Artistas</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Submit & Social -->
		<div class="header_right d-flex flex-row align-items-start justify-content-start">

			<!-- Submit -->
            <div class="submit"><a href="login.php">Iniciar Sesión</a></div>


			<!-- Hamburger -->
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			
		</div>
	</header>

	<!-- Menu -->

	<div class="menu">
		<div class="menu_content d-flex flex-column align-items-end justify-content-start">
			<ul class="menu_nav_list text-right">
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="episodes.html">Episodes</a></li>
				<li><a href="blog.html">Blog</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
			<div class="menu_extra d-flex flex-column align-items-end justify-content-start">
				<div class="menu_submit"><a href="#">Submit your podcast</a></div>
				<div class="social">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-soundcloud" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url(images/index.jpg)"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="tags">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="#">lifestyle</a></li>
									<li><a href="#">interview</a></li>
									<li><a href="#">last episode</a></li>
								</ul>
							</div>
							<div class="home_title"><h1>Música para todos.</h1></div>
							<div class="home_subtitle">Poyofy brinda el mejor servicio de streaming de música.</div>
							<div class="button_border home_button trans_200"><a href="registrar_u.php">Regístrate como Usuario</a></div>
							<div class="button_border home_button trans_200" style = margin-left:15px;><a href="registrar_a.php">Regístrate como Artista</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>