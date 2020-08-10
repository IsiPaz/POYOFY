<?php 

include_once 'conexion.php';

if (isset($_POST['dislike_pl'])){

    $id_p= $_POST['id_p'];
    $id= $_POST['id'];


    $sql_up = "UPDATE playlist SET followers = followers-1 WHERE id_p = '$id_p'";
    $sent = $pdo->prepare($sql_up);
    $sent->execute();

    $sql_delete = "DELETE FROM personas_playlist WHERE id = '$id' AND id_p = '$id_p'";
    $sentencia = $pdo->prepare($sql_delete);
    $sentencia->execute();

    header('location:playlist_a.php');

}

if (isset($_POST['dislike_p'])){

    $id_p= $_POST['id_p'];
    $id= $_POST['id'];


    $sql_up = "UPDATE playlist SET followers = followers-1 WHERE id_p = '$id_p'";
    $sent = $pdo->prepare($sql_up);
    $sent->execute();

    $sql_delete = "DELETE FROM personas_playlist WHERE id = '$id'";
    $sentencia = $pdo->prepare($sql_delete);
    $sentencia->execute();

    header('location:buscar_p.php');

}

?>