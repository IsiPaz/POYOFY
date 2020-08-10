<?php
    include_once 'conexion.php';
    session_start();

    if (count($_SESSION) == 0) {
        header("Location:index.php");
        exit;
    }

    else if (isset($_SESSION['artist'])) {
        header("Location: artist_profile.php");
        exit;
    }

    $id = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']['username'];
    //var_dump($nombre);
    $sql_leer = "SELECT * FROM canciones_like WHERE id = '$id'";

    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();

    $result = $gsent->fetchAll();

    if(count($result)==0){
        $print = "<h2>No hay canciones</h2>";
    }

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
								<li><a href="user_profile.php">Home</a></li>
                                <li><a href="canciones_u.php">Mis canciones</a></li>
								<li><a href="playlist_u.php">Mis Playlists</a></li>
								<li><a href="explorar.php">Explorar</a></li>
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
				<div class="home_title"><h1>Canciones &#10084 <?php echo $nombre ?></h1></div>
			</div>
		</div>
	</div>

	<!-- Episodes -->

	<div class="episodes">
		<div class="container">
			
			<div class="row episodes_row">
				
				<!-- Sidebar -->
				<div class="col-lg-3">
					<div class="sidebar">
						
						<!-- Search -->
						<!-- <div class="sidebar_search">
							<div class="sidebar_title">Search</div>
							<form action="#" class="search_form" id="search_form">
								<input type="text" class="search_input" placeholder="Search here" required="required">
								<button class="search_button"><img src="images/search.png" alt=""></button>
							</form>
						</div> -->

						<!-- Categories -->
						<div class="sidebar_list">
							<div class="sidebar_title">Categories</div>
							<ul>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Music</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Social Media</a></li>
								<li><a href="#">Art</a></li>
								<li><a href="#">Audiobooks</a></li>
								<li><a href="#">Documentaries</a></li>
							</ul>
						</div>

						<!-- Tags -->
						<div class="sidebar_tags">
							<div class="sidebar_title">Tags</div>
							<div class="tags">
								<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
									<li><a href="#">music</a></li>
									<li><a href="#">art</a></li>
									<li><a href="#">technology</a></li>
									<li><a href="#">travel & food</a></li>
									<li><a href="#">viral</a></li>
									<li><a href="#">interview</a></li>
									<li><a href="#">social media</a></li>
									<li><a href="#">development</a></li>
									<li><a href="#">success</a></li>
									<li><a href="#">did you know?</a></li>
									<li><a href="#">live</a></li>
								</ul>
							</div>
						</div>

						<!-- Archive -->
						<div class="sidebar_archive">
							<div class="sidebar_title">Archive</div>
							<div class="dropdown">
								<ul>
									<li class="dropdown_selected d-flex flex-row align-items-center justify-content-start"><span>September 2018</span><i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
										<ul>
											<li><a href="#">August 2018</a></li>
											<li><a href="#">July 2018</a></li>
											<li><a href="#">June 2018</a></li>
											<li><a href="#">May 2018</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Episodes -->
				<div class="col-lg-9 episodes_col">
					<div class="episodes_container">
						<?php
							if(isset($print)){
								echo $print;
							} 
							
						?>
                        <!-- Episode -->
                        <?php foreach($result as $dato): ?>
						<div class="episode d-flex flex-row align-items-start justify-content-start s1">
							<div>
								<div class="episode_image">
									<img src="images/music1.jpg" alt="">
									<div class="tags">
										<ul class="d-flex flex-row align-items-start justify-content-start">
											<li><a href="#">music</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="episode_content">
                                <?php 
                                    $id_s = $dato['id_s']; //cancion actual de la lista de likes que reviso
									//$id = $dato['id'];
                                    $sql_canciones = "SELECT * FROM canciones WHERE id_s = '$id_s'"; //datos de la cancion
                                    $gsent = $pdo->prepare($sql_canciones);
                                    $gsent->execute();
                                    $cancion = $gsent->fetchAll();

                                    foreach ($cancion as $row){
                                        $nombre_cancion = $row['name_c'];
                                        $duracion = $row['released'];
                                        $id_album = $row['id_a'];
										$id_artista = $row['id'];
										$likes = $row['likes'];
                                        if (!isset($id_album)){
                                            $nombre_album = "...";
                                        }
                                        else{
                                            $sql_select1 = "SELECT name_a FROM albumes WHERE id_a = '$id_album'";
                                            $gsent1 = $pdo->prepare($sql_select1);
                                            $gsent1->execute();
                                            $result1 = $gsent1->fetchAll();
                                            $nombre_album = $result1[0]['name_a'];
                                        }

                                        $sql_artista = "SELECT user_name1 FROM artista WHERE id = '$id_artista'";
                                        $gsent1 = $pdo->prepare($sql_artista);
                                        $gsent1->execute();
                                        $name_a = $gsent1->fetchAll();
                                        $nombre_artista = $name_a[0]['user_name1'];

                                    }



                                ?>
                                <div class="episode_name"><a href="episode.html"><?php echo $nombre_cancion?> - By <?php echo $nombre_artista ?> - Álbum <?php echo $nombre_album ?></a></div>

								<div class="episode_date"><a href="#"><?php echo $duracion ?> </a></div>
								<div class="show_info d-flex flex-row align-items-start justify-content-start">
									<div class="show_fav d-flex flex-row align-items-center justify-content-start">
										<div class="show_fav_icon show_info_icon"><img class="svg" src="images/heart.svg" alt=""></div>
										<div class="show_fav_count">
                                            <?php 
                                                if (isset($likes)){
													echo $likes;
                                                }
                                                else if (!isset($dato['likes'])){
                                                    echo "0";
                                                }
                                            ?>
                                        </div>
									</div>
								</div>
								<!-- Player -->
								<div class="single_player_container">
									
									<div class="single_player d-flex flex-row align-items-center justify-content-start">
										<div id="jplayer_1" class="jp-jplayer"></div>
										<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
											<div class="jp-type-single">
												<div class="player_controls">
													<div class="jp-gui jp-interface d-flex flex-row align-items-center justify-content-start">
														<div class="jp-controls-holder time_controls d-flex flex-row align-items-center justify-content-between">
															<div>
																<div class="jp-controls-holder play_button ml-auto">
																	<button class="jp-play" tabindex="0"></button>
																</div>
															</div>
															<div>
																<div class="jp-progress">
																	<div class="jp-seek-bar">
																		<div class="jp-play-bar"></div>
																	</div>
																</div>
															</div>
														</div>
														<div class="jp-volume-controls d-flex flex-row align-items-center justify-content-between ml-auto">
														<form method="post" action="eliminar_cancion_user.php">
																<input name="eliminar" style="margin-right:10px;margin-left:15px" type="submit" value="Dislike">
																<input type="hidden"  name="id_s" value=<?php echo $id_s ?>>
															</form> 
														
														</div>
													</div>
												</div>
												<div class="jp-no-solution">
													<span>Update Required</span>
													To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
                        </div>
                        <?php endforeach ?>
                        

					</div>
				</div>
			</div>
			<div class="row page_nav_row">
				<div class="col">
					<div class="page_nav d-flex flex-row align-items-center justify-content-center">
						<ul class="d-flex flex-row">
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row footer_logo_row">
				<div class="col d-flex flex-row align-items-center justify-content-center">
					<div class="logo">
                        <a href="#"><img src="images/logo.png" style="width:50px; height:50px; alt="" > Poyofy</a>
					</div>
				</div>
			</div>
			<div class="row footer_content_row">
				
				<!-- Tags -->
				<div class="col-lg-4">
					<div class="footer_title">Tags</div>
					<div class="footer_list">
						<div><div><a href="#">music</a></div></div>
						<div><div><a href="#">kirby</a></div></div>
						<div><div><a href="#">informáticos</a></div></div>
						<div><div><a href="#">mendoza</a></div></div>
						<div><div><a href="#">bases de datos</a></div></div>
						<div><div><a href="#">pink</a></div></div>
						<div><div><a href="#">poyofy</a></div></div>
						<div><div><a href="#">developement</a></div></div>
						<div><div><a href="#">kpop</a></div></div>
						<div><div><a href="#">pop</a></div></div>
						<div><div><a href="#">electro</a></div></div>
						<div><div><a href="#">USM</a></div></div>
					</div>
				</div>

				<!-- Latest Episodes -->
				<div class="col-lg-4">
					<div class="footer_title">Latest Episodes</div>
					<div class="latest_container">
						
						<!-- Latest -->
						<div class="latest">
							<div class="latest_title_container d-flex flex-row align-items-start justify-content-start">
								<a href="episode.html">
									<div class="d-flex flex-row align-items-start justify-content-start">
										<div class="latest_play">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 714 714" style="enable-background:new 0 0 714 714;" xml:space="preserve">
												<g id="Play">
													<path d="M641.045,318.521L102,0C73.822,0,51,22.822,51,51v612c0,28.178,22.822,51,51,51l539.045-318.521      C654.661,387.422,663,372.81,663,357C663,341.19,654.661,326.579,641.045,318.521z M153,565.386V148.614L505.665,357      L153,565.386z" fill="#FFFFFF"/>
												</g>
											</svg>
										</div>
										<div class="latest_title_content">
											<div class="latest_title">Season 4 Episode 48 - A Step Further</div>
										</div>
									</div>
								</a>
							</div>
							<div class="latest_episode_info">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="#">September 24, 2018</a></li>
									<li><a href="#">Music</a></li>
								</ul>
							</div>
						</div>

						<!-- Latest -->
						<div class="latest">
							<div class="latest_title_container d-flex flex-row align-items-start justify-content-start">
								<a href="episode.html">
									<div class="d-flex flex-row align-items-start justify-content-start">
										<div class="latest_play">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 714 714" style="enable-background:new 0 0 714 714;" xml:space="preserve">
												<g id="Play">
													<path d="M641.045,318.521L102,0C73.822,0,51,22.822,51,51v612c0,28.178,22.822,51,51,51l539.045-318.521      C654.661,387.422,663,372.81,663,357C663,341.19,654.661,326.579,641.045,318.521z M153,565.386V148.614L505.665,357      L153,565.386z" fill="#FFFFFF"/>
												</g>
											</svg>
										</div>
										<div class="latest_title_content">
											<div class="latest_title">Season 4 Episode 47 - Deep in Crypto</div>
										</div>
									</div>
								</a>
							</div>
							<div class="latest_episode_info">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="#">September 24, 2018</a></li>
									<li><a href="#">Music</a></li>
								</ul>
							</div>
						</div>

						<!-- Latest -->
						<div class="latest">
							<div class="latest_title_container d-flex flex-row align-items-start justify-content-start">
								<a href="episode.html">
									<div class="d-flex flex-row align-items-start justify-content-start">
										<div class="latest_play">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 714 714" style="enable-background:new 0 0 714 714;" xml:space="preserve">
												<g id="Play">
													<path d="M641.045,318.521L102,0C73.822,0,51,22.822,51,51v612c0,28.178,22.822,51,51,51l539.045-318.521      C654.661,387.422,663,372.81,663,357C663,341.19,654.661,326.579,641.045,318.521z M153,565.386V148.614L505.665,357      L153,565.386z" fill="#FFFFFF"/>
												</g>
											</svg>
										</div>
										<div class="latest_title_content">
											<div class="latest_title">Season 4 Episode 46 - Nothing is real</div>
										</div>
									</div>
								</a>
							</div>
							<div class="latest_episode_info">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="#">September 24, 2018</a></li>
									<li><a href="#">Music</a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>

				<!-- Gallery -->
				<div class="col-lg-4">
					<div class="footer_title">Instagram</div>
					<div class="gallery d-flex flex-row align-items-start justify-content-start flex-wrap">
						
						<!-- Gallery Item -->
						<div class="gallery_item">
							<a class="colorbox" href="images/gallery_1_large.jpg"><img src="images/gallery_1.jpg" alt=""></a>
						</div>

						<!-- Gallery Item -->
						<div class="gallery_item">
							<a class="colorbox" href="images/gallery_2_large.jpg"><img src="images/gallery_2.jpg" alt=""></a>
						</div>

						<!-- Gallery Item -->
						<div class="gallery_item">
							<a class="colorbox" href="images/gallery_3_large.jpg"><img src="images/gallery_3.jpg" alt=""></a>
						</div>

						<!-- Gallery Item -->
						<div class="gallery_item">
							<a class="colorbox" href="images/gallery_4_large.jpg"><img src="images/gallery_4.jpg" alt=""></a>
						</div>

						<!-- Gallery Item -->
						<div class="gallery_item">
							<a class="colorbox" href="images/gallery_5_large.jpg"><img src="images/gallery_5.jpg" alt=""></a>
						</div>

					</div>
				</div>
			</div>

		</div>
	</footer>
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