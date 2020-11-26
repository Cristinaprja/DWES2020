<?php
/**
 * Los perros pertenecen a una persona y disponen de un chip cuya lectura nos permite conocer raza y edad 
 * del perro, así como el nombre y teléfono del dueño.
 * El estado de ánimo de la mascota influye en su comportamiento y la raza en el carácter e inteligencia.
 * Las personas mediante cursos de formación pueden convertirse en instructores con una determinada 
 * cualificación que determinará la velocidad de aprendizaje de los perros que adiestran. Es necesario
 * conocer el nivel de formación de los instructores para poder elegir el más adecuado para nuestra mascota.
 * Añadir todos aquellos supuestos que permitan enriquecer el modelo: razas de perros, nivel de salud, 
 * estado de ánimo, veterinarios, etc..
 * 
 * @author Cristina Prieto Jalao
 * 24/11/2020
 */

include "class/Perro.php";
include "class/Entrenador.php";
session_start();

if(!isset($_SESSION["inicio"])){
    $_SESSION["arrayPerros"] = array();
    $_SESSION["arrayEntrenadores"] = array();
}
$_SESSION["inicio"] = true;
echo "<a href=\"cerrarSesionPerros.php\">Cerrar Sesión</a>";
echo "<form action=\"index.php?page=chips\" method=\"post\">";
echo "<p><input type=\"submit\" name=\"nuevoPerro\" value=\"Nuevo Perro\"/></p>";
echo "<p><input type=\"submit\" name=\"nuevoEntrenador\" value=\"Nuevo Entrenador\"/></p>";
echo "<p><input type=\"submit\" name=\"acceder\" value=\"Acceder academia canina\"/></p>";
echo "</form>";

//Control de botones principales que te llevan a formularios de creacion o a la academia
if(isset($_POST["nuevoPerro"])){
    echo "<h3>Formulario nuevo perro</h3>";
    echo "<form action=\"index.php?page=chips\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<p><label>Nombre del perro: <input type=\"text\" name=\"nombre\" required /></label></p>";
    echo "<p><label>Raza del perro: <input type=\"text\" name=\"raza\" required /></label></p>";
    echo "<p><label>Imagen del perro: <input type=\"file\" name=\"imagen\" required /></label></p>";
    echo "<p><label>Peso del perro: <input type=\"number\" name=\"peso\" min=\"5\" max=\"50\" required /></label></p>";
    echo "<p><label>Inteligencia del perro: <input type=\"numer\" name=\"inteligencia\" required /></label></p>";
    echo "<p><label>Ánimo del perro: <select name=\"animo\">
            <option value=\"feliz\">Feliz</option>
            <option value=\"hambriento\">Hambriento</option>
            <option value=\"triste\">Triste</option>
        </select></p>";
    echo "<input type=\"submit\" name=\"agregarPerro\" value=\"Agregar Perro\"/>";
    echo "</form>";

}elseif(isset($_POST["nuevoEntrenador"])){
    echo "<h3>Formulario nuevo entrenador</h3>";
    echo "<form action=\"index.php?page=chips\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<p><label>Nombre del entrenador: <input type=\"text\" name=\"nombre\" required /></label></p>";
    echo "<p><label>Imagen del entrenador: <input type=\"file\" name=\"imagen\" required /></label></p>";
    echo "<p><label>Formacion del entrenador: <select name=\"formacion\">
            <option value=\"basica\">Básica</option>
            <option value=\"intermedia\">Intermedia</option>
            <option value=\"avanzada\">Avanzada</option>
        </select></p>";
    echo "<input type=\"submit\" name=\"agregarEntrenador\" value=\"Agregar Entrenador\"/>";
    echo "</form>";
}elseif(isset($_POST["acceder"])){
    echo "<table>";
    foreach($_SESSION["arrayPerros"] as $perro){
        echo "<td>";
        print_r($perro);
        $perro->getNombre();
        echo "<br>";
            echo "<table border=\"1px solid black\">";
            foreach($perro as $clave => $valor){
                echo "<tr><td>";
                switch($clave){
                    case "nombre":
                        $nombre = $valor;
                        echo $valor;
                    break;
                    case "imagen":
                        $imagen = $valor;
                        echo "<img src=\"perros/$valor\" width=\"100px\"></img>";
                    break;
                    case "raza":
                        echo "Raza: $valor";
                    break;
                    case "peso":
                        echo "Peso: $valor";
                    break;
                    case "inteligencia":
                        echo "IQ: $valor";
                    break;
                    case "habilidades":
                        echo "Habilidades: ";
                    break;
                    case "animo":
                        echo "Ánimo: $valor";
                    break;
                }        
                echo "</td></tr>";  
            }
            //Botones para interaccionar con el perro
            echo "<tr><td><a href=\"index.php?page=chips&btnJugar=".$nombre."&imagen=".$imagen."\"><button>Jugar</button></a></td></tr>";  
            echo "<tr><td><a href=\"index.php?page=chips&btnComer=".$nombre."&imagen=".$imagen."\"><button>Dar de comer</button></a></td></tr>";
            echo "<tr><td><a href=\"index.php?page=chips&btnEntrenar=".$nombre."&imagen=".$imagen."\"><button>Entrenar</button></a></td></tr>";
            echo "</table>";
        echo "</td>";
    }
    echo "</table>";
}

//Control de botones de formularios para instanciar los objetos
if(isset($_POST["agregarPerro"])){
    if($_FILES["imagen"]["type"] == "image/gif"
        || $_FILES["imagen"]["type"] == "image/jpeg" 
        || $_FILES["imagen"]["type"] == "image/jpg" 
        || $_FILES["imagen"]["type"] == "image/png"){
            move_uploaded_file($_FILES["imagen"]["tmp_name"], "perros/".$_FILES["imagen"]["name"]);
    }
        
    $nuevoPerro = array(
        "nombre" => $_POST["nombre"],
        "raza" => $_POST["raza"],
        "imagen" => $_FILES["imagen"]["name"],
        "peso" => $_POST["peso"],
        "inteligencia" => $_POST["inteligencia"],
        "animo" => $_POST["animo"]
    );
    
    echo "Agregaste un perrito nuevo";
    array_push($_SESSION["arrayPerros"], new Perro($nuevoPerro));

}elseif(isset($_POST["agregarEntrenador"])){
    if($_FILES["imagen"]["type"] == "image/gif"
        || $_FILES["imagen"]["type"] == "image/jpeg" 
        || $_FILES["imagen"]["type"] == "image/jpg" 
        || $_FILES["imagen"]["type"] == "image/png"){
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "entrenadores/".$_FILES["imagen"]["name"]);
    }
    
    $nuevoEntrenador = array(
        "nombre" => $_POST["nombre"],
        "formacion" => $_POST["formacion"],
        "imagen" => $_FILES["imagen"]["name"],
    );
    $entrenador = new Entrenador($nuevoEntrenador);
    echo "Agregaste un entrenador nuevo";
    print_r($entrenador); //
    array_push($_SESSION["arrayEntrenadores"], $entrenador);
}

//Control botones de la tabla de los perros
if(isset($_GET["btnJugar"])){
    echo $_GET["btnJugar"]. " esta jugando";
    echo "<img src=\"perros/".$_GET["imagen"]."\" width=\"100px\"></img>";

    foreach($_SESSION["arrayPerros"] as $perro){
        if($perro->getNombre() == $_GET["btnJugar"]){
            $perro->jugar();
        }
    }
}
?>