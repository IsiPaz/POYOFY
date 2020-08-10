
<?php 

include_once 'conexion.php';

if (isset($_POST['eliminar'])){

    $id_s= $_POST['id_s'];

    $sql_delete = "DELETE FROM canciones_like WHERE id_s = '$id_s'";
    $sentencia = $pdo->prepare($sql_delete);
    $sentencia->execute();


    $sql_select = "SELECT likes FROM canciones WHERE id_s ='$id_s'";
    $lo = $pdo->prepare($sql_select);
    $lo->execute();
    $result = $lo->fetchAll();

    $likes = $result[0]['likes'];

    if ($likes-1 == 0){
        $likes = 0;
    }

    else if ($likes == 0){
        $likes = 0;
    }

    if(isset($result[0]['likes'])){
        $sql_update = "UPDATE canciones SET likes = '$likes' WHERE id_s = '$id_s' ";
        $update = $pdo->prepare($sql_update);
        $update->execute();
    }

    header('location:canciones_u.php');

}

?>