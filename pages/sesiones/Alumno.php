<?php
class Alumno {
    private $nombre;
    private $apellidos;
    private $notas = array();

    public function __construct($arrayNotas) {
        $this->nombre = $arrayNotas["nombre"];
        $this->apellidos = $arrayNotas["apellidos"];
        $this->notas = $arrayNotas;
    }

    public function agregarAlumno(){
        // $arrayFinal = array(
        //     "nombre" => $this->nombre,
        //     "apellidos" => $this->apelldos,
        //     "notas" => array(
        //         "trimestre1" => array(
        //         ),
        //     );
        // }
        // $trimestre1 = array();
        // foreach($this->notas as $key => $value){
        //     if(strpos($key, "t1")){
        //         echo "trimestre1";
        //     }
        // }
        // for($i=0; $i<sizeof($this->notas); $i++){
        //     if($i>2 && $i<6){   
        //         array_push($trimestre1, $i);
        //     }
        // }
            
        // }
        print_r($this->notas);
        array_push($_SESSION["arrayDWES"], array($this->notas));
    }
}