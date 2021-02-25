<?php
if(!(isset($_SESSION["perfil"])) || $_SESSION["perfil"] == "admin"){
    header("Location: index.php");
} 
if($_SESSION["perfil"] == "basico"){
    echo "Usuario básico";
}else if($_SESSION["perfil"] == "premium"){
    echo "Usuario premium";
}
echo "<b>Películas</b>";
$mostrarLista = $_SESSION["serie"]->getSeries();
echo "<p id='centro'>Estás como invitado, create una cuenta para poder visualizar las mejores series.</p>";
echo "<p id='centro'>Listado de Series</p>";
echo "<table>";
echo "<tr><th>Título</th><th>Carátula</th><th>Reproducir Serie</th></th><th>Número Reproducciones</th></tr>";
foreach ($mostrarLista as $value){
    echo "<tr>";
        echo "<td>"; 
            echo $value['titulo'];
        echo "</td>";
        echo "<td>";
            echo "<img src=./img/".$value["caratula"]." alt='Imagen de la serie' width='250' height='250'>";
        echo "</td>";
        echo "<td><input type='submit' value='Darse de alta'></td>";
        echo "<td>"; 
            echo $value['numero_reproducciones'];
        echo "</td>";
    echo "</tr>";
}
echo "</table>";