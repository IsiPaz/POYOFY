<?php
    include_once 'conexion.php';

    if (isset($_POST['crear'])){
        $id = $_POST['id'];
        $name = $_POST['nombre_c'];
        $fecha = $_POST['fecha'];
        $tiempo = $_POST['tiempo'];
        $likes = 0;

        $verificar_user = "SELECT * FROM canciones WHERE name_c = '$name' AND released = '$fecha' AND length_c = '$tiempo'";
        $sentencia = $pdo->prepare($verificar_user);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        
        if (count($resultado) >= 1){
            echo "La canción ya existe con estos atributos";
        } 
        
        else{
            $sql_insert = "INSERT INTO canciones ( id, name_c, released, length_c, likes) VALUES ('$id','$name', '$fecha','$tiempo','$likes')";
            $sentencia = $pdo->prepare($sql_insert);
            $sentencia->execute();
        
            

        }
        header('location:artist_profile.php');

    }
?>