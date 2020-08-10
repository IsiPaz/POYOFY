<?php 

include_once 'conexion.php';

if (isset($_POST['follow'])){
    $id= $_POST['id'];
    $id_us= $_POST['id_us'];

    $seg = "SELECT seguidores FROM personas WHERE id='$id_us'";
    $up = $pdo->prepare($seg);
    $up->execute();
    $lol = $up->fetchAll();
    $cant = $lol[0]['seguidores'];

    if (isset($cant)){
        $cant = $cant+1;
    }
    else if (!isset($cant)){
        $cant = 1;
    }

    $sql_update = "UPDATE personas SET seguidores = '$cant' WHERE id = '$id_us' ";
    $update = $pdo->prepare($sql_update);
    $update->execute();

    $sql_insert = "INSERT INTO personas_seguidas (id_1, id_2) VALUES ('$id','$id_us')";
    $sentencia = $pdo->prepare($sql_insert);
    $sentencia->execute();

    header('location:buscar_u.php');

}

?>