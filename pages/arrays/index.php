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
                        echo "<a href=\"index.php\"><h2>ARRAYS</h2></a>";
                        echo "<p><a href='index.php?page=portfoliocss'>Portfolio con array</a></p>";
                        echo "<p><a href='index.php?page=mesAnnyo'>Meses del año</a></p>";
                        echo "<p><a href='index.php?page=barcos'>Juego de los barcos</a></p>";
                        echo "<p><a href='index.php?page=notasAlumnos'>Notas de alumnos</a></p>";
                        echo "<p><a href='index.php?page=vIrregulares'>Verbos irregulares</a></p>";
                        echo "<p><a href='index.php?page=continentes'>Información sobre continentes</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
                echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "portfoliocss":
                            echo "Portfolio con array</p>";
                            include "portfolio.php";
                        break;
                        case "mesAnnyo":
                            echo "Meses del año</p>";
                            include "mesAnnyo.php";
                        break;
                        case "barcos":
                            echo "Juego de los barcos</p>";
                            include "barcos.php";
                        break;
                        case "notasAlumnos":
                            echo "Notas de alumnos</p>";
                            include "notasAlumnos.php";
                        break;
                        case "vIrregulares":
                            echo "Verbos irregulares</p>";
                            include "vIrregulares.php";
                        break;
                        case "continentes":
                            echo "Información sobre continentes</p>";
                            include "continentes.php";
                        break;
                        echo "<div id=\"enlace\">";
                        e
                    }
                }
            echo "</div>";
            echo "<div>";
                echo "<p><a href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/arrays\">Enlace GitHub</a>";
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