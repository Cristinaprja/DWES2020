<?php
/**
 * Escribe un script que permita factorizar un número pasado por la URL.  Muestra el resultado en dos columnas.
 * @author Cristina Prieto Jalao
 * 26/10/2020
 */
echo "<p>Introduce por la URL un número para poder factorizarlo, hazlo de la siguiente manera:</p>";
echo "<p>http://localhost/pages/funciones/index.php?page=calculaletra&numero=26.</p>";

/**
 * Función para factorizar un número
 * @param numero 
 */
function factoriza($numero){
    for($i=2;$i<=$numero;$i++){
        while($numero % $i==0){
            echo ($numero." | ".$i."<br>");
            $numero/=$i;
        }
    }
}
if(isset($_GET["numero"])){
    $numero = $_GET["numero"];
    $resultado = "la factorizacion de $numero es :".factoriza($numero); 
}

?>