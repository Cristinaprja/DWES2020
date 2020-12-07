<?php
/**
 * Perfiles con cookies.
 * @author Cristina Prieto Jalao
 */
include "funciones.php";
$cookie = "";
$opcionesMenu = array(
    'Videojuegos'=>'videojuegos',
    'Literatura'=>'literatura',
    'Cine'=>'cine',
    'Series'=>'series'
);

$noticias = array (
    'videojuegos' => array(
        'videojuegos1.php',
        'videojuegos2.php',
    ),
    'literatura' => array(
        'literatura1.php',
        'literatura2.php',
    ),
    'cine' => array(
        'cine1.php',
        'cine2.php',
    ),
    'series' => array(
        'series1.php',
        'series2.php',
    ),
);
if (isset($_POST['enviar'])) {
    setcookie("noticias", "");
    setcookie('noticias', serialize($_POST['noticias']), time()+36000);
    $cookie = unserialize($_COOKIE['noticias']);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <main>
        <?php
            if (!isset($_POST['enviar'])) {
                echo "<form action=\"cookies.php\" method=\"post\">";
                    foreach ($opcionesMenu as $key => $value) {
                        echo "<input type=\"checkbox\" name=\"noticias[]\" value=\"$value\">$key<br/>";
                    }
                    echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\" />";
                echo "</form>";
            }else{
                echo "<form action=\"cookies.php\" method=\"post\">";
                    foreach ($opcionesMenu as $key => $value) {
                        if (compruebaSeleccion($value, $cookie)){
                            echo "<input type=\"checkbox\" name=\"noticias[]\" value=".$value." checked>".$key."<br/>";
                        }else{
                            echo "<input type=\"checkbox\" name=\"noticias[]\" value=".$value.">".$key."<br/>";
                        }
                    }
                    echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\" />";
                echo "</form>";

                foreach ($_POST['noticias'] as $indice){
                    foreach ($noticias[$indice] as $key => $value){
                        echo "<a href='#'>$value</a></br>";
                    }
                }
            }
        ?>
    </main>
</body>
</html>