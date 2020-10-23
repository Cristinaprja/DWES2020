<?php
    echo "<form action=".$_SERVER['PHP_SELF']." method='post'>";
        echo "Ha iniciado sesion como: ".$_SESSION["usuario"];
        echo "<input class='btn btn-outline-danger' type='submit' name='salir' value='Salir'>";
    echo "</form>";
?>