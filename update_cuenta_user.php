<?php

include_once 'conexion.php';
if (isset($_POST['update'])){

    $id = $_POST['id'];
    $campo = $_POST['campo'];
    $new = $_POST['new'];
    
    if (strcmp($campo,'Nombre de usuario') == 0){
        $update = "UPDATE usuarios SET user_name1='$new' WHERE id = '$id'";
        $sentencia = $pdo->prepare($update);
        $sentencia->execute();

        $login = [
            "id" => $id,
            "username" => $new,
        ];
        session_start();
        $_SESSION['user'] = $login;
        header('location:user_profile.php');
    }

    else if (strcmp($campo,'Email') == 0){
        $update = "UPDATE personas SET email='$new' WHERE id = '$id'";
        $sentencia = $pdo->prepare($update);
        $sentencia->execute();
        header('location:user_profile.php');
    }

    else if (strcmp($campo,'Contraseña') == 0){
        $update = "UPDATE personas SET password_='$new' WHERE id = '$id'";
        $sentencia = $pdo->prepare($update);
        $sentencia->execute();
        header('location:logout.php');
    }

    

}

?>