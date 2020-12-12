<?php
/**
 * Examen de 1º Trimestre
 * Test de una autoescuela
 * @author Cristina Prieto Jalao
 * 10/12/2020
 */
include "config/arrayPreguntas.php";
include "funciones.php";
if(isset($_POST["borrarCookie"])){
    setcookie("test", "", time()-3600);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" type="text/css"/>
    <title>Test de Autoescuela</title>
</head>
<body>
    <?php
    echo "<form action=\"index.php\" method=\"post\">";
        echo "<input type=\"submit\" name=\"borrarCookie\" value=\"Reiniciar test\" />";
    echo "</form>";
    
    if(!isset($_POST["enviar"])){
        if(!isset($_COOKIE["test"])){
            setcookie("test", 1, time()+3600);
            formularioTest($aTests, 1);
        }else{
            if($_COOKIE["test"] < 3){
                setcookie("test", $_COOKIE["test"]+=1, time()+3600);
                formularioTest($aTests, $_COOKIE["test"]);
            }else{
                formularioTest($aTests, 3);
            }
        }
    }else{
        echo "<h3>Formulario enviado</h3>";
        $corrector = getCorrector($aTests, 1);
        $correctas = corregirTest($_POST, $corrector);
        echo "Numero de aciertos: ".$correctas;
        if(comprobarResultado($correctas)){
            echo "<h1 class=\"aprobado\">HAS APROBADO</h1>";
        }else{
            echo "<h1 class=\"suspenso\">HAS SUSPENDIDO</h1>";
        }
    }
    ?>
</body>
</html>