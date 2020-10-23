<?php
/**
 * Calendario con objetos y formulario
 * @author Cristina Prieto Jalao
 * 04/10/2020
 */
include "Calendario.php";
echo "<form action=\"index.php?page=calendario3\" method=\"post\">";
echo "<p> Mes : <select name=\"mesElegido\" required>";
for($i=1; $i<13; $i++){
    echo "<option value=\"$i\">$i</option>";
}
echo "</p></select>";
echo "<p> Año :<input name=\"annyoElegido\" type=\"number\" min=\"1900\" max=\"2100\" required></p>";
echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
echo "</form>";

if(isset($_POST["enviar"])){
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