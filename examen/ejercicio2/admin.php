<?php
/**
 * Admin.php
 * Solo tiene acceso el perfil administrador
 * @author Cristina Prieto Jalao
 */
include "funciones.php";
session_start(); 

if($_SESSION["perfil"] != "administrador"){
    header("Location: index.php");
}else{
    echo "<header>Bienvenido ".$_SESSION["perfil"]." <a href=\"salir.php\">Salir</a></header>";
    echo "<p><a href=\"admin.php\">Home</a></p>";
    echo "<form action=\"admin.php\" method=\"post\">";
        echo "<p><input type=\"submit\" name=\"resumenMultas\" value=\" Resumen Multas\" /></p>";
    echo "</form>";
}
if(isset($_POST["resumenMultas"])){
    echo "Mostrando resumen de multas";
    resumenMultas($_SESSION["multas"]);
}
?>