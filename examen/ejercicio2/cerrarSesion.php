<?php
/**
 * Script que cierra sesion
 * Este solo se ejecutará para las pruebas
 * @author Cristina Prieto Jalao
 */
session_start();
session_unset($_SESSION);
session_destroy();
header("Location: index.php");
?>