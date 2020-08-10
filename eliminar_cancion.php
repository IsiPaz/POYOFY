
<?php 

    include_once 'conexion.php';

    if (isset($_POST['eliminar'])){

        $id_s= $_POST['id_s'];
        $sql_cancion = "SELECT * FROM canciones WHERE id_s = '$id_s'";
        $sen = $pdo->prepare($sql_cancion);
        $sen->execute();
        $result = $sen->fetchAll(); //datos cancion

        $sql_delete = "DELETE FROM canciones WHERE id_s = '$id_s'";
        $sentencia = $pdo->prepare($sql_delete);
        $sentencia->execute();
        echo "Eliminado"; //funciona

        if (isset($result[0]['id_a'])){
            $id_a = $result[0]['id_a'];
            $sql_album = "SELECT cant_canciones FROM albumes WHERE id_a = '$id_a'";
            $sent = $pdo->prepare($sql_album);
            $sent->execute();
            $result3 = $sent->fetchAll();
            $cant_can = $result3[0]['cant_canciones'];
            $cant_can = $cant_can - 1;

            $sql_update = "UPDATE albumes SET cant_canciones='$cant_can' WHERE id_a = '$id_a'";
            $sen = $pdo->prepare($sql_update);
            $sen->execute();
            
        } //funciona

        //var_dump($result[0]['likes']);

        if (isset($result[0]['likes'])){
            echo "entro";
            $sql_delete1 = "DELETE FROM canciones_like WHERE id_s = '$id_s'";
            $sen = $pdo->prepare($sql_delete1);
            $sen->execute();

        }

        $sql_likes = "SELECT * FROM canciones_playlist WHERE id_s ='$id_s' ";
        $sen = $pdo->prepare($sql_likes);
        $sen->execute();
        $result5 = $sen->fetchAll();
        
        if (count($result5) > 0){

            foreach ($result5 as $lista){
                $id_pl = $lista['id_p'];
                $sql_pl = "UPDATE playlist SET cant_can = cant_can-1 WHERE id_p = '$id_pl'";
                $senw = $pdo->prepare($sql_pl);
                $senw->execute();
    
            }

            $sql_borrar = "DELETE FROM canciones_playlist WHERE id_s = '$id_s'";
            $sen8 = $pdo->prepare($sql_borrar);
            $sen8->execute();

        }


        header('location:canciones_a.php');


    }

?>