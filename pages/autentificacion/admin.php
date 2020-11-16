<?php
/**
 * Página admin para ejercicio perfiles.php. Solo puede acceder a esta página el usuario admin
 * @author Cristina Prieto Jalao
 * 16/11/2020
 */
session_start();

if($_SESSION["usuario"] != "admin"){
    header("Location: index.php?page=perfiles");
}else{
    echo "Página admin.php. Solo puede acceder el administrador";
}
?>
