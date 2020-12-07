<?php
/**
 * Funcion para comprobar la seleccion de checkbox para las cookies
 */
function compruebaSeleccion($entrada, $cookie) {
    for ($i=0; $i<sizeof($cookie); $i++) { 
        if ($cookie[$i]==$entrada){
            return true;
        }
    }
    return false;
}
?>