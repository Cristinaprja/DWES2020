<?php
$imagenesPerros = glob('perros/*');
foreach($imagenesPerros as $imagen){
    if(is_file($imagen))
    unlink($imagen);
}

$imagenesEntrenadores = glob('entrenadores/*');
foreach($imagenesEntrenadores as $imagen){
    if(is_file($imagen))
    unlink($imagen);
}
session_start();
session_unset($_SESSION);
session_destroy();
header("Location: index.php?page=chips");
?>