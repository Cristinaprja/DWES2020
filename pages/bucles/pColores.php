<?php
/**
 * Mostrar paleta de colores
 * @author Cristina Prieto Jalao
 * 29/09/2020
 */
echo "<table border=\"1\">";
$INCREMENTO = 16;
    for ($r=0; $r < 256; $r+=$INCREMENTO) { 
        for ($g=0; $g < 256; $g+=$INCREMENTO) { 
            echo "<tr>";
            for ($b=0; $b < 256; $b+=$INCREMENTO) { 
                echo "<td style=\"background-color:rgb($r,$g,$b)\">#".dechex($r).dechex($g).dechex($b)."</td>";
            }
            echo "</tr>";
        }
    }
echo "</table>";
?>