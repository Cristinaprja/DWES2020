<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ejercicios DWES</title>
    <link rel="stylesheet" href="../../styles/style.css" type="text/css"/>
</head>
<body>
    <header>
        <?php
            include "../../include/header.php";
        ?>
    </header>
    <main>
        <?php
            echo "<div id='listado'>";
                echo "<div>";
                    echo "<form action='index.php' method='post'>";
                    echo "<h2>ESTRUCTURAS DE CONTROL</h2>";
                        echo "<p><a href='index.php?page=mayorDosNum'>Mayor de dos números</a></p>";
                        echo "<p><a href='index.php?page=diasMes'>Días del mes</a></p>";
                        echo "<p><a href='index.php?page=calcularEdad'>Calcular edad</a></p>";
                        echo "<p><a href='index.php?page=estaciones'>Estaciones del año</a></p>";
                        echo "<p><a href='index.php?page=enlaces'>Enlaces segun perfil</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
                echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "mayorDosNum":
                            echo "Mayor de dos números</p>";
                            include "mayorDosNum.php";
                        break;
                        case "diasMes":
                            echo "Días del mes</p>";
                            include "diasMes.php";
                        break;
                        case "calcularEdad":
                            echo "Calcular edad</p>";
                            include "calcularEdad.php";
                        break;
                        case "estaciones":
                            echo "Estaciones del año</p>";
                            include "estaciones.php";
                        break;
                        case "enlaces":
                            echo "Enlaces segun perfil</p>";
                            include "enlaces.php";
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/estructurasControl\">Enlace GitHub</a></button>";
            echo "</div>";
        ?>
    </main>
    <br>
    <footer>
        <?php
            include "../../include/footer.php";
        ?>
    </footer>
</body>
</html>