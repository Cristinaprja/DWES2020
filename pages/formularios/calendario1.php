<?php
/**
 * Modifica el ejercicio del calendario para que el mes y el año se lean en un formulario. Añade las siguientes especificaciones:
 * Por defecto se carga el mes y año actual.
 * Definición de días festivos en un array.
 * Utilizar colores para diferenciar festivos nacionales, de comunidad y locales.
 * Cada día será un enlace a una página que mostrará la fecha seleccionda.
 * @author Cristina Prieto Jalao
 * 19/10/2020
 */

include "Calendario.php";
echo "<form action=\"index.php?page=calendario1\" method=\"post\">";
echo "<p> Mes : <select name=\"mesElegido\" required>";
for($i=1; $i<13; $i++){
    echo "<option value=\"$i\">$i</option>";
}
echo "</p></select>";
echo "<p> Año :<input name=\"annyoElegido\" type=\"number\" min=\"1900\" max=\"2100\"></p>";
echo "<input type=\"submit\" name=\"subir\" value=\"Enviar\">";
echo "</form>";
echo "</br>";
if(isset($_POST["subir"])){
    $mes = $_POST["mesElegido"];
    $annyo = $_POST["annyoElegido"];    
    $calendario = new Calendario($_POST["mesElegido"], $_POST["annyoElegido"]);
    $calendario->calcularCalendario();
    $calendario->imprimirCalendario();
}else{
    $calendario = new Calendario(date("n"), date("Y"));
    $calendario->calcularCalendario();
    $calendario->imprimirCalendario();
}
?>