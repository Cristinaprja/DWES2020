<?php
/**
 * Script que se encarga de modificar el usuario a Invitado
 * @author Cristina Prieto Jalao
 * 11/12/2020
 */
session_start();
$_SESSION["perfil"] = "Invitado";
header("Location: index.php");
?>