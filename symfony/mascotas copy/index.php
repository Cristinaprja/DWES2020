<?php
require_once "vendor\autoload.php";

use App\Models\Persona;
use App\Models\Perro;

echo "hola<br>";
$persona = new Persona("Cristina", "Prieto", "jalao");
$perro = new Perro("Cristina", "Prieto", "jalao");

$persona->saluda();
$perro->saluda();