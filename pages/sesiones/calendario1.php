<?php
/**
 * Calendario con sesiones para almacenar las tareas
 * @author Cristina Prieto Jalao
 * 16/11/2020
 */
session_start();
include "Calendario.php";

if(!isset($_SESSION["sesionIniciada"])){
    $_SESSION["arrayTarea"] = array(
        array("fecha" => "10-10-2020", "tarea" => "tarea0"),
    );
}
$_SESSION["sesionIniciada"] = true;

echo "<a href=\"cerrarSesion3.php\">Cerrar Sesion</a>";
echo "<form action=\"index.php?page=calendario1\" method=\"post\">";
echo "<p> Mes : <select name=\"mesElegido\" required>";
for($i=1; $i<13; $i++){
    echo "<option value=\"$i\">$i</option>";
}
echo "</p></select>";
echo "<p> Año :<input name=\"annyoElegido\" type=\"number\" min=\"1900\" max=\"2100\" required></p>";
echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
echo "</form>";
echo "</br>";
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

if(isset($_GET["fecha"])){
    echo "<form action=\"index.php?page=calendario1\" method=\"post\">";
    echo "<p>Inserte la tarea para la fecha: ".$_GET["fecha"]."</p>";
    echo "<p><input type=\"hidden\" name=\"fecha\" value=\"".$_GET["fecha"]."\" /></p>";
    echo "<p><label> Tarea: <textarea name=\"tarea\" maxlength=\"40\" style=\"resize : none\" required></textarea></label></p>";
    echo "<input type=\"submit\" name=\"agregar\" value=\"Agregar Tarea\"/>";
    echo "</form>";
}
if(isset($_POST["agregar"])){
    $nuevaTarea = array(
        "fecha" => $_POST["fecha"],
        "tarea" => $_POST["tarea"]
    );
    array_push($_SESSION["arrayTarea"], $nuevaTarea);
}
if(!empty($_SESSION["arrayTarea"])){
    echo "<h3>Tareas</h3>";
    echo "<table>";
    foreach($_SESSION["arrayTarea"] as $arrays => $tareas){
        echo "<tr>";
        foreach($tareas as $key => $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "<td>";
    echo "</table>";
}
?>
