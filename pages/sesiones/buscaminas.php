<?php
/**
 * Buscaminas
 * @author Cristina Prieto Jalao
 * 17/11/2020
 */
session_start();
include "funciones.php";
if (!isset($_SESSION["juego"])) {
    $_SESSION["tablero"] = array();
    $_SESSION["tableroVisible"] = array();
}
echo "<a href=\"cerrarSesion4.php\">Cerrar Sesión</a>";

$_SESSION["juego"] = true;
$FILAS = 8;
$COLUMNAS = 10;
$BOMBAS = 10;
$resultado = "";

if (isset($_GET['fila'])) {
	$filEntrada = $_GET['fila'];
	$colEntrada = $_GET['columna'];
	$resultado = clickCasilla($_SESSION["tablero"], $_SESSION["tableroVisible"], $filEntrada, $colEntrada, $FILAS, $COLUMNAS, $BOMBAS) ?? "";
}
$_SESSION["tablero"] = crearTablero($_SESSION["tablero"], $FILAS, $COLUMNAS);
$_SESSION["tableroVisible"] = crearTableroVisible($_SESSION["tableroVisible"], $FILAS, $COLUMNAS);
$_SESSION["tablero"] = ponerBombas($_SESSION["tablero"], $BOMBAS, $FILAS, $COLUMNAS);
imprimirTableroVisible($_SESSION["tablero"], $_SESSION["tableroVisible"], $FILAS, $COLUMNAS);
echo $resultado;

?>