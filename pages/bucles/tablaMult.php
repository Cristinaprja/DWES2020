<?php
/**
 * Tabla de multiplicar de 1 al 10
 * @author Cristina Prieto Jalao
 * 29/09/2020
 */
echo "<table border=\"1\" align=\"center\">";
echo "<tr>";
for ($i="0";$i<=10;$i++){
    echo "<th>$i</th>";
}
echo "</tr>";

for ($x = 1; $x <=10; $x++){
    echo "<tr><th>$x</th>";
    for ($y=1;$y<=10;$y++){                      
        echo "<td>".($x*$y)."</td>";       
    }              
echo "</tr>";          
}
echo "</table>";
?>      