<?php
    include_once 'conexion.php';
    //var_dump($_POST);
    if (isset($_POST['update_pl'])){
        //echo "HOLa";
        $id_p = $_POST['id_p']; //id_playlist
        $new_name = $_POST['new_name'];
        $añadir_can = $_POST['canciones_añadir'];
        $quitar_can = $_POST['canciones_quitar'];

        if(strcmp($añadir_can[0],'-1') == 0 && strcmp($quitar_can[0],'-2') == 0){  //si solo cambio el name
            //echo "lol";
            $update = "UPDATE playlist SET name_p = '$new_name' WHERE id_p = '$id_p'";
            $sentencia = $pdo->prepare($update);
            $sentencia->execute();
            //header("Location:playlist_u.php");
        }

        else if(strcmp($añadir_can[0],'-1') != 0 && strcmp($quitar_can[0],'-2') == 0){  //Si quiero añadir canciones y cambiar name
            //echo "lol";
            $cant = count($añadir_can);
            $update1 = "UPDATE playlist SET name_p = '$new_name', cant_can = cant_can+'$cant' WHERE id_p = '$id_p'";
            $sentencia1 = $pdo->prepare($update1);
            $sentencia1->execute();

            foreach($añadir_can as $song){
                $id_s = $song;
                $actu = "INSERT INTO canciones_playlist (id_s, id_p) VALUES ('$id_s', '$id_p')";
                $sentencia2 = $pdo->prepare($actu);
                $sentencia2->execute();
            }
            header("Location:playlist_u.php");
        }
        else if(strcmp($añadir_can[0],'-1') == 0 && strcmp($quitar_can[0],'-2') != 0){  //Si quiero eliminar canciones y cambiar name
            //echo "lol";
            $cant = count($quitar_can);
            $updat = "UPDATE playlist SET name_p = '$new_name', cant_can = cant_can-'$cant' WHERE id_p = '$id_p'";
            $sentencia3 = $pdo->prepare($updat);
            $sentencia3->execute();

            foreach($quitar_can as $song){
                $id_s = $song;
                $actu = "DELETE FROM canciones_playlist WHERE id_s = '$id_s'";
                $sentencia2 = $pdo->prepare($actu);
                $sentencia2->execute();
            }
            header("Location:playlist_u.php");
        }

        else if(strcmp($añadir_can[0],'-1') != 0 && strcmp($quitar_can[0],'-2') != 0){  //Si quiero eliminar canciones, añadir canciones y cambiar name
            //echo "lol";
            $cante = count($añadir_can);
            $update5 = "UPDATE playlist SET name_p = '$new_name', cant_can = cant_can+'$cante' WHERE id_p = '$id_p'";
            $sentencia5 = $pdo->prepare($update5);
            $sentencia5->execute();

            foreach($añadir_can as $song){
                $id_s = $song;
                $actu = "INSERT INTO canciones_playlist (id_s, id_p) VALUES ('$id_s', '$id_p')";
                $sentencia6 = $pdo->prepare($actu);
                $sentencia6->execute();
            }

            $cant1 = count($quitar_can);
            $updat1 = "UPDATE playlist SET name_p = '$new_name', cant_can = cant_can-'$cant1' WHERE id_p = '$id_p'";
            $sentencia7 = $pdo->prepare($updat1);
            $sentencia7->execute();

            foreach($quitar_can as $song){
                $id_s = $song;
                $actu = "DELETE FROM canciones_playlist WHERE id_s = '$id_s'";
                $sentencia7 = $pdo->prepare($actu);
                $sentencia7->execute();
            }
            header("Location:playlist_u.php");
        }

         
    }

?>