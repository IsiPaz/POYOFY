<?php 

include_once 'conexion.php';

if (isset($_POST['follow'])){
    $id= $_POST['id'];
    $id_ar= $_POST['id_ar'];

    $seg = "SELECT seguidores FROM personas WHERE id='$id_ar'";
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

    $sql_update = "UPDATE personas SET seguidores = '$cant' WHERE id = '$id_ar' ";
    $update = $pdo->prepare($sql_update);
    $update->execute();



    $sql_insert = "INSERT INTO personas_seguidas (id_1, id_2) VALUES ('$id','$id_ar')";
    $sentencia = $pdo->prepare($sql_insert);
    $sentencia->execute();

    header('location:buscar_a.php');

}

?>