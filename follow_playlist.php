<?php 

include_once 'conexion.php';

if (isset($_POST['like_p'])){
    $id= $_POST['id'];
    $id_p= $_POST['id_p'];


    $sql_insert = "INSERT INTO personas_playlist (id, id_p) VALUES ('$id','$id_p')";
    $sentencia = $pdo->prepare($sql_insert);
    $sentencia->execute();

    header('location:buscar_p.php');

}

?>