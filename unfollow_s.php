<?php 

include_once 'conexion.php';

if (isset($_POST['unfollow_song'])){

    $id= $_POST['id'];
    $id_s= $_POST['id_s'];

    $sql_delete = "DELETE FROM canciones_like WHERE id = '$id' AND id_s = '$id_s'";
    $sentencia = $pdo->prepare($sql_delete);
    $sentencia->execute();


    $sql_update = "UPDATE canciones SET likes = likes-1 WHERE id_s = '$id_s' ";
    $update = $pdo->prepare($sql_update);
    $update->execute();

    header('location:buscar_c.php');

}

?>