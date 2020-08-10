<?php
    include_once 'conexion.php';
    //var_dump($_POST);
    if (isset($_POST['update'])){
        //echo "HOLa";
        $id_s = $_POST['id_s'];
        $new_name = $_POST['nombre'];
         
        if(strcmp($_POST['date'],"") != 0 && strcmp($_POST['time'],"") != 0){

            //echo "1";
            $date = $_POST['date'];
            $time = $_POST['time'];

            $sql = "UPDATE canciones SET name_c = '$new_name', released='$date', length_c='$time' WHERE id_s = '$id_s'";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();

            header("Location:canciones_a.php");
        }
        
        else if(strcmp($_POST['date'],"") != 0){
            $date = $_POST['date'];
            //echo "2";
            $sql = "UPDATE canciones SET name_c = '$new_name', released='$date' WHERE id_s = '$id_s'";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            
            header("Location:canciones_a.php");
        }

        else if(strcmp($_POST['time'],"") != 0 ){
            //echo "3";
            $time = $_POST['time'];
            $sql = "UPDATE canciones SET name_c = '$new_name' length_c='$time' WHERE id_s = '$id_s'";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();

            header("Location:canciones_a.php");
        }
        
        else {
            //echo "4";
            $sql = "UPDATE canciones SET name_c = '$new_name'  WHERE id_s = '$id_s'";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();

            header("Location:canciones_a.php");
        }
    }

?>