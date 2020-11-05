<?php
/**
 * Incorpora a tu servidor un mensaje que indique al usuario el tiempo transcurrido desde su último acceso
 * y un mensaje personalizado en función de éste
 * @author Cristina Prieto Jalao
 * 03/11/2020
 */

echo "<form action=\"index.php?page=tiempo\" method=\"post\">";
echo "<button name=\"tiempoTranscurrido\">Tiempo Transcurrido</button></p>";
echo "</form>";
$primerAcceso = getdate();
$segundosInicio = $primerAcceso[0];

setcookie("tiempoInicio", $segundosInicio, time()+3600);
echo $_COOKIE["tiempoInicio"];

if (isset($_POST["tiempoTranscurrido"])) {
    setCookie("tiempoActual", getdate()[0], time()+3600);
    echo "Tiempo :".($_COOKIE["tiempoInicio"]-$_COOKIE["tiempoActual"]);
}
?>