<?php
/**
 * Página tareas para ejercicio perfiles.php. Solo puede acceder a esta página el usuario alumna
 * @author Cristina Prieto Jalao
 * 16/11/2020
 */
session_start();

if($_SESSION["usuario"] != "alumna"){
    header("Location: index.php?page=perfiles");
}else{
    echo "Página alumna.php. Solo puede acceder la alumna";
}
?>