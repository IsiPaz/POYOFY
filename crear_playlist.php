<?php

    include_once 'conexion.php';

    if (isset($_POST['crear_pl'])){
        $name = $_POST['nombre_pl'];
        $id = $_POST['id'];
        $canciones = $_POST['canciones'];
        $cant_canc = count($canciones);
        $foll = 0;
    
        $verificar_playlist = "SELECT * FROM playlist WHERE name_p = '$name' ";
        $sentencia = $pdo->prepare($verificar_playlist);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll();
        $id_p = $resultado[0]['id_p'];
        
        if (count($resultado) >= 1){
            echo "La playlist ya existe";
            header('location:user_profile.php');
        } 
        
        else{
            $sql_insert = "INSERT INTO playlist ( id, name_p, cant_can, followers) VALUES ('$id','$name', '$cant_canc', '$foll' )";
            $sentencia = $pdo->prepare($sql_insert);
            $sentencia->execute();

            $verificar_playlist = "SELECT * FROM playlist WHERE name_p = '$name' ";
            $sentencia = $pdo->prepare($verificar_playlist);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            $id_p = $resultado[0]['id_p'];

            foreach($canciones as $row){
                $id_s = $row;
                $sql = "INSERT INTO canciones_playlist( id_s, id_p) VALUES ('$id_s','$id_p')";
                $sentencia = $pdo->prepare($sql);
                $sentencia->execute();
            }
        
            echo "La playlist ha sido creada con exito";
            header('location:user_profile.php');
    
        }

    }

?>