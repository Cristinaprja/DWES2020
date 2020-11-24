<?php
/**
 * Diseña e implementa un sistema de autentificación de usuarios utilizando objetos.
 * @author Cristina Prieto Jalao
 * 24/11/2020
 */
session_start();
include "class/Usuario.php";

if(!isset($_SESSION["aut"])){
    header("Location: index.php?page=usuarios");
}
echo "<a href=\"cerrarSesion.php\">Cerrar Sesion</a><br>";
echo "Bienvenido a la plataforma";
?>