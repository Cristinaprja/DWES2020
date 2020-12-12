<?php
/**
 * Funciones para manejar los perfiles de usuarios
 * @author Cristina Prieto Jalao
 * 11/12/2020
 */
function limpiarDatos($limpiar){
    $error = trim($limpiar);
    $error = stripslashes($limpiar);
    $error =  htmlspecialchars($limpiar);
    return $error;
}
function multasAPagar($arrayMultas){
    echo "<table border=\"1px solid black\">";
        echo "<form action=\"index.php\" method=\"post\">";
            echo "<th>Id</th><th>Matrícula</th><th>Descripción</th><th>Fecha</th><th>Importe</th><th>Estado</th>";
                foreach($arrayMultas as $array => $multa){
                    echo "<tr>";
                    foreach($multa as $key => $value){
                        if($key == "id"){
                            $id = $value;
                        }
                        echo "<td>$value</td>";
                        if($key == "estado"){
                            if($value == "pendiente"){
                                echo "<td><a href=\"pagoMultas.php?id=$id\">Pagar</a></td>";
                            }
                        }
                    }
                    echo "</tr>";
                }
        echo "</form>";
    echo "</table>";
}

function imprimirMultas($arrayMultas){
    echo "<table border=\"1px solid black\">";
        echo "<th>Id</th><th>Matrícula</th><th>Descripción</th><th>Fecha</th><th>Importe</th><th>Estado</th>";
        foreach($arrayMultas as $array => $multa){
            echo "<tr>";
                foreach($multa as $key => $value){
                    echo "<td>$value</td>";
                }
            echo "</tr>";
        }
    echo "</table>";
}
function nuevaMulta($arrayNuevaMulta){
    array_push($_SESSION["multas"], $arrayNuevaMulta);
}
function resumenMultas($arrayMultas){
    foreach($arrayMultas as $array => $multa){
        foreach($multa as $key => $value){
            // if($key == "fecha"){

            // }
        }
    }
}
function getMulta($arrayMultas, $idMulta){
    foreach($arrayMultas as $array => $multa){
        foreach($multa as $key => $value){
            if($key == "id"){
                if($value == $idMulta){
                    return $multa;
                }
            }
        }
    }
}
function pagarMulta($arrayMultas, $idMulta){
    $arrayMultas[$idMulta-1]["estado"] = "pagada";
    return $arrayMultas;
}
 ?>