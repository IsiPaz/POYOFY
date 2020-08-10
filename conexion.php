<?php

$link = 'mysql:host=localhost;dbname=poyofy';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($link, $user, $pass);
    //echo 'Conectado';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>