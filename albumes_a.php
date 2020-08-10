<?php

    include_once 'conexion.php';
    // include 'buscar_album.php';

	session_start();

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
    
    $sql_leer = "SELECT * FROM albumes WHERE id = '$id' ";

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
                                <h1>Álbumes de
                                    <?php echo $nombre ?></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog -->

                <div class="blog">
                    <div class="container">
                        <div class="row">

                            <!-- Sidebar -->
                            <div class="col-lg-3 order-lg-1 order-2 sidebar_col">
                                <div class="sidebar">

                                    <!-- Search -->
                                    <!-- <div class="sidebar_search"> <div class="sidebar_title">Buscar Álbum</div>
                                    <form method=POST action="albumes_a.php" class="search_form" id="search_form">
                                    <input type="text" class="search_input" name="buscar_album" placeholder="Escribe
                                    el nombre del álbum" required="required"> <button class="search_button"
                                    name="buscar"><img src="images/search.png" alt=""></button> </form> </div> -->

                                    <!-- Categories -->
                                    <div class="sidebar_list">
                                        <div class="sidebar_title">Categories</div>
                                        <ul>
                                            <li>
                                                <a href="#">Travel</a>
                                            </li>
                                            <li>
                                                <a href="#">Music</a>
                                            </li>
                                            <li>
                                                <a href="#">Lifestyle</a>
                                            </li>
                                            <li>
                                                <a href="#">Social Media</a>
                                            </li>
                                            <li>
                                                <a href="#">Art</a>
                                            </li>
                                            <li>
                                                <a href="#">Audiobooks</a>
                                            </li>
                                            <li>
                                                <a href="#">Documentaries</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Tags -->
                                    <div class="sidebar_tags">
                                        <div class="sidebar_title">Tags</div>
                                        <div class="tags">
                                            <ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
                                                <li>
                                                    <a href="#">music</a>
                                                </li>
                                                <li>
                                                    <a href="#">art</a>
                                                </li>
                                                <li>
                                                    <a href="#">technology</a>
                                                </li>
                                                <li>
                                                    <a href="#">travel & food</a>
                                                </li>
                                                <li>
                                                    <a href="#">viral</a>
                                                </li>
                                                <li>
                                                    <a href="#">interview</a>
                                                </li>
                                                <li>
                                                    <a href="#">social media</a>
                                                </li>
                                                <li>
                                                    <a href="#">development</a>
                                                </li>
                                                <li>
                                                    <a href="#">success</a>
                                                </li>
                                                <li>
                                                    <a href="#">did you know?</a>
                                                </li>
                                                <li>
                                                    <a href="#">live</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Archive -->
                                    <div class="sidebar_archive">
                                        <div class="sidebar_title">Archive</div>
                                        <div class="dropdown">
                                            <ul>
                                                <li
                                                    class="dropdown_selected d-flex flex-row align-items-center justify-content-start">
                                                    <span>September 2018</span>
                                                    <i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
                                                    <ul>
                                                        <li>
                                                            <a href="#">August 2018</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">July 2018</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">June 2018</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">May 2018</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blog -->
                            <div class="col-lg-9 blog_col order-lg-2 order-1">
                                <div class="blog_posts">

                                    <!-- Blog Post -->
                                    <?php foreach($result as $dato): ?>
                                    <div
                                        class="blog_post d-flex flex-md-row flex-column align-items-start justify-content-start">
                                        <div class="blog_post_image">
                                            <img src="images/albumes1.jpg" alt="https://unsplash.com/@kellysikkema">
                                            <div class="blog_post_date">
                                                <a href="#"><?php echo $dato['released'] ?></a>
                                            </div>
                                        </div>
                                        <div class="blog_post_content">
                                            <div class="blog_post_title">
                                                <a href="#"><?php echo $dato['name_a'] ?></a> By <?php echo $nombre ?>
                                            </div>
                                            <div class=row>
                                                <form method="post" action="eliminar_album.php" >
                                                    <input name="eliminar_a" style="margin-top:5px;margin-right:10px; margin-left:14px" type="submit" value="Eliminar">
                                                    <input type="hidden"  name="id_a" value=<?php echo $dato['id_a'] ?>>
                                                </form> 
                                                <form method="post" action="editar_album.php">
                                                    
                                                    <input type="hidden"  name="id" value=<?php echo $id ?>>
                                                    <input type="hidden"  name="name" value=<?php echo $nombre ?>>
                                                    <input type="hidden"  name="id_a" value=<?php echo $dato['id_a'] ?>>
                                                    <input type="hidden"  name="name_al" value=<?php echo $dato['name_a'] ?>>
                                                    
                                                    <input name="editar" style="margin-top:5px;margin-right:10px"  type="submit"  value="Editar">
                                                    
                                                </form> 
                                            </div>
                                            
                                            <div class="blog_post_text">
                                                <?php 
                                                    $id_a = $dato['id_a'];
                                                    $sql_canciones = "SELECT * FROM canciones WHERE id_a = '$id_a'";
                                                    $gsent = $pdo->prepare($sql_canciones);
                                                    $gsent->execute();
                                                    $canciones = $gsent->fetchAll();

                                                ?>
                                                <div class="tags">
                                                    <h3>Canciones</h3>

                                                    <ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
                                                        <?php foreach($canciones as $song): ?>
                                                        <li>
                                                            <a href="#"><?php echo $song['name_c'] ?></a>
                                                        </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php endforeach ?>

                                </div>
                            </div>
                        </div>

                        <!-- Page Nav -->
                        <div class="row page_nav_row">
                            <div class="col">
                                <div class="page_nav d-flex flex-row align-items-center justify-content-center">
                                    <ul class="d-flex flex-row">
                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a href="#">3</a>
                                        </li>
                                        <li>
                                            <a href="#">4</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            </a>
                                        </li>
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
                        
			            <div class="
                                        row="row"
                                        footer_content_row"="footer_content_row"">

                                        <!-- Tags -->
                                        <div class="col-lg-4">
                                            <div class="footer_title">Tags</div>
                                            <div class="footer_list">
                                                <div>
                                                    <div>
                                                        <a href="#">music</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">kirby</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">informáticos</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">mendoza</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">bases de datos</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">pink</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">poyofy</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">developement</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">kpop</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">pop</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">electro</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="#">USM</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Latest Episodes -->
                                        <div class="col-lg-4">
                                            <div class="footer_title">Latest Episodes</div>
                                            <div class="latest_container">

                                                <!-- Latest -->
                                                <div class="latest">
                                                    <div
                                                        class="latest_title_container d-flex flex-row align-items-start justify-content-start">
                                                        <a href="episode.html">
                                                            <div class="d-flex flex-row align-items-start justify-content-start">
                                                                <div class="latest_play">
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        version="1.1"
                                                                        id="Capa_1"
                                                                        x="0px"
                                                                        y="0px"
                                                                        width="512px"
                                                                        height="512px"
                                                                        viewbox="0 0 714 714"
                                                                        style="enable-background:new 0 0 714 714;"
                                                                        xml:space="preserve">
                                                                        <g id="Play">
                                                                            <path
                                                                                d="M641.045,318.521L102,0C73.822,0,51,22.822,51,51v612c0,28.178,22.822,51,51,51l539.045-318.521      C654.661,387.422,663,372.81,663,357C663,341.19,654.661,326.579,641.045,318.521z M153,565.386V148.614L505.665,357      L153,565.386z"
                                                                                fill="#FFFFFF"/>
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
                                                            <li>
                                                                <a href="#">September 24, 2018</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Music</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Latest -->
                                                <div class="latest">
                                                    <div
                                                        class="latest_title_container d-flex flex-row align-items-start justify-content-start">
                                                        <a href="episode.html">
                                                            <div class="d-flex flex-row align-items-start justify-content-start">
                                                                <div class="latest_play">
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        version="1.1"
                                                                        id="Capa_1"
                                                                        x="0px"
                                                                        y="0px"
                                                                        width="512px"
                                                                        height="512px"
                                                                        viewbox="0 0 714 714"
                                                                        style="enable-background:new 0 0 714 714;"
                                                                        xml:space="preserve">
                                                                        <g id="Play">
                                                                            <path
                                                                                d="M641.045,318.521L102,0C73.822,0,51,22.822,51,51v612c0,28.178,22.822,51,51,51l539.045-318.521      C654.661,387.422,663,372.81,663,357C663,341.19,654.661,326.579,641.045,318.521z M153,565.386V148.614L505.665,357      L153,565.386z"
                                                                                fill="#FFFFFF"/>
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
                                                            <li>
                                                                <a href="#">September 24, 2018</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Music</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Latest -->
                                                <div class="latest">
                                                    <div
                                                        class="latest_title_container d-flex flex-row align-items-start justify-content-start">
                                                        <a href="episode.html">
                                                            <div class="d-flex flex-row align-items-start justify-content-start">
                                                                <div class="latest_play">
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        version="1.1"
                                                                        id="Capa_1"
                                                                        x="0px"
                                                                        y="0px"
                                                                        width="512px"
                                                                        height="512px"
                                                                        viewbox="0 0 714 714"
                                                                        style="enable-background:new 0 0 714 714;"
                                                                        xml:space="preserve">
                                                                        <g id="Play">
                                                                            <path
                                                                                d="M641.045,318.521L102,0C73.822,0,51,22.822,51,51v612c0,28.178,22.822,51,51,51l539.045-318.521      C654.661,387.422,663,372.81,663,357C663,341.19,654.661,326.579,641.045,318.521z M153,565.386V148.614L505.665,357      L153,565.386z"
                                                                                fill="#FFFFFF"/>
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
                                                            <li>
                                                                <a href="#">September 24, 2018</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Music</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Gallery -->
                                        <div class="col-lg-4">
                                            <div class="footer_title">Instagram</div>
                                            <div
                                                class="gallery d-flex flex-row align-items-start justify-content-start flex-wrap">

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