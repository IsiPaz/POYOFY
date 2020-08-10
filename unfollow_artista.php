<?php 

include_once 'conexion.php';

if (isset($_POST['unfollow'])){

    $id_ar= $_POST['id_ar'];
    $id = $_POST['id'];

    $sql_delete = "DELETE FROM personas_seguidas WHERE id_1 = '$id' AND id_2 = '$id_ar'";
    $sentencia = $pdo->prepare($sql_delete);
    $sentencia->execute();


    $sql_update = "UPDATE personas SET seguidores = seguidores-1 WHERE id = '$id_ar' ";
    $update = $pdo->prepare($sql_update);
    $update->execute();

    header('location:buscar_a.php');

}

?>