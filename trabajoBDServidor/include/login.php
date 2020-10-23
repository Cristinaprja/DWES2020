<?php
    echo "<form action='./index.php' method='post'>";
        echo "<label>Usuario: <input type='text' name='user'></label>";
        echo "<label>Contraseña: <input type='password' name='pass'></label>";
        echo "<input type='submit' name='login' value='Enviar'>";
    echo "</form>";
?>