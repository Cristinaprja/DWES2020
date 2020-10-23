<?php
/**
 * Formulario para crear un currículum que incluya: Campos de texto, grupo de botones de opción,
 * casilla de verificación, lista de selección única, lista de selección múltiple, botón de 
 * validación, botón de imagen, botón de reset, etc.
 * @author Cristina Prieto Jalao
 * 19/10/2020
 */
include "Curriculum.php";
$muestraFormulario = true;
if(isset($_POST["enviar"])){
    if(empty($_POST["nombre"]) || empty($_POST["apellidos"]) || empty($_POST["fNacimiento"]) || empty($_POST["carnet"]) || empty($_POST["conocimientos"])){
        echo "<span style=\"color:#FF0000\">Tiene  que rellenar todos los campos</span>";
    }else{
        $muestraFormulario = false;
        $curriculum = new Curriculum($_POST["nombre"], $_POST["apellidos"], $_POST["fNacimiento"], $_POST["carnet"], $_POST["conocimientos"]);
        $curriculum->imprimirCurriculum();
    }
}
if($muestraFormulario){
    echo "<form action=\"index.php?page=curriculum1\" method=\"post\">";
    echo "<p><label>Nombre: <input type=\"text\" name=\"nombre\"/></label></p>";
    echo "<p><label>Apellidos: <input type=\"text\" name=\"apellidos\"/></label></p>";
    echo "<p><label>Fecha Nacimiento: <input type=\"date\" name=\"fNacimiento\"/></label></p>";
    echo "<p><label>Carnet Conducir:<br> 
        <label>Sí <input type=\"radio\" name=\"carnet\" value=\"Si\"></label>
        <label>No <input type=\"radio\" name=\"carnet\" value=\"No\"></label></p>";
    echo "<p>Conocimientos: <br>
        <label>C/C++<input type=\"checkbox\" name=\"conocimientos[]\" value=\"C/C++\"></label><br/>
        <label>Java<input type=\"checkbox\" name=\"conocimientos[]\" value=\"Java\"></label><br/>
        <label>PHP<input type=\"checkbox\" name=\"conocimientos[]\" value=\"PHP\"></label><br/></p>";
    echo "<p><input type=\"submit\" name=\"enviar\" value=\"Enviar\"/>";
    echo "<input type=\"reset\" name=\"reset\" value=\"reset\"/></p>";
    echo "</form>";
}
?>