<?php
require_once "app\models\Persona.php";
require_once "app\models\Perro.php";

use App\Models\Persona;
use App\Models\Perro;

echo "hola";
$persona = new Persona("Cristina", "Prieto", "jalao");
$perro = new Perro("Cristina", "Prieto", "jalao");
$persona->saluda();
$perro->saluda();
