<?php

    include_once 'conexion.php';

	session_start();
	//var_dump($_SESSION);

	if (count($_SESSION) == 0) {
		
		//header("Location:index.php");
		exit;
	}

	else if (isset($_SESSION['user'])) {
		//header("Location:user_profile.php");
		exit;
	}

	$id = $_SESSION['artist']['id'];
    $nombre = $_SESSION['artist']['username'];
    
    $sql_leer = "SELECT * FROM canciones WHERE id = '$id' AND id_a IS NULL";

    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();

	$result = $gsent->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Episode</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="My Podcast template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/episode.css">
<link rel="stylesheet" type="text/css" href="styles/episode_responsive.css">

<!-- <link rel="stylesheet" href="style/bootstrap-select.css"><link rel="stylesheet" href="style/bootstrap-select.css"> -->

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
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/newsletter.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title"><h1>Bienvenido <?php echo $nombre ?> </h1></div>
						</div>
					</div>
				</div>
			</div>		
		</div>
		<div class="home_player_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 offset-lg-3">
						
						<!-- Episode -->
						<div class="player d-flex flex-row align-items-start justify-content-start s1">
							<div class="player_content">
								
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
															<div class="d-flex flex-row align-items-center justify-content-start">
																<button class="jp-mute" tabindex="0"></button>
															</div>
															<div class="d-flex flex-row align-items-center justify-content-start">
																<div class="jp-volume-bar">
																	<div class="jp-volume-bar-value"></div>
																</div>
															</div>
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



								<?php 
									$sql_sel = "SELECT seguidores FROM personas WHERE id = '$id'";
									$gsent1 = $pdo->prepare($sql_sel);
									$gsent1->execute();
								
									$result1 = $gsent1->fetchAll();
									
									if (isset($result1[0]['seguidores']) ){
                                        $seguidores = $result1[0]['seguidores'];
                                    }
                                    else{
										$seguidores = 0;
                                    }

								
								?>



								<div class="show_info d-flex flex-row align-items-start justify-content-start">
									<div class="show_fav d-flex flex-row align-items-center justify-content-start">
										<div class="show_fav_icon show_info_icon"><img class="svg" src="images/heart.svg" alt=""></div>
										<div class="show_fav_count"><?php echo $seguidores?> Seguidores</div>
									</div>
									
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Episode -->

	<div class="episode_container">

		<!-- Episode Image -->
		<div class="episode_image_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<!-- Episode Image -->
						<div class="episode_image"><img src="images/artista.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				
				<!-- Sidebar -->
				<div class="col-lg-3 order-lg-1 order-2 sidebar_col">
					<div class="sidebar">



						<!-- Categories -->
						<div class="sidebar_list">

						<div class="bs-example" >
						
						<!-- Button HTML (to Trigger Modal) -->
						<!-- <a href="#myModal" role="button" type="button"  data-target="#exampleModal" data-whatever="@mdo" class="btn btn-lg btn-primary"  data-toggle="modal" >Cambiar datos</a> -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style=background-color:#fd99a7;border-color:#fd99a7;border-radius:1.5rem;>Cambiar datos</button>
						</div>

							
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

				<!-- Episode -->
				<div class="col-lg-9 episode_col order-lg-2 order-1">
					<div class="intro">
						<div class="section_title">Audio Podcast - New Technologies that will rule the word</div>
						<div class="intro_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum malesuada tellus a pretium. Proin quam nisi, maximus in pulvinar sed, viverra vitae est. Ut nibh nisl, malesuada nec massa nec, molestie varius lorem. Mauris aliquet eros eu luctus pulvinar. Suspendisse dapibus iaculis tellus, dignissim posuere felis elementum a. Curabitur a nibh vel eros accumsan semper vitae quis enim. Vivamus id leo a ante cursus semper. Suspendisse sit amet mattis mi. Pellentesque tellus diam, vehicula nec felis ut, suscipit porttitor nisl. Nam sit amet consequat nulla, ut mollis dolor. Vivamus id tristique tortor. Quisque ultrices odio urna, a maximus dui tincidunt sit amet. Morbi sagittis ipsum nec sem egestas congue.</p>
						</div>
					</div>
					<div class="guests">
						<div class="section_title">Guests</div>
						<div class="guests_container d-flex flex-md-row flex-column align-items-md-start align-items-center justify-content-start">
							
							<!-- Guest -->
							<div class="guest_container">
								<div class="guest">
									<div class="guest_image"><img src="images/guest_1.jpg" alt="https://unsplash.com/@stairhopper"></div>
									<div class="guest_content text-center">
										<div class="guest_name"><a href="#">Michael Smith</a></div>
										<div class="guest_title">Developer</div>
									</div>
								</div>
							</div>

							<!-- Guest -->
							<div class="guest_container">
								<div class="guest">
									<div class="guest_image"><img src="images/guest_2.jpg" alt="https://unsplash.com/@eyeforebony"></div>
									<div class="guest_content text-center">
										<div class="guest_name"><a href="#">Samantha Doe</a></div>
										<div class="guest_title">Developer</div>
									</div>
								</div>
							</div>

							<!-- Guest -->
							<div class="guest_container">
								<div class="guest">
									<div class="guest_image"><img src="images/guest_3.jpg" alt="https://unsplash.com/@onurozkardes"></div>
									<div class="guest_content text-center">
										<div class="guest_name"><a href="#">James Williams</a></div>
										<div class="guest_title">Developer</div>
									</div>
								</div>
							</div>

						</div>
					</div>

                    <!-- canciones -->
                    <div class="comment_form_container">
						<div class="section_title">Crea una canción</div>
						<form method="POST" action="crear_cancion.php" id="comment_form" class="comment_form">
							<div class="row">
								<div class="col-md-4">
									<input type="text" class="comment_input" name="nombre_c" placeholder="Nombre de la canción" required="required">
								</div>
								<div class="col-md-4">
									<input type="date" class="comment_input" name="fecha" placeholder="Fecha de lanzamiento" required="required">
								</div>
                                <div class="col-md-4">
                                    <input type="time" min="00:01"  max="20:00" name="tiempo" class="comment_input" placeholder="Duración"> 
								</div>
								<input type="hidden"  name="id" value=<?php echo $id?>>

							</div>
							
								
							<button class="comment_button button_fill" name="crear">Crear</button>
						</form>
					</div>


                    <!-- Album -->
					<div class="comment_form_container">
						<div class="section_title">Crea un Álbum</div>
						<form method="POST" action="crear_album.php" id="comment_form" class="comment_form">
							<div class="row">
                            <div class="col-md-4">
                                <input type="text" class="comment_input" name="nombre_a" placeholder="Nombre del Albúm" required="required">
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="comment_input" name="fecha_a" placeholder="Fecha de lanzamiento" required="required">
                            </div>
                            <div class="col-md-4">
                                <input type="time" min="00:01"  max="120:00" name="tiempo_a" class="comment_input" placeholder="Duración"> 
                            </div>
							</div>
							<div>
                            <label>Seleccione las canciones que desea ingresar manteniendo CTRL + click</label>
                            <select required multiple class="selectpicker form-control" name="canciones[]" placeholder="canciones" >
							
                                <option disabled="disabled" selected="selected">Añadir canciones</option>
                                <?php foreach($result as $dato): ?>
                                	<option value='<?php echo $dato['id_s']?>'> <?php echo $dato['name_c']?> </option>
                                <?php endforeach ?>
							</select></div>
							<input type="hidden"  name="id" value=<?php echo $id?>>
							<button class="comment_button button_fill" name="crear_a">send</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>





	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method=POST action="update_cuenta_artist.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cambiar</label>
            <select class="form-control" name="campo" required>
				<option>Nombre de artista</option>
				<option>Email</option>
				<option>Contraseña</option>
			</select>
          </div> 
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ingrese el nuevo valor</label>
            <input type="text" name="new" class="form-control" placeholder="Escriba bien el formato" id="recipient-name" required>
          </div>
			<!-- 		  <div class="form-group">
						<label for="recipient-name" class="col-form-label">Escribe el nuevo valor:</label>
						<input type="text" name="new" class="form-control" placeholder="Nombre de la Playlist" id="recipient-name" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Escribe el nuevo valor:</label>
						<input type="text" name="new" class="form-control" placeholder="Nombre de la Playlist" id="recipient-name" required>
					</div> -->
		  <input type="hidden" name="id" value=<?php echo $id ?>>
		  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" name="update" class="btn btn-primary">Cambiar</button>
			</div>
          
        </form>
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
<script src="js/episode.js"></script>


<!-- <script src="js/bootstrap-select.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->



</body>
</html>

<?php 






