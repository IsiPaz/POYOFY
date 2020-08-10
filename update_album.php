<?php
    include_once 'conexion.php';
    //var_dump($_POST);
    if (isset($_POST['update_al'])){
        //echo "HOLa";
        $id_a = $_POST['id_a']; //id_playlist
        $new_name = $_POST['new_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $añadir_can = $_POST['canciones_añadir'];
        $quitar_can = $_POST['canciones_quitar'];

        $vacio = "";

        if (strcmp($date,$vacio) != 0){
            $date_sql = "UPDATE albumes SET released = '$date' WHERE id_a = '$id_a'";
            $se = $pdo->prepare($date_sql);
            $se->execute();
        } 

        if (strcmp($time,$vacio) != 0){
            $time_sql = "UPDATE albumes SET length_a = '$time' WHERE id_a = '$id_a'";
            $sea = $pdo->prepare($time_sql);
            $sea->execute();
        }

        if(strcmp($añadir_can[0],'-1') == 0 && strcmp($quitar_can[0],'-2') == 0){  //si solo cambio el name
            //echo "lol";
            $update = "UPDATE albumes SET name_a = '$new_name' WHERE id_a = '$id_a'";
            $sentencia = $pdo->prepare($update);
            $sentencia->execute();
            header("Location:albumes_a.php");
        }

        else if(strcmp($añadir_can[0],'-1') != 0 && strcmp($quitar_can[0],'-2') == 0){  //Si quiero añadir canciones y cambiar name
            //echo "lol";
            $cant = count($añadir_can);
            $update1 = "UPDATE albumes SET name_a = '$new_name', cant_canciones = cant_canciones+'$cant' WHERE id_a = '$id_a'";
            $sentencia1 = $pdo->prepare($update1);
            $sentencia1->execute();

            foreach($añadir_can as $song){
                $id_s = $song;
                $actu = "UPDATE canciones SET id_a = '$id_a' WHERE id_s = '$id_s'";
                $sentencia2 = $pdo->prepare($actu);
                $sentencia2->execute();
            }
            header("Location:albumes_a.php");
        }
        else if(strcmp($añadir_can[0],'-1') == 0 && strcmp($quitar_can[0],'-2') != 0){  //Si quiero eliminar canciones y cambiar name
            //echo "lol";
            $cant = count($quitar_can);
            $updat = "UPDATE albumes SET name_a = '$new_name', cant_canciones = cant_canciones-'$cant' WHERE id_a = '$id_a'";
            $sentencia3 = $pdo->prepare($updat);
            $sentencia3->execute();

            foreach($quitar_can as $song){
                $id_s = $song;
                $actu = "UPDATE canciones SET id_a = NULL WHERE id_s = '$id_s'";
                $sentencia2 = $pdo->prepare($actu);
                $sentencia2->execute();
            }
            header("Location:albumes_a.php");
        }

        else if(strcmp($añadir_can[0],'-1') != 0 && strcmp($quitar_can[0],'-2') != 0){  //Si quiero eliminar canciones, añadir canciones y cambiar name
            $cant = count($añadir_can);
            $update1 = "UPDATE albumes SET name_a = '$new_name', cant_canciones = cant_canciones+'$cant' WHERE id_a = '$id_a'";
            $sentencia1 = $pdo->prepare($update1);
            $sentencia1->execute();

            foreach($añadir_can as $song){
                $id_s = $song;
                $actu = "UPDATE canciones SET id_a = '$id_a' WHERE id_s = '$id_s'";
                $sentencia2 = $pdo->prepare($actu);
                $sentencia2->execute();
            }

            $cant1 = count($quitar_can);
            $updat = "UPDATE albumes SET name_a = '$new_name', cant_canciones = cant_canciones-'$cant1' WHERE id_a = '$id_a'";
            $sentencia3 = $pdo->prepare($updat);
            $sentencia3->execute();

            foreach($quitar_can as $song){
                $id_s = $song;
                $actu = "UPDATE canciones SET id_a = NULL WHERE id_s = '$id_s'";
                $sentencia2 = $pdo->prepare($actu);
                $sentencia2->execute();
            }
            header("Location:albumes_a.php");
        }

         
    }

?>