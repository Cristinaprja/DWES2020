<?php
/**
 * Escribe un script en php para calcular la letra del NIF a partir del número del DNI enviado en la URL: 
 * http://dominio.local/calculaletra?dni=30182410. La letra se obtiene calculando el resto de la división
 * del número del DNI por 23. A cada resultado le corresponde una letra. 0=T; 1=R; 2=W; 3=A; 4=G; 5=M;
 * 6=Y; 7=F; 8=P; 9=D; 10=X; 11=B; 12=N; 13=J; 14=Z; 15=S; 16=Q; 17=V; 18=H; 19=L; 20=C; 21=K; 22=E.
 * Utiliza un array para almacenar la relación letra, número.
 * @author Cristina Prieto Jalao
 * 26/10/2020
 */
echo "<p>Introduce por la URL tu dni de la siguiente manera:</p>";
echo "<p>http://localhost/pages/funciones/index.php?page=calculaletra&dni=30182410.</p>";

/**
 * Devuelve un mensaje u otro dependiendo de si la letra introducida en el dni es la correcta
 * 
 * Mediante manejo de cadenas obtenemos el $num (parte numérica del dni) y $letra (letra introducida del dni).
 * Hacemos los cálculos para obtener cual es la letra correcta que corresponde a una posicion de $letrasDNI.
 * Comparamos $letra con $letraCorrecta y devolvemos un mensaje
 * 
 * @param cadena
 * @return mensaje
 */
function calculaletra($cadena){
    echo "DNI introducido: ".$cadena."<br>";
    $letrasDNI = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
    $num = intval(substr($cadena, 0, 8));
    $letra = strtoupper(substr($cadena, 8, 9));
    $posicionLetra = $num%23;
    $letraCorrecta = $letrasDNI[$posicionLetra];
    return ($letraCorrecta == $letra) ? "La letra introducida es correcta" : "LETRA ERRONEA. Letra  es correcta :".$letraCorrecta;
}
if(isset($_GET["dni"])){
    $dni = $_GET["dni"];
    if(strlen($dni) != 9){
        echo "Longitud DNI Incorrecta";
    }else{
        echo calculaletra($dni);
    }
}

?>