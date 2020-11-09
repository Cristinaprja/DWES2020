<?php
/**
 * Crear una pequeña aplicación que permita la gestión académica del módulo de DWES. Interesa almacenar 
 * las notas de cada trimestre y mostrar un informe con la nota media
 * @author Cristina Prieto Jalao
 * 05/11/2020
 */
include "Alumno.php";
session_start();

if(!isset($_SESSION["sesionIniciada"])){
    $_SESSION["arrayDWES"] = array(
        array(
            "nombre" => "Ana",
            "apellidos" => "Vázquez",
            "notas" => array(
                "trimestre1" => array(
                    "examen1" => 5,
                    "examen2" => 8,
                    "examenFinal" => 7,
                    "notaMedia" => 6.67
                ),
                "trimestre2" => array(
                    "examen1" => 5,
                    "examen2" => 8,
                    "examenFinal" => 7,
                    "notaMedia" => 6.67
                ),
                "trimestre3" => array(
                    "examen1" => 5,
                    "examen2" => 8,
                    "examenFinal" => 7,
                    "notaMedia" => 6.67
                )
            )
                ),
        array(
            "nombre" => "Juan",
            "apellidos" => "Pérez",
            "notas" => array(
                "trimestre1" => array(
                    "examen1" => 5,
                    "examen2" => 8,
                    "examenFinal" => 7,
                    "notaMedia" => 6.67
                ),
                "trimestre2" => array(
                    "examen1" => 5,
                    "examen2" => 8,
                    "examenFinal" => 7,
                    "notaMedia" => 6.67
                ),
                "trimestre3" => array(
                    "examen1" => 5,
                    "examen2" => 8,
                    "examenFinal" => 7,
                    "notaMedia" => 6.67
                )
            )
        )
    );
}
$_SESSION["sesionIniciada"] = true;
function mostrarAlumnos ($array){
    echo "<table border=\"1px solid black\">";
    echo "<th>Nombre</th><th>Apellidos</th><th>Trimestre1</th><th>Trimestre2</th><th>Trimestre3</th>";
    foreach ($array as $alumnos => $alumno) {
        echo "<tr rowspan=\"4\">";
        foreach ($alumno as $key => $value) {
            if(!is_array($value)){
                echo "<td>$value</td>";
            }else{
                foreach ($value as $notas => $trimestres) {
                    echo "<td border=\"1px solid black\">";
                    echo "<table border=\"1px solid black\">";
                    foreach ($trimestres as $examen => $nota) {
                        echo "<tr>";
                        echo "<td>$examen</td>";
                        echo "<td>$nota</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}
function formularioNuevoAlumno(){
    echo "<form action=\"index.php?page=modulo\" method=\"post\">";
    echo "<p><label>Nombre: <input type=\"text\" name=\"nombre\" /></label></p>";
    echo "<p><label>Apelidos: <input type=\"text\" name=\"apellidos\" /></label></p>";
    echo "<h2>Trimestre1</h2>";
    echo "<p><label>Examen1: <input type=\"number\" name=\"t1examen1\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>Examen2: <input type=\"number\" name=\"t1examen2\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>Examen3: <input type=\"number\" name=\"t1examen3\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>ExamenFinal: <input type=\"number\" name=\"t1examenFinal\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<h2>Trimestre2</h2>";
    echo "<p><label>Examen1: <input type=\"number\" name=\"t2examen1\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>Examen2: <input type=\"number\" name=\"t2examen2\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>Examen3: <input type=\"number\" name=\"t2examen3\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>ExamenFinal: <input type=\"number\" name=\"t2examenFinal\" max=\"10\" min=\"1\" required /></label>";
    echo "<h2>Trimestre3</h2>";
    echo "<p><label>Examen1: <input type=\"number\" name=\"t3examen1\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>Examen2: <input type=\"number\" name=\"t3examen2\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>Examen3: <input type=\"number\" name=\"t3examen3\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<p><label>ExamenFinal: <input type=\"number\" name=\"t3examenFinal\" max=\"10\" min=\"1\" required /></label></p>";
    echo "<input type=\"submit\" name=\"enviarForm\" value=\"Enviar\">";
    echo "</form>";
}
echo "<a href=\"cerrarSesion2.php\">Cerrar Sesion</a>";
echo "<form action=\"index.php?page=modulo\" method=\"post\">";
echo "<p><button name=\"nuevoAlumno\">Nuevo Alumno</button></p>";
echo "</form>";

if(isset($_POST["nuevoAlumno"])){
    formularioNuevoAlumno();
}else{
    mostrarAlumnos($_SESSION["arrayDWES"]);
}
if(isset($_POST["enviarForm"])){
    echo "enviado";
    unset($_POST["Enviar"]);
    $alumno = new Alumno($_POST);
    $alumno->agregarAlumno();
}

?>