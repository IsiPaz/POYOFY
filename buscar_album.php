<?php 

include_once 'conexion.php';

if (isset($_POST['buscar'])){
    $name = $_POST['buscar_album'];

    $select = "SELECT * FROM albumes WHERE name_a LIKE '%".$name."%' ";
    $sentencia = $pdo->prepare($select);
    $sentencia->execute();
    $result = $sentencia->fetchAll();


    
    if (count($resultado) < 1){
        echo "El álbum buscado no existe, por favor ingresar bien el nombre";
    } 
    

}

else if (!isset($_POST['buscar'])){
    $_POST['buscar'] = "";
}

?>

