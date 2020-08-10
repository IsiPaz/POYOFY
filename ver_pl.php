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



    if (isset($_POST['follow_pl'])){
        $id_pl= $_POST['id_pl'];
        $name_pla = $_POST['play'];
        $seguidores = $_POST['seguidores'];
        $creador = $_POST['creador'];

        $sql_leer = "SELECT * FROM canciones_playlist WHERE id_p = '$id_pl'";

        $gsent = $pdo->prepare($sql_leer);
        $gsent->execute();
    
        $result = $gsent->fetchAll();  //playlists del user
        $dato = $result[0];
    
        if(count($result)==0){
            $print = "<h2>No hay playlists</h2>";
        } 
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
        <link
            rel="stylesheet"
            type="text/css"
            href="styles/bootstrap-4.1.2/bootstrap.min.css">
        <link
            href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"
            rel="stylesheet"
            type="text/css">
        <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="styles/blog.css">
        <link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">

    </head>
    <body>

        <div class="super_container">

            <!-- Header -->

            <header class="header trans_400">

                <!-- Logo -->
                <div class="logo">
                    <a href="#"><img
                        src="images/logo.png"
                        style="width:50px; height:50px; alt="
                        " > Poyofy</a>
		</div>

		<div class="
                        container"="
                        container""="container"
                        "">
                        <div class="row">
                            <div class="col">
                                <div
                                    class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
                                    <nav class="main_nav">
                                        <ul class="d-flex flex-row align-items-start justify-content-start">
                                            <li>
                                                <a href="user_profile.php">Home</a>
                                            </li>
                                            <li>
                                                <a href="canciones_u.php">Mis canciones</a>
                                            </li>
                                            <li>
                                                <a href="playlist_u.php">Mis Playlists</a>
                                            </li>
                                            <li>
                                                <a href="explorar.php">Explorar</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit & Social -->
                    <div
                        class="header_right d-flex flex-row align-items-start justify-content-start">

                        <!-- Submit -->
                        <div class="submit">
                            <a href="logout.php">Cerrar Sesión</a>
                        </div>

                        <!-- Hamburger -->
                        <div class="hamburger">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>

                    </div>
                </header>

                <!-- Menu -->

                <div class="menu">
                    <div
                        class="menu_content d-flex flex-column align-items-end justify-content-start">
                        <ul class="menu_nav_list text-right">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About</a>
                            </li>
                            <li>
                                <a href="episodes.html">Episodes</a>
                            </li>
                            <li>
                                <a href="blog.html">Blog</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                        <div
                            class="menu_extra d-flex flex-column align-items-end justify-content-start">
                            <div class="menu_submit">
                                <a href="#">Submit your podcast</a>
                            </div>
                            <div class="social">
                                <ul class="d-flex flex-row align-items-start justify-content-start">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-soundcloud" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-vimeo" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Home -->

                <div class="home">
                    <div
                        class="parallax_background parallax-window"
                        data-parallax="scroll"
                        data-image-src="images/blog.jpg"
                        data-speed="0.8"></div>
                    <div
                        class="home_container d-flex flex-column align-items-center justify-content-center">
                        <div class="home_content">
                            <div class="home_title">
                                <h1>Playlist que sigue 
                                    <?php echo $nombre ?></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog -->

                <div class="blog">
                    <div class="container">
                        <div class="row">

                            


                            <!-- Blog -->
                            <div class="col-lg-12 blog_col order-lg-2 order-1">
                                <div class="blog_posts">

                                    <?php
                                        if(isset($print)){
                                            echo $print;
                                        } 
                                        
                                    ?>

                                    <!-- Blog Post -->
                                    <div
                                        class="blog_post d-flex flex-md-row flex-column align-items-start justify-content-start">
                                        <div class="blog_post_image">
                                            <img src="images/pl.jpg" alt="https://unsplash.com/@kellysikkema">
                                        </div>
                                        <div class="blog_post_date">
                                            <a href="#">
                                                <?php echo $seguidores ?>
                                                ❤</a>
                                        </div>
                                        <div class="blog_post_content">
                                            <div class="blog_post_title">
                                                <a href="#" disabled="disabled"><?php echo $name_pla ?></a>
                                                By <?php echo $creador ?>

                                            </div>
                                            <div class="row">
                                                <form method="post" action="dislike_playlist.php">
                                                    <input
                                                        name="dislike_p"
                                                        style="margin-top:5px;margin-right:10px; margin-left:14px"
                                                        type="submit"
                                                        value="Dejar de seguir">
                                                        <input type="hidden" name="id" value=<?php echo $id ?>>
                                                    <input type="hidden" name="id_p" value=<?php echo $id_pl ?>>
                                                </form>
                                            </div>

                                            <div class="container py-3">
                                                <div class="row">
                                                    <div class="col-lg-12 mx-auto bg-white rounded shadow">
                                                        <?php 
														$id_p = $dato['id_p'];
														$sql_canciones = "SELECT * FROM canciones_playlist WHERE id_p = '$id_p'";
														$gsent = $pdo->prepare($sql_canciones);
														$gsent->execute();
														$canciones = $gsent->fetchAll();

													?>
                                                        <!-- Fixed header table-->
                                                        <div class="table-responsive text-center">
                                                            <table class="table table-fixed">
                                                                <thead style="color:#fd99a7">
                                                                    <tr>
                                                                        <th scope="col" class="col-4">Canción</th>
                                                                        <th scope="col" class="col-4">Artista</th>
                                                                        <th scope="col" class="col-4">Álbum</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <?php foreach($canciones as $song): ?>
                                                                    <?php
																			$id_c = $song['id_s'];
																			$sql = "SELECT * FROM canciones WHERE id_s = '$id_c'";
																			$gsent = $pdo->prepare($sql);
																			$gsent->execute();	
																			$cancion = $gsent->fetchAll();
																			
																			$id_artista = $cancion[0]['id'];
																			$sql_artista = "SELECT user_name1 FROM artista WHERE id = '$id_artista'";
																			$gsent1 = $pdo->prepare($sql_artista);
																			$gsent1->execute();
																			$name_a = $gsent1->fetchAll();
																			$nombre_artista = $name_a[0]['user_name1'];

																			if (!isset($cancion[0]['id_a'])){
																				$nombre_album = "-";
																			}
																			else{
																				$id_album = $cancion[0]['id_a'];
																				$sql_select1 = "SELECT name_a FROM albumes WHERE id_a = '$id_album'";
																				$gsent2 = $pdo->prepare($sql_select1);
																				$gsent2->execute();
																				$result1 = $gsent2->fetchAll();
																				$nombre_album = $result1[0]['name_a'];

																				
																			}
																			
																		?>
                                                                        <td class="col-4"><?php echo $cancion[0]['name_c'] ?></td>
                                                                        <td class="col-4"><?php echo $nombre_artista ?></td>
                                                                        <td class="col-4"><?php echo $nombre_album ?></td>
                                                                        <?php endforeach ?>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- End -->

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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
                        <script src="plugins/easing/easing.js"></script>
                        <script src="plugins/progressbar/progressbar.min.js"></script>
                        <script src="plugins/parallax-js-master/parallax.min.js"></script>
                        <script src="js/blog.js"></script>
                    </body>
                </html>