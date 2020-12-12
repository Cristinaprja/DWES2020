<?php
/**
 * Agente.php
 * Solo tiene acceso el perfil agente
 * @author Cristina Prieto Jalao
 */
include "funciones.php";
session_start(); 

if($_SESSION["perfil"] != "agente"){
    header("Location: index.php");
}else{
    echo "<header>Bienvenido ".$_SESSION["perfil"]." <a href=\"salir.php\">Salir</a></header>";
    echo "<p><a href=\"agente.php\">Home</a></p>";
    echo "<form action=\"agente.php\" method=\"post\">";
        echo "<p><input type=\"submit\" name=\"gestionMultas\" value=\" Gestion Multas\" /></p>";
    echo "</form>";
}
if(isset($_POST["gestionMultas"])){
    echo "<form action=\"agente.php\" method=\"post\">";
        echo "<p><input type=\"submit\" name=\"nuevaMulta\" value=\" Nueva Multa\" /></p>";
    echo "</form>";
    imprimirMultas($_SESSION["multas"]);
}
if(isset($_POST["nuevaMulta"])){
    echo "<form action=\"agente.php\" method=\"post\">";
        echo "<p><label>Matrícula: <input type=\"text\" name=\"matricula\" required/></label></p>";
        echo "<p><label>Descripción: <input type=\"text\" name=\"descripcion\" required/></label></p>";
        echo "<p><label>Fecha: <input type=\"date\" name=\"fecha\" required/></label></p>";
        echo "<p><label>Importe: <input type=\"text\" name=\"importe\" required/></label></p>";
        echo "<p><input type=\"submit\" name=\"enviarMulta\" value=\"Enviar Multa\" /></p>";
    echo "</form>";
}
if(isset($_POST["enviarMulta"])){
    $arrayNuevaMulta = array(
        "id" => $_SESSION["idMulta"]++,
        "matricula" => $_POST["matricula"],
        "descripcion" => $_POST["descripcion"],
        "fecha" => $_POST["fecha"],
        "importe" => $_POST["importe"],
        "estado" => "pendiente"
    );
    nuevaMulta($arrayNuevaMulta);
}
?>