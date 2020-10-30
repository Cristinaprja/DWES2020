<?php
/**
 * PRÁCTICA. "Test de verbos irregulares".
 * @author Cristina Prieto Jalao
 * 20/10/2020
 */
session_start();
$crearArray = false;
if(!isset($_SESSION["arrayCreado"])){
    $_SESSION["arrayComprobacion"] = array();
    $crearArray = true;
}
$_SESSION["arrayCreado"] = true;
$arrayVerbos = array (
    array("ser/estar",  "be",  "was/were",  "been"),
    array("ganarle",  "beat",  "beat",  "beaten"),
    array("empezar",  "begin",  "began",  "begun"),
    array("doblar",  "bend",  "bent",  "bent"),
    array("morder",  "bite",  "bit",  "bitten"),
    array("soplar",  "blow",  "blew",  "blown"),
    array("romper",  "break",  "broke",  "broken"),
    array("llevar/traer",  "bring",  "brought",  "brought"),
    array("construir",  "build",  "built",  "built"),
    array("comprar",  "buy",  "bought",  "bought"),
    array("coger",  "catch",  "caught",  "caught"),
    array("elegir",  "choose",  "chose",  "chosen"),
    array("venir",  "come",  "came",  "come"),
    array("costar",  "cost",  "cost",  "cost"),
    array("hacer",  "do",  "did",  "done"),
    array("dibujar",  "draw",  "drew",  "drawn"),
    array("soñar",  "dream",  "dreamed/dreamt",  "dreamed/dreamt"),
    array("conducir",  "drive",  "drove",  "driven"),
    array("beber",  "drink",  "drank",  "drunk"),
    array("comer",  "eat",  "ate",  "eaten"),
    array("caer",  "fall",  "fell",  "fallen"),
    array("sentir",  "feel",  "felt",  "felt"),
    array("luchar",  "fight",  "fought",  "fought"),
    array("encontrar",  "find",  "found",  "found"),
    array("volar",  "fly",  "flew",  "flown"),
    array("olvidar",  "forget",  "forgot",  "forgotten"),
    array("perdonar",  "forgive",  "forgave",  "forgiven"),
    array("conseguir",  "get",  "got",  "gotten"),
    array("dar",  "give",  "gave",  "given"),
    array("ir",  "go",  "went",  "gone"),
    array("crecer",  "grow",  "grew",  "grown"),
    array("tener",  "have",  "had",  "had"),
    array("oir",  "hear",  "heard",  "heard"),
    array("esconder","hide","hid",     "hidden"),
    array("golpear","hit","hit","hit"),
    array("sujetar","hold","held","held"),
    array("doler / hacer daño","hurt","hurt","hurt"),
    array("guardar","keep","kept","kept"),
    array("saber","know","knew","known"),
    array("aprender","learn","learned,learnt","learned,learnt"),
    array("marcharse","leave","left","left"),
    array("prestar","lend","lent","lent"),
    array("permitir","let","let","let"),
    array("perder","lose","lost","lost"),
    array("hacer","make","made", "made"),
    array("significar","mean","meant","meant"),
    array("quedar","meet","met","met"),
    array("pagar","pay","paid","paid"),
    array("poner","put","put","put"),
    array("leer","read","read","read"),
    array("sonar","ring","rang","rung"),
    array("levantar","rise","rose","risen"),
    array("correr","run","ran","run"),
    array("decir","say","said","said"),
    array("ver","see","saw","seen"),
    array("vender","sell","sold","sold"),
    array("enviar","send","sent","sent"),
    array("mostrar","show","showed","showed/ shown"),
    array("enviar","send","sent","sent"),
    array("cerrar","shut","shut","shut"),
    array("cantar","sing","sang","sung"),
    array("sentarse","sit","sat","sat"),
    array("dormir","sleep","told","told"),
    array("hablar","speak","spoke","spoken"),
    array("gastar","spend","spent","spent"),
    array("estar de pie","stand","stood","stood"),
    array("nadar","swim","swam","swum"),
    array("tomar","take","took","taken"),
    array("enseñar","teach","taught","taught"),
    array("contar/ decir algo a alguien","tell","told","told"),
    array("pensar","think","thought","thought"),
    array("lanzar, arrojar","throw","threw","thrown"),
    array("entender","understand","understood","understood"),
    array("despertar","wake","woke", "woken"),
    array("llevar puesto/ ponerse","wear","wore","worn"),
    array("ganar","win","won","won"),
    array("escribir","write","wrote","written"));
