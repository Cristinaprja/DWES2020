<?php
class Alumno {
    private $nombre;
    private $apellidos;
    private $arrayInfo;
    // private $notas = array();

    public function __construct($arrayAlumno) {
        $this->nombre = $arrayAlumno["nombre"];
        $this->apellidos = $arrayAlumno["apellidos"];
        $this->arrayInfo = $arrayAlumno;
        // $this->notas = $arrayNotas;
    }

    public function agregarAlumno(){
        array_push($_SESSION["arrayDWES"], $this->arrayInfo);
        echo "Alumno agregado";
    }
}