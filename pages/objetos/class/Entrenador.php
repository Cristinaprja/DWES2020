<?php
/**
 * Clase Entrenador para ejericio chips.php
 * @author Cristina Prieto Jalao
 * 24/11/2020
 */
class Entrenador{
    public $nombre;
    public $imagen;
    public $formacion;

    public function __construct($arrayDatos){
        $this->nombre = $arrayDatos["nombre"];
        $this->imagen = $arrayDatos["imagen"];
        $this->formacion = $arrayDatos["formacion"];
    }
    public function setFormacion($formacion){
        $this->formacion = $formacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getFormacion(){
        return $this->formacion;
    }
}
?>