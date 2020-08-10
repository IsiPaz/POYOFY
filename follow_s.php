<?php 

include_once 'conexion.php';

if (isset($_POST['follow_s'])){
    $id= $_POST['id'];
    $id_s= $_POST['id_s'];

    $sql_update = "INSERT INTO canciones_like (id, id_s) VALUES ('$id','$id_s')";
    $update = $pdo->prepare($sql_update);
    $update->execute();

    header('location:buscar_c.php');

}

?>