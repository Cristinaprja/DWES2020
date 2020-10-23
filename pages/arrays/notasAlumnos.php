<?php
/**
 * Array que almacena las notas de todos los alumnos de 2º de DAW en el módulo de DWES
 * @author Cristina Prieto Jalao
 * 06/10/2020
 */
$notasDWES = array(
    "Antonio" => array("examen1" => 5, "examen2" => 8, "final" => 6.5),
    "Beatriz" => array("examen1" => 8, "examen2" => 8, "final" => 8),
    "Manuel" => array("examen1" => 4, "examen2" => 3, "final" => 3.5),
    "Victoria" => array("examen1" => 2, "examen2" => 4, "final" => 3.5),
);
echo "<table border=\"1px solid black\">";
echo "<tr><td>Alumna/o</td><td>Examen 1</td><td>Examen2</td><td>Examen Final</td></tr>";
foreach($notasDWES as $alumno => $notas){
    echo "<tr>";
    echo "<td>$alumno</td>";
    foreach($notas as $examen =>$resultado){
        if($resultado<5){
            echo "<td style=\"background-color : red \">$resultado</td>";
        }else{
            echo "<td>$resultado</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
?>