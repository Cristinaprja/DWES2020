<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ejercicios DWES</title>
    <link rel="stylesheet" href="../../styles/style.css" type="text/css"/>
    <link rel="stylesheet" href="estilosChips.css" type="text/css"/>
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
                    echo "<h2>OBJETOS</h2>";
                        echo "<p><a href='index.php?page=chips'>Chips de perros</a></p>";
                        echo "<p><a href='index.php?page=usuarios'>Autentificación de usuarios</a></p>";
                        echo "<p><a href='index.php?page=carrito'>Carrito de la compra</a></p>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";
            echo "<div id='ejercicio'>";
                echo "<p><b>Ejercicio : </b>";
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "chips":
                            echo "Chips de perros</p>";
                            include "chips.php";
                        break;
                        case "usuarios":
                            echo "Autentificación de usuarios</p>";
                            include "usuarios.php";
                        break;
                        case "carrito":
                            echo "Carrito de la compra</p>";
                            include "carrito.php";
                        break;
                    }
                }
            echo "</div>";
            echo "<div id=\"enlace\">";
                echo "<button><a target=\"_blank\" href=\"https://github.com/Cristinaprja/DWES2020/tree/master/pages/objetos\">Enlace GitHub</a></button>";
            echo "</div>";
        ?>
    </main>
    <footer>
        <?php
            include "../../include/footer.php";
        ?>
    </footer>
</body>
</html>