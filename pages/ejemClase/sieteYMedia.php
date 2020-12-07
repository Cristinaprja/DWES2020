<?php
/**
 * La Siete Y Media
 * @author Cristina Prieto Jalao
 * 07/12/2020
 */
session_start();

if(!isset($_SESSION["puntosJugador"])){
    $_SESSION["puntosJugador"] = 0;
    $_SESSION["puntosMaquina"] = 0;
    $_SESSION["estado"] = "inicio";
}

/**
 * Funcion que elige una carta para el jugador y otra para la máquina.
 */
function nuevaCarta(){
    $paloJ = getPaloRand();
    $figuraJ = getFiguraRand();
    $figuraM = getFiguraRand();
 
    echo "<img src=\"baraja/".$paloJ."/".$figuraJ.".jpg\"/><br/>";
 
    if($figuraJ > 7){
       $figuraJ = 0.5;
    }
    if ($figuraM > 7){
       $figuraM = 0.5;
    }
 
    $_SESSION["puntosJugador"] += $figuraJ;
 
    if($_SESSION["puntosMaquina"] < 7){
       $_SESSION["puntosMaquina"] += $figuraM;
    }    
}
/**
 * Funcion que devuelve un palo aleatorio
 */
function getPaloRand(){
    $palos = ["basto","copa","espada","oro"];
    $paloSelec = $palos[array_rand($palos)];
    return $paloSelec;
}
/**
 * Funcion que devuelve una figura aleatoria
 */
function getFiguraRand(){
    $figura = ["1","2","3","4","5","6","7","10","11","12"];
    $figuraSelec = $figura[array_rand($figura)];
    return $figuraSelec;
}

/**
 * Funcion que controla el estado de la partida, indica si hay victoria, empate o derrota.
 */
function comprobarEstado($plantarse){
    $puntosJ = $_SESSION["puntosJugador"];
    $puntosM = $_SESSION["puntosMaquina"];
 
    if($puntosJ > 7.5){
       $_SESSION["estado"] = "derrota";
    }
 
    if($plantarse){
        if($puntosM <= 7.5){
            if($puntosJ == $puntosM){
                $_SESSION["estado"] = "empate";
            }else if($puntosJ > $puntosM){
                $_SESSION["estado"] = "victoria";
            }else{
                $_SESSION["estado"] = "derrota";
            }
        }else{
            $_SESSION["estado"] = "victoria";
        }
    }
    
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
        if(isset($_SESSION["estado"])){
            if(isset($_GET["pagina"])){
                $plantarse = false;
                switch($_GET["pagina"]){
                    case "reinicio":
                        $_SESSION["puntosJugador"] = 0;
                        $_SESSION["puntosMaquina"] = 0;
                        $_SESSION["estado"] = "inicio";
                    break;
                    case "nuevaCarta":
                        nuevaCarta();
                        comprobarEstado($plantarse);
                    break;
                    case "plantarse":
                        $plantarse = true;
                        comprobarEstado($plantarse);
                    break;
                }
            }

            if($_SESSION["estado"] == "inicio"){
                echo "<ul>";
                    echo "<li><a href=\"sieteYMedia.php?pagina=reinicio\">Reiniciar partida</a></li>";
                    echo "<li><a href=\"sieteYMedia.php?pagina=nuevaCarta\">Nueva Carta</a></li>";
                    echo "<li><a href=\"sieteYMedia.php?pagina=plantarse\">Plantarse</a></li>";
                echo "</ul>";
               echo "Puntos jugador: ".$_SESSION["puntosJugador"]."<br/>";
            }else{
               echo "<a href=\"sieteYMedia.php?pagina=reinicio\">Volver a Jugar</a><br/>";
            }

            switch($_SESSION["estado"]){
                case "victoria":
                    echo "Puntos jugador: ".$_SESSION["puntosJugador"]."<br/>";
                    echo "Puntos maquina: ".$_SESSION["puntosMaquina"]."<br/>";
                    echo "<strong>¡Has ganado!</strong>";
                break;
                case "derrota":
                    echo "Puntos jugador: ".$_SESSION["puntosJugador"]."<br/>";
                    echo "Puntos maquina: ".$_SESSION["puntosMaquina"]."<br/>";
                    echo "<strong>Has perdido</strong>";
                break;
                case "empate":
                    echo "Puntos jugador: ".$_SESSION["puntosJugador"]."<br/>";
                    echo "Puntos maquina: ".$_SESSION["puntosMaquina"]."<br/>";
                    echo "<strong>EMPATE</strong>";
                break;
            }
         }
        ?>
    </main>
</body>
</html>