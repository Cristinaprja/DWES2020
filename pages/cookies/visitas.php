<?php
/**
 * Incluir en vuestro servidor un contador que indique al usuario el número de veces que ha accedido al sitio.
 * @author Cristina Prieto Jalao
 * 03/11/2020
 */
$mensaje ="";   
if(!isset($_COOKIE['visitas'])){
    setcookie('visitas', 0, time()+4);
    $mensaje = "Primera visita";
}else{
    $_COOKIE["visitas"]++;
    setcookie('visitas', $_COOKIE["visitas"]++, time()+4);
    $mensaje = 'Numero de visitas: '.$_COOKIE['visitas'];
}
echo $mensaje;
?>