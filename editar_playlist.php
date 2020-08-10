
<?php 

include_once 'conexion.php';

if (isset($_POST['editar'])){

    $id_p= $_POST['id_p'];
    $name_u = $_POST['name_u'];
    $name_p = $_POST['name_p'];

    //var_dump($id_p);
    //header('location:index.php');
    $canciones_faltantes = "SELECT * FROM canciones WHERE id_s NOT IN (SELECT id_s FROM canciones_playlist WHERE id_p = '$id_p')";
    $sentencia = $pdo->prepare($canciones_faltantes);
    $sentencia->execute();

    $result = $sentencia->fetchAll();

    $canciones_que_estan = "SELECT * FROM canciones INNER JOIN canciones_playlist ON canciones.id_s = canciones_playlist.id_s WHERE canciones_playlist.id_p = '$id_p'";
    $sentencia1 = $pdo->prepare($canciones_que_estan);
    $sentencia1->execute();

    $resulta = $sentencia1->fetchAll();
    //var_dump($result);
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
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

    <header class="header trans_400">

    <!-- Logo -->
    <div class="logo">
        <a href="#">
            <img
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
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/contact.jpg" data-speed="0.8"></div>
		<div class="home_container d-flex flex-column align-items-center justify-content-center">
			<div class="home_content">
				<div class="home_title"><center><h1><?php echo $name_u ?>, estas editando la playlist <br>"<?php echo $name_p ?>"</h1></center></div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col" >

					<!-- Contact Form -->
					<div class="contact_form_container" style=margin-top:12px>
                        <div class="contact_form_title text-center">Editar datos de la Playlist <?php echo $name_p ?></div><br>
                        <!-- <center><h4>Si no desea editar el Lanzamiento o la duración no modificar el campo</h4></center>
                        <center><h4>Si no desea editar el nombre de la canción escribir el mismo nombre</h4></center> -->
						<div class="row">
							<div class="col-lg-8 offset-lg-2">
                                
                                <form method=POST action="update_playlist.php" id="contact_form" class="contact_form">
                                    
								    <input type="hidden" name="id_p" value=<?php echo $id_p ?>>
                                    <div class="row">
                                        <div class="col-md-12 contact_col" style=margin-bottom:20px>
                                            <input type="text" required class="contact_input" name="new_name" placeholder="Ingresar nuevo nombre o escribe el actual en caso de no querer cambiarlo." >
                                        </div>
                                    <div>
                                    <div class="row" style=margin-top:20px>
                                        <center><label>Seleccione las canciones que desea <b>añadir</b> a la playlist manteniendo CTRL + click.</label></center>
                                        <select required multiple class="selectpicker form-control" name="canciones_añadir[]" placeholder="canciones" >
                                            <option disabled="disabled" selected="selected">Añadir canciones</option>
                                            <option value='-1'>No añadir canciones</option>
                                            <?php foreach($result as $dato): ?>
                                            <?php 
                                                $id_artista = $dato['id'];
                                                $id_album = $dato['id_a'];
                                                if (count($id_album)==0){
                                                    $nombre_album = "...";
                                                }
                                                else{
                                                    $sql_select1 = "SELECT name_a FROM albumes WHERE id_a = '$id_album'";
                                                    $gsent1 = $pdo->prepare($sql_select1);
                                                    $gsent1->execute();
                                                    $result1 = $gsent1->fetchAll();
                                                    $nombre_album = $result1[0]['name_a'];
                                                }
                                                
                
                                                $sql_select = "SELECT user_name1 FROM artista WHERE id = '$id_artista'";
                                                $gsent = $pdo->prepare($sql_select);
                                                $gsent->execute();
                                            
                                                $result = $gsent->fetchAll();
                                                $nombre_artista = $result[0]['user_name1'];

                                            ?>

                                            <option value='<?php echo $dato['id_s']?>'> <?php echo $dato['name_c'] ?> - By <?php echo $nombre_artista ?> - Álbum <?php echo $nombre_album ?> </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                        
                                    <div class="row" style=margin-top:20px>
                                        <center><label>Seleccione las canciones que desea <b>eliminar</b> de la playlist manteniendo CTRL + click.</label></center>
                                        <select required multiple class="selectpicker form-control" name="canciones_quitar[]" placeholder="canciones" >
                                            <option disabled="disabled" selected="selected">Añadir canciones</option>
                                            <option value='-2'>No eliminar canciones</option>
                                            <?php foreach($resulta as $dato): ?>
                                            <?php 
                                                $id_artista = $dato['id'];
                                                $id_album = $dato['id_a'];
                                                if (count($id_album)==0){
                                                    $nombre_album = "...";
                                                }
                                                else{
                                                    $sql_select1 = "SELECT name_a FROM albumes WHERE id_a = '$id_album'";
                                                    $gsent1 = $pdo->prepare($sql_select1);
                                                    $gsent1->execute();
                                                    $result1 = $gsent1->fetchAll();
                                                    $nombre_album = $result1[0]['name_a'];
                                                }
                                                
                
                                                $sql_select = "SELECT user_name1 FROM artista WHERE id = '$id_artista'";
                                                $gsent = $pdo->prepare($sql_select);
                                                $gsent->execute();
                                            
                                                $result = $gsent->fetchAll();
                                                $nombre_artista = $resulta[0]['user_name1'];

                                            ?>

                                            <option value='<?php echo $dato['id_s']?>'> <?php echo $dato['name_c'] ?> - By <?php echo $nombre_artista ?> - Álbum <?php echo $nombre_album ?> </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>                              
                                      
                                        
                                    <div>
                                        <div class="row" >
                                            <button type="button" name="cancelar" style="backgroun:#fd99a7" class="contact_button button_fill ml-auto mr-auto"><a href="playlist_u.php">cancelar</a></button> 
                                            <button type="submit" name="update_pl" style="backgroun:#fd99a7" class="contact_button button_fill ml-auto mr-auto">editar</button>
                                        </div>
                                    </div>
                                </form>
                                
							</div>
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
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact.js"></script>
</body>
</html>