<?php
/**
 * Crear una pequeña aplicación que permita la gestión académica del módulo de DWES. Interesa almacenar 
 * las notas de cada trimestre y mostrar un informe con la nota media
 * @author Cristina Prieto Jalao
 * 05/11/2020
 */
$arrayDWES = array(
    array(
        "nombre" => "Ana",
        "apellidos" => "Vázquez",
        "notas" => array(
            "trimestre1" => array(
                "examen1" => 5,
                "examen2" => 8,
                "examenFinal" => 7,
                "notaMedia" => 6,67
            ),
            "trimestre2" => array(
                "examen1" => 5,
                "examen2" => 8,
                "examenFinal" => 7,
                "notaMedia" => 6,67
            ),
            "trimestre3" => array(
                "examen1" => 5,
                "examen2" => 8,
                "examenFinal" => 7,
                "notaMedia" => 6,67
            )
        )
            ),
    array(
        "nombre" => "Juan",
        "apellidos" => "Vázquez",
        "notas" => array(
            "trimestre1" => array(
                "examen1" => 5,
                "examen2" => 8,
                "examenFinal" => 7,
                "notaMedia" => 6,67
            ),
            "trimestre2" => array(
                "examen1" => 5,
                "examen2" => 8,
                "examenFinal" => 7,
                "notaMedia" => 6,67
            ),
            "trimestre3" => array(
                "examen1" => 5,
                "examen2" => 8,
                "examenFinal" => 7,
                "notaMedia" => 6,67
            )
        )
    )
);
echo "<table border=\"1px solid black\">";
echo "<th>Nombre</th><th>Apellidos</th><th>Trimestre1</th><th>Trimestre2</th><th>Trimestre3</th>";
foreach ($arrayDWES as $alumnos => $alumno) {
    echo "<tr rowspan=\"4\">";
    foreach ($alumno as $key => $value) {
        if(is_string($value)){
            echo "<td>$value</td>";
        }else{
            foreach ($value as $notas => $trimestres) {
                echo "<td rowspan=\"4\">"; ///mover al foreach de abajo
                foreach ($trimestres as $examen => $nota) {
                        echo "<table>";
                            echo "<tr>";
                            echo "<td>hola</td>";
                            echo "</tr>";
                        // echo "<tr><td>$examen</td><td>$nota</td></tr>";
                        echo "</table>";
                    // echo "<p><td>$examen</td><td>$nota</td></p>";

                }
                echo "</td>"; //meter en el foreach
            }

                    // echo "<td><tr>$examen</tr><tr>$nota</tr></td>";
                    // echo $examen;
                    // echo $nota;
                    // echo "</br>";
        }
    }
    echo "</tr>";
    // print_r($alumno);
    // echo "adios<br>";
    // echo "<br>";
}
echo "</table>";
 ?>