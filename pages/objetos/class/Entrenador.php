<?php
/**
 * Clase Entrenador para ejericio chips.php
 * @author Cristina Prieto Jalao
 * 24/11/2020
 */
class Entrenador{
    public $nombre;
    public $formacion;
    public $imagen;

    public function __construct($arrayDatos){
        $this->nombre = $arrayDatos["nombre"];
        $this->formacion = $arrayDatos["formacion"];
        $this->imagen = $arrayDatos["imagen"];
    }
    public function setFormacion($formacion){
        $this->formacion = $formacion;
    }
}
?>