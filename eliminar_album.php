
<?php 

include_once 'conexion.php';

if (isset($_POST['eliminar_a'])){

    $id_a= $_POST['id_a'];


    $sql_delete = "DELETE FROM albumes WHERE id_a = '$id_a'";
    $sentencia = $pdo->prepare($sql_delete);
    $sentencia->execute();

    header('location:albumes_a.php');


}

?>