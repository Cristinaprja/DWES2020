<?php
/**
 * Función que genera un formulario con un test
 * @param arrayTest
 * @param numTest
 */
function formularioTest($arrayTest, $numTest){
    echo "<h2>Test $numTest</h2>";
    echo "<form action=\"index.php\" method=\"post\">";
        foreach($arrayTest as $test => $array){
            if($array["idTest"] == $numTest){
                foreach($array as $key => $value){
                    if($key == "Preguntas"){
                        foreach($value as $array => $preguntas){
                            foreach($preguntas as $key2 => $value2){
                                if($key2 == "idPregunta"){
                                    $idPregunta = $value2;
                                    $imagen = "img".$numTest."/".$value2;
                                    if(file_exists($imagen)){
                                        echo "<img src=\"img".$numTest."/".$value2."\" width=\"100px\" />";
                                    }
                                }
                                if($key2 == "Pregunta"){
                                    echo "<p><strong>".$value2."</strong><br>";
                                }
                                if($key2 == "respuestas"){  
                                    foreach($value2 as $array2 => $res){
                                        echo "<label>$res: <input type=\"radio\" name=\"test".$numTest.$idPregunta."\" value=\"$res[0]\" /></label></p>";
                                    }
                                }
                            }
                            echo "<br>";
                        }
                    }
                }
            }
        }
        echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\" />";
    echo "</form>";
}
/**
 * Función que extrae las respuestas correctas del test que se está haciendo y devuelve un array
 * @param arrayTest
 * @param numTest
 * @return corrector
 */
function getCorrector ($arrayTest, $numTest){
    $corrector = array();
    foreach($arrayTest as $test => $array){
        if($array["idTest"] == $numTest){
            foreach($array as $key => $value){
                if($key == "Corrector"){
                    array_push($corrector, $value);
                }
            }
        }
    }
    return $corrector;
}

/**
 * Funcion que recibe el array con las respuestad del usuario y el array de las respuestas correctas
 * @param arrayRespuestas
 * @param corrector
 * @return correctas
 */
function corregirTest($arrayRespuestas , $corrector){
    $correctas = 0;
    foreach($arrayRespuestas as $key => $value){
        if(strpos($key, "test") !== false){
            $respuesta = substr($key, 5, 6); //Respuesta tipo 1b
            if($value == $corrector[0][$respuesta-1]){
                $correctas++;
            }
        }
    }
    return $correctas;
}

/**
 * Función que recibe el número de respuestas correctas para saber si has aprobado o suspendido
 * @param numCorrectas
 * @return true o false
 */
function comprobarResultado($numCorrectas){
    return ($numCorrectas > 7) ? true : false;
}
?>