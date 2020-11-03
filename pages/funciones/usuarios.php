<?php

/**
 * Supongamos el siguiente array
 * $aUsuarios = array(
 * array('nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'),
 * array('nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'),
 * array('nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''),);
 * 
 * Crea un script que utilice una función anónima para generar los nombres de usuarios. El nombre de
 * usuario se forma concatenando las dos primeras letras del primer apellido, las dos primeras letras 
 * del segundo apellido y la inicial del nombre.
 * @author Cristina Prieto Jalao
 */
$aUsuarios = array(
    array('nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'),
    array('nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'),
    array('nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''));

/**
 * Funcion para normalizar los caracteres especiales
 * @param cadena
 * @return cadena normalizada
 */
function normaliza($cadena){
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
echo "Los usuarios creados son:";

/**
 * Función anónima para crear usuarios
 */
$creacionUsuarios = function($array){
    $arrayUsuarios = array();
    foreach($array as $key => $value){
        $usuario = substr(strtolower(normaliza($value["apellido1"])), 0, 2). substr(strtolower(normaliza($value["apellido2"])), 0, 2).substr(strtolower(normaliza($value["nombre"])), 0 ,1) ;
        echo $usuario.", ";
        array_push($arrayUsuarios, $usuario);
    }
    return $arrayUsuarios;
};
foreach($creacionUsuarios($aUsuarios) as $usu){
    echo $usu." ,";
};
?>