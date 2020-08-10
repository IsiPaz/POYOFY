
<?php 

include_once 'conexion.php';

    if (isset($_POST['confirmo'])){

        $id= $_POST['id'];
        $tipo= $_POST['tipo'];


        $sql_delete = "DELETE FROM personas WHERE id = '$id'";
        $sentencia = $pdo->prepare($sql_delete);
        $sentencia->execute();


        header('location:index.php');


    }

?>