$tiemposV = array("Español", "Present Simple", "Past Simple", "Past Participle");
if($crearArray){
    $i=0;
    while($i<4){
        $verboRandom = random_int(0,sizeof($arrayVerbos)-1);
        if(!in_array($verboRandom, $_SESSION["arrayComprobacion"])){
            array_push($_SESSION["arrayComprobacion"], $arrayVerbos[$verboRandom]);
            $i++;
        }
    }
}
if(isset($_POST["enviar"])){
    $dificultad = $_POST["dificultad"];
    switch($dificultad){
        case 1:
            $huecos = 1;
        break;
        case 2:
            $huecos = 2;
        break;
        case 3:
            $huecos = 3;
        break;
    }
    echo "<form action=\"index.php?page=vIrregulares\" method=\"post\">";
    echo "<table border=\"1px solid black\">";
    echo "<tr>";
    foreach($tiemposV as $tiempo){
        echo "<th>$tiempo</th>";
    }
    echo "</tr>";
    for($i=0; $i<4; $i++){
        echo "<tr>";
        $arrayRandom = array();
        $h=0;
        while($h<$huecos){
            $numRandom = rand(0,3);
            if(!in_array($numRandom, $arrayRandom)){
                array_push($arrayRandom, $numRandom);
                $h++;
            }
        }
        for($j=0; $j<4; $j++){
            if(in_array($j, $arrayRandom)){
                echo "<td><input type=\"text\" name=\"verbo[$i][$j]\"/ required></td>";
            }else{  
                echo "<td>".$_SESSION["arrayComprobacion"][$i][$j]."</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<input type=\"submit\" name=\"corregir\" value=\"Corregir\">";
    echo "</form>";
}else{
    echo "<form action=\"index.php?page=vIrregulares\" method=\"post\">";
    echo "<label>Elija el nivel de dificultad: <select name=\"dificultad\">
        <option value=\"1\">1</option>
        <option value=\"2\">2</option>
        <option value=\"3\">3</option>
    </select></label>";
    echo "<input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
    echo "</form>"; 
}
if(isset($_POST["corregir"])){
    $existeError = false;
    echo "<form action=\"index.php?page=vIrregulares\" method=\"post\">";
    echo "<table border=\"1px solid black\">";
    echo "<tr>";
    foreach($tiemposV as $tiempo){
        echo "<th>$tiempo</th>";
    }
    echo "</tr>";
    for($i=0; $i<4; $i++){
        echo "<tr>";
        for($j=0; $j<4; $j++){
            if(!empty($_POST["verbo"][$i][$j])){
                foreach($_POST["verbo"] as $indiceV => $value){
                    foreach($value as $indice => $resp){
                        if(($i == $indiceV) && ($j == $indice)){
                            if($_SESSION["arrayComprobacion"][$i][$j] == $resp){
                                echo "<td class=\"correcta\">$resp</td>";
                            }else{
                                echo "<td class=\"error\"><input type=\"text\" name=\"verbo[$i][$j]\" placeholder=\"$resp\" required></td>";
                                $existeError = true;
                            }
                        }
                    }
                }
            }else{
                echo "<td>".$_SESSION["arrayComprobacion"][$i][$j]."</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    if($existeError){
        echo "<input type=\"submit\" name=\"corregir\" value=\"Corregir\"/>";
    }
    else{
        session_destroy();
        session_unset();
    }
    echo "</form>";
}
?>