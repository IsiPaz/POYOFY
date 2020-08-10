<?php 

include_once 'conexion.php';
session_start();

if (count($_SESSION) == 0) {
    header("Location:index.php");
    exit;
}

else if (isset($_SESSION['artist'])) {
    $id = $_SESSION['artist']['id'];
    $nombre = $_SESSION['artist']['username'];
    
        if (isset($_POST['buscar'])){
    
            //var_dump($_POST);
            //echo "hi";
    
            $buscar1 = $_POST['buscar1'];
            //var_dump($buscar1);
            if(!isset($buscar1)){
                header("Location: explorar_a.php");
            }
            
            if(strcmp($buscar1,"1") == 0){
                //echo "1";
                header("Location: buscar_a1.php");
            }
    
            if(strcmp($buscar1,"2") == 0){
                //echo "2";
                header("Location: buscar_u1.php");
            }
    
            if(strcmp($buscar1,"3") == 0){
                //echo "3";
                header("Location: buscar_p1.php");
            }
    
            if(strcmp($buscar1,"4") == 0){
                //echo "4";
                header("Location: buscar_c1.php");
            }
 
        }
}

else if(isset($_SESSION['user'])){
    $id = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']['username'];
    
        if (isset($_POST['buscar'])){
    
            //var_dump($_POST);
            //echo "hi";
    
            $buscar1 = $_POST['buscar1'];
            //var_dump($buscar1);
            if(!isset($buscar1)){
                header("Location: explorar.php");
            }
            
            if(strcmp($buscar1,"1") == 0){
                //echo "1";
                header("Location: buscar_a.php");
            }
    
            if(strcmp($buscar1,"2") == 0){
                //echo "2";
                header("Location: buscar_u.php");
            }
    
            if(strcmp($buscar1,"3") == 0){
                //echo "3";
                header("Location: buscar_p.php");
            }
    
            if(strcmp($buscar1,"4") == 0){
                //echo "4";
                header("Location: buscar_c.php");
            }
    
    
    
        }
}

?>