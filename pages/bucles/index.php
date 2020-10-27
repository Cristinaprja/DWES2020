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
                        echo "<h2>BUCLES</h2>";
                        echo "<p><a href='index.php?page=num1al10'>Escribir los números del 1 al 10</a></p>";
                        echo "<p><a href='index.php?page=primerosPares'>Sumar los 3 primeros números pares</a></p>";
                        echo "<p><a href='index.php?page=tablaMult'>Tabla de multiplicar de 1 al 10</a></p>";
                        echo "<p><a href='index.php?page=pColores'>Mostrar paleta de colores</a></p>";
                        echo "<p><a href='index.php?page=calendario1'>Calendario</a></p>";
                        echo "<p><a href='index.php?page=calendario2'>Calendario con formulario</a></p>";
                        echo "<p><a href='index.php?page=calendario3'>Calendario con objeto y formulario</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "num1al10":
                            echo "Números del 1 al 10</p>";
                            include "num1al10.php";
                        break;
                        case "primerosPares":
                            echo "Sumar los 3 primeros números pares</p>";
                            include "primerosPares.php";
                        break;
                        case "tablaMult":
                            echo "Tabla de multiplicar de 1 al 10</p>";
                            include "tablaMult.php";
                        break;
                        case "pColores":
                            echo "Mostrar paleta de colores</p>";
                            include "pColores.php";
                        break;
                        case "calendario1":
                            echo "Calendario v1</p>";
                            include "calendario1.php";
                        break;
                        case "calendario2":
                            echo "Calendario con formulario</p>";
                            include "calendario2.php";
                        break;
                        case "calendario3":
                            echo "Calendario con objetos y formulario</p>";
                            include "calendario3.php";
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<p><a href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/bucles\">Enlace GitHub</a>";
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