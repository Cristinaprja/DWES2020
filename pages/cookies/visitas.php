<?php
/**
 * Incluir en vuestro servidor un contador que indique al usuario el número de veces que ha accedido al sitio.
 * @author Cristina Prieto Jalao
 * 03/11/2020
 */

if(isset($_COOKIE['visitas'])){
    setcookie('visitas',$_COOKIE['visitas']+1,time()+3600*24);
    $mensaje = 'Numero de visitas: '.$_COOKIE['visitas'];   
}else{
    setcookie('visitas',1,time()+3600*24);
    $mensaje = 'Bienvenido por primera vez a nuesta web';
}
echo $mensaje;
?>