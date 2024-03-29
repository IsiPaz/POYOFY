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
    <title>Poyofy</title>

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
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Regístrate como Usuario </h2>
                    
                    <form method="POST">
                        <div class="input-group">
                            <div class="input-group">
                                <input class="input--style-3" type="text" placeholder="Nombre completo" name="name" required>
                            </div>
                            <div class="input-group">
                                <input class="input--style-3" type="text" placeholder="Nombre de Usuario" name="username" required>
                            </div>
                            <div class="input-group">
                                <input class="input--style-3" type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="input-group">
                                <input class="input--style-3" type="password" required pattern="[A-Za-z0-9]*" title="Letras y números." placeholder="Contraseña" name="pass" required>
                            </div>
                            <div class="p-t-10">
                                <button class="btn btn--pill btn--green"  name="enviar" type="submit">Enviar</button>
                            </div>         
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

if ($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $verificar_user = "SELECT * FROM personas WHERE nombre = '$name'";
    $sentencia = $pdo->prepare($verificar_user);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    
    if (count($resultado) >= 1){
        echo "El usuario ya existe";
    } 

    else{
        $sql_insert = "INSERT INTO personas (nombre, email, password_) VALUES ('$name','$email','$pass')";
        $sentencia = $pdo->prepare($sql_insert);
        $sentencia->execute();
    
    
        $recuperar_id = "SELECT id FROM personas WHERE nombre = '$name'";
        foreach($pdo->query($recuperar_id) as $row){
            $id = $row['id'];
        }
        
    
        $sql_insert_user = "INSERT INTO usuarios (id,user_name1) VALUES ('$id','$username')";
        $st = $pdo->prepare($sql_insert_user);
        $st->execute();  

        header('location:login.php');

    }

}

?>


