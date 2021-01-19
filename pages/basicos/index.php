<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ejercicios DWES</title>
    <link rel="stylesheet" href="../../styles/estilos.css" type="text/css"/>
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
                    echo "<form action='basicos.php' method='post'>";
                        echo "<h2>BÁSICOS</h2>";
                        echo "<p><a href='index.php?page=holaMundo'>Hola Mundo</a></p>";
                        echo "<p><a href='index.php?page=basico1'>Ficha personal</a></p>";
                        echo "<p><a href='index.php?page=basico2'>Área del círculo</a></p>";
                        echo "<p><a href='index.php?page=basico3'>Suma de dos variables</a></p>";
                        echo "<p><a href='index.php?page=basico4'>Operaciones variadas</a></p>";
                        echo "<p><a href='index.php?page=basico5'>Operaciones con una variable</a></p>";
                        echo "<p><a href='index.php?page=basico6'>Script con una salida</a></p>";
                        echo "<p><a href='index.php?page=basico7'>Tipos de variables</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "holaMundo":
                            echo "Hola mundo</p>"; 
                            include "holaMundo.php";
                        break;
                        case "basico1";
                            echo "Ficha personal</p>"; 
                            include "basico1.php"; 
                        break;
                        case "basico2";
                            echo "Área del círculo</p>"; 
                            include "basico2.php"; 
                        break;
                        case "basico3";
                            echo "Suma de dos variables</p>"; 
                            include "basico3.php"; 
                        break;
                        case "basico4";
                        echo "Operaciones variadas</p>"; 
                        include "basico4.php"; 
                        break;
                        case "basico5";
                            echo "Operaciones con una variable</p>"; 
                            include "basico5.php"; 
                        break;
                        case "basico6";
                            echo "Script con una salida</p>"; 
                            include "basico6.php"; 
                        break;
                        case "basico7";
                            echo "Tipos de variables</p>"; 
                            include "basico7.php"; 
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a target=\"_blank\" href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/basicos\">Enlace GitHub</a></button>";
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