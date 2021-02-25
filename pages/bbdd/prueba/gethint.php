<?php
include "include/funciones.php";
$db = conectaDB();
$velocidad = 0;
$sqlConsulta = "SELECT nombre FROM superheroes";
$consulta = $db->prepare($sqlConsulta);
$consulta->execute();
$a = $consulta->fetchAll();

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        print_r($name["nombre"]);
        echo "<br>";
        if (stristr($q, substr($name["nombre"], 0, $len))) {
        if ($hint === "") {
            $hint = $name["nombre"];
        } else {
            $hint .= ", ".$name['nombre'];
        }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>