<?php
include_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Poyofy | Iniciar Sesión</title>

    <!-- Icons font CSS-->
    <link href="registrar/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="registrar/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="registrar/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="registrar/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="registrar/css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
</head>

<body>
    
    <div class="page-wrapper bg-gra-01 p-t-90 p-b-100 font-poppins">

        <div class="wrapper wrapper--w680">
            <div class="card card-3">
                <div class="card-body">
                <div class="row" style=margin-top:30px;margin-bottom:85px>
                    <div class="logo">
                    <a href="#"><img src="images/logo.png" style="width:50px; height:50px; alt="" > Poyofy</a>
                    </div>
                </div>
                    <center><h2 class="title" >Iniciar Sesión</h2></center>
                    <form method="POST">
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="type" required>
                                    <option disabled="disabled" selected="selected">Tipo de Usuario</option>
                                    <option>Artista</option>
                                    <option>Usuario</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                         <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nombre de Usuario" name="username" required>
                        </div>

                        <div class="input-group">
                            <input class="input--style-3" type="password" required pattern="[A-Za-z0-9]*" title="Letras y números." placeholder="Contraseña" name="pass" required>
                        </div>
                        <div class="p-t-10">
                            <center><button class="btn btn--pill btn--green" name="ingresar" type="submit">Ingresar</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="registrar/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="registrar/vendor/select2/select2.min.js"></script>
    <script src="registrar/vendor/datepicker/moment.min.js"></script>
    <script src="registrar/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="registrar/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

<?php 

if (isset($_POST['ingresar'])){

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];
    //var_dump($type);

    if (strcmp($type,'Usuario') == 0){
        $type = 'usuarios';
    }
    else if (strcmp($type,'Artista') == 0){
        $type = 'artista';
    }

    //var_dump($type);

    $id_user = "SELECT id FROM $type WHERE user_name1 = '$username'";
    $sentencia = $pdo->prepare($id_user);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    var_dump($resultado);
    $id = $resultado[0]['id'];
    if (count($resultado) < 1){
        echo "El usuario no existe";
    } 

    else{
        $pw = "SELECT password_ FROM personas WHERE id = '$id'";
        $sentencia = $pdo->prepare($pw);
        $sentencia->execute();
        $resultado1 = $sentencia->fetchAll();
        $pass1 = $resultado1[0]['password_'];
        //var_dump($pass);
        //var_dump($pass1);

        if(strcmp($pass,$pass1) == 0) {
            $login = [
                "id" => $id,
                "username" => $username,
            ];
            if (strcmp($type,'usuarios') == 0){ 
                session_start();
                $_SESSION['user'] = $login; 
                echo '<p class="success">Congratulations, you are logged in like a User!</p>';
                header('location:user_profile.php');
            }
            else{
                session_start();
                $_SESSION['artist'] = $login;
                echo '<p class="success">Congratulations, you are logged in like a Artist!</p>';
                header('location:artist_profile.php');
            }
            
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    } 

}

?>

