<?php 

include_once 'conexion.php';
session_start();
//var_dump($_SESSION);

if (count($_SESSION) == 0) {
    
    header("Location:index.php");
    exit;
}

else if (isset($_SESSION['user'])) {
    header("Location:user_profile.php");
    exit;
}

$id = $_SESSION['artist']['id'];
$nombre = $_SESSION['artist']['username'];


/* $seguidos_sql = "SELECT * FROM playlist WHERE id_p IN (SELECT id_p FROM personas_playlist WHERE id = '$id')";
$p = $pdo->prepare($seguidos_sql);
$p->execute();
$seguidos = $p->fetchAll();
 */
//"SELECT * FROM playlist WHERE id_p NOT IN (SELECT id_p FROM personas_playlist WHERE NOT id = '$id')"
$no_seguidos_sql = "SELECT * FROM playlist WHERE id_p NOT IN (SELECT id_p FROM personas_playlist WHERE id = '$id') AND NOT id = '$id'";
$p1 = $pdo->prepare($no_seguidos_sql);
$p1->execute();
$no_seguidos = $p1->fetchAll();

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
<link rel="stylesheet" type="text/css" href="styles/episodes.css">
<link rel="stylesheet" type="text/css" href="styles/episodes_responsive.css">
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
                                <li><a href="artist_profile.php">Home</a></li>
								<li><a href="canciones_a.php">Mis canciones</a></li>
								<li><a href="albumes_a.php">Mis Álbumes</a></li>
								<li><a href="playlist_a.php">Playlist</a></li>
								<li><a href="explorar_a.php">Explorar</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Submit & Social -->
		<div class="header_right d-flex flex-row align-items-start justify-content-start">

			<!-- Submit -->
            <div class="submit"><a href="logout.php">Cerrar Sesión</a></div>


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
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/about.jpg" data-speed="0.8"></div>
		<div class="home_container d-flex flex-column align-items-center justify-content-center">
			<div class="home_content">
				<div class="home_title"><h1>Explorador de <?php echo $nombre ?></h1></div>
			</div>
		</div>
	</div>

	<!-- Episodes -->


<div class="col-12">
    
    <div class="container text-center text-white">
        <div class="row pt-5">
            <div class="col-lg-8 mx-auto">
                <h2 style=color:#000;padding-top:3rem!important;>Explora Playlists</h2>
                <p class="lead mb-0">Aqui puedes ver todos los Playlists que aún no sigues</p>
                </div>
            </div>
        </div><!-- End -->


        <div class="container py-5">
            <div class="row">
                <div class="col-lg-7 mx-auto bg-white rounded shadow">

                    <!-- Fixed header table-->
                    <div class="table-responsive text-center">
                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-3">Nombre</th>
                                    <th scope="col" class="col-3">Creado por</th>
                                    <th scope="col" class="col-3">Seguidores</th>
                                    <th scope="col" class="col-3">Ver Playlist</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($no_seguidos as $row1): ?>
                                    <?php 
                                        $i = $row1['id']; //id creador
                                        $id_p2 = $row1['id_p'];
                                        $name_pl= $row1['name_p'];
                                        $seguidores = $row1['followers'];
                                        $follows = "SELECT user_name1 FROM usuarios WHERE id='$i'";
                                        $lol = $pdo->prepare($follows);
                                        $lol->execute();
                                        $res = $lol->fetchAll();
                                        $creador = $res[0]['user_name1'];

                                    ?>
                                    <tr>
                                        <th scope="row" class="col-3"><?php echo $name_pl ?></th>
                                        <td class="col-3"><?php echo $creador ?></td>
                                        <td class="col-3"><?php echo $seguidores ?></td>
                                        <td class="col-3">
                                            <form method="post" action="ver_pl_unf1.php">
                                                <input type="hidden"  name="play" value="<?php echo $name_pl ?>">
                                                <input type="hidden"  name="id_pl" value=<?php echo $id_p2 ?>>
                                                <input type="hidden"  name="seguidores" value=<?php echo $seguidores ?>>
                                                <input type="hidden"  name="creador" value=<?php echo $creador ?>>
                                                <input type="hidden"  name="id" value=<?php echo $id ?>>
                                                <input name="follow" style="margin-right:10px;margin-left:15px" type="submit" value="Ver más">
                                            </form> 
                                        </td>
                                    </tr>
                                <?php endforeach ?>

                                

                            </tbody>
                        </table>
                    </div><!-- End -->
                    
                </div>
            </div>
        </div>
        <!-- Footer -->

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
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="plugins/jPlayer/jquery.jplayer.min.js"></script>
<script src="plugins/jPlayer/jplayer.playlist.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/episodes.js"></script>
</body>
</html>