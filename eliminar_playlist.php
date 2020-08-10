<?php 

include_once 'conexion.php';

if (isset($_POST['eliminar_pl'])){

    $id_p= $_POST['id_p'];


    $sql_delete = "DELETE FROM playlist WHERE id_p = '$id_p'";
    $sentencia = $pdo->prepare($sql_delete);
    $sentencia->execute();

    header('location:playlist_u.php');


}

?>