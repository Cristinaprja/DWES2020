<?php
/**
 * Pago multas
 * @author Cristina Prieto Jalao
 */
include "funciones.php";
session_start();

if(!isset($_GET["id"])){
    header("Location: index.php");
}else{
    $multaAPagar = getMulta($_SESSION["multas"], $_GET["id"]);
    echo "<p>¿Desea pagar esta multa?</p>";
    echo "<p><strong>Matrícula:</strong> ".$multaAPagar["matricula"]."</p>";
    echo "<p><strong>Descripción:</strong> ".$multaAPagar["descripcion"]."</p>";
    echo "<p><strong>Fecha:</strong> ".$multaAPagar["fecha"]."</p>";
    echo "<p><strong>Estado:</strong> ".$multaAPagar["estado"]."</p>";
    echo "<form action=\"index.php\" method=\"post\">";
        echo "<p><input type=\"submit\" name=\"pagar\" value=\"Pagar\" /></p>";
        echo "<input type=\"hidden\" name=\"idMulta\" value=\"".$multaAPagar["id"]."\" />";
        echo "<input type=\"hidden\" name=\"fechaMulta\" value=\"".$multaAPagar["fecha"]."\" />";
    echo "</form>";
}

?>
