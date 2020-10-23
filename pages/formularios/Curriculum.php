<?php
class Curriculum{
    private $nombre;
    private $apellidos;
    private $fNacimiento;
    private $carnetConducir;
    private $conocimientos;
    // private $imagen;
    public function __construct($nombre, $apellidos, $fNacimiento, $carnetConducir, $conocimientos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fNacimiento = $fNacimiento;
        $this->carnetConducir = $carnetConducir;
        $this->conocimientos = $conocimientos;
        // $this->imagen = $imagen;
    }
    public function imprimirCurriculum(){
        echo "<div>";
        echo "<p>Nombre: $this->nombre</p>";
        echo "<p>Apellidos: $this->apellidos</p>";
        echo "<p>Fecha Nacimiento: $this->fNacimiento</p>";
        echo "<p>Carnet de conducir: $this->carnetConducir</p>";
        echo "<p>Conocimientos:";
        foreach($this->conocimientos as $selected){
            echo $selected.", ";
        }
        echo "</p>";
        echo "</div>";
    }
}
?>