<?php
/**
 * Desarrolla una aplicación que genere un script para cración de usuarios a partir de un fichero.
 * Descargar fichero de alumnos.
 *  Opción A:  MYSQL
 * Ayuda:
 * BD:  CREATE DATABASE bdejemplo
 * Usuarios: GRANT ALL PRIVILEGES ON bdejemplo.* TO 'usuario'@'localhost' IDENTIFIED BY 'clave';
 * Opción B: ORACLE
 * Opción C: LINUX 
 *  Utilizando el modelo del primer ejecicio, desarrolla una aplicación para la creación masiva de usuarios en linux.
 */
$error = "";
function normaliza($cadena){
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

if(isset($_POST["enviar"])){
    $arrayUsuarios = array();
    $contador = 0;
    $fichero = fopen($_POST["fichero"], "r") or exit("No se ha podido abrir el fichero");
    $opcion = $_POST["opcion"];
    $usuarioRepe=0;

    do{
        $cadena = normaliza(strtolower(fgets($fichero)));
        if($contador > 7){
            $nombreCompleto = explode(" ", $cadena);
            $user = substr($nombreCompleto[0],0,2).substr($nombreCompleto[1],0,2).substr($nombreCompleto[2],0,2);
            do{
                if (in_array($user,$arrayUsuarios)){
                    $user=$user.$usuarioRepe;
                    $usuarioRepe++;
                }
                array_push($arrayUsuarios,$user);
                
            }while(!in_array($user,$arrayUsuarios));
        }
        $contador++;
    } while(!feof($fichero));
    fclose($fichero);

    if($opcion == "linux"){
        $salida = fopen("usuariosLinux.txt", "w");
        foreach ($arrayUsuarios as $clave => $usuario) {
            fwrite($salida, "useradd -m $usuario". PHP_EOL);
            fwrite($salida, "passwd $usuario".PHP_EOL);
            fwrite($salida, PHP_EOL);
        }
        fclose($salida); 
    }else if($opcion == "mysql"){
        $salida = fopen("usuariosMYSQL.txt","w");
        foreach ($arrayUsuarios as $clave => $usuario){
            fwrite($salida, "sudo useradd $usuario". PHP_EOL);
            fwrite($salida, "sudo passwd $usuario". PHP_EOL);
            fwrite($salida, PHP_EOL);
        }   
        fclose($salida);
    }
}else{
    echo "<form action=\"index.php?page=usuarios\" method=\"post\">";
        echo "<p><label>Introduzca un fichero: <input type=\"file\" name=\"fichero\" required/></label></p>";
        echo "<p><label>Elija tipo de usuario: 
        <select name=\"opcion\">
        <option value=\"linux\">Linux</option>
        <option value=\"mysql\">MySQL</option>
        </select></label></p>";
        echo "<span>$error</span>";
        echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\"/>";
    echo "</form>";
}
?>