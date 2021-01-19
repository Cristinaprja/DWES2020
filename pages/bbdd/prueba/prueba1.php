<?php
include "class/Superheroe.php";
include "config/config.php";

$datos = array("nombre" => "Capitan America",
                "velocidad" => 4);
$sh = Superheroe::getInstancia();
$sh->set($datos);
$id = $sh->lastInsert();
$datos = $sh->get($id);
foreach($datos as $elemento){
    foreach($elemento as $key=>$value){
        echo $key." : ".$value."<br>";
    }
}
?>

