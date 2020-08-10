<?php

include_once 'conexion.php';
if (isset($_POST['crear_a'])){

    //echo "holi";
    $id = $_POST['id'];
    $name = $_POST['nombre_a'];
    $fecha = $_POST['fecha_a'];
    $tiempo = $_POST['tiempo_a'];
    $canciones = $_POST['canciones'];

    $cant_canc = count($canciones);
    /* 
    foreach ($canciones as $row){
        echo $row;
    }  */

    $verificar_user = "SELECT * FROM albumes WHERE name_a = '$name' AND released = '$fecha' AND length_a = '$tiempo'";
    $sentencia = $pdo->prepare($verificar_user);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();

    if (count($resultado) >= 1){
        echo "El album ya existe con estos atributos";
    } 



    else{
        
        $sql_insert = "INSERT INTO albumes ( id, name_a, cant_canciones, released, length_a) VALUES ('$id','$name', '$cant_canc', '$fecha','$tiempo')";
        $sentencia = $pdo->prepare($sql_insert);
        $sentencia->execute();

        echo "El album ha sido creado con éxito";

        $recuperar_id = "SELECT id_a FROM albumes WHERE name_a = '$name'";
        foreach($pdo->query($recuperar_id) as $row){
            $id_a = $row['id_a'];
        }

        foreach ($canciones as $row){
            var_dump($row);
            $sql_update = "UPDATE canciones SET id_a = '$id_a'  WHERE id_s = '$row'";
            $sentencia = $pdo->prepare($sql_update);
            $sentencia->execute();
            
            echo "Funciona";
        }

    }

    header('location:artist_profile.php');

}

?>