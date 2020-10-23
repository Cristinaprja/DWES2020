<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ejercicios DWES</title>
    <link rel="stylesheet" href="styles/style.css" type="text/css"/>
</head>
<body>
    <header>
        <?php
            include "include/header.php";
        ?>
    </header>
    <main id="inicio">
        <div id="menu"><a href="pages/basicos/index.php">Básicos<br>
            <img src="images/holaMundo.jpg" width="150px"></img></a>
        </div>
        <div id="menu"><a href="pages/estructurasControl/index.php">Estructuras de control<br>
            <img src="images/condicionales.png" width="150px"></img></a>
        </div>
        <div id="menu"><a href="pages/bucles/index.php">Bucles<br>
            <img src="images/bucle.jpg" width="150px"></img></a>
        </div>
        <div id="menu"><a href="pages/arrays/index.php">Arrays<br>
            <img src="images/array.png" width="150px"></img></a>
        </div>
        <div id="menu"><a href="pages/formularios/index.php">Formularios<br>
            <img src="images/formulario.png" width="150px"></img></a>
        </div>
    </main>
    <br>
    <footer>
        <?php
            include "include/footer.php";
        ?>
    </footer>
</body>
</html>