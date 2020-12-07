<?php
/**
 * Clase Carro para el ejercicio carrito.php
 * @author Cristina Prieto Jalao
 * 03/12/2020
 */
class Carro{
    public $fecha;
    public $direccion;
    public $productos = array();

    public function __construct($arrayDatos){
        $this->fecha = $arrayDatos[0];
        $this->direccion = $arrayDatos[1]; 
    }
    public function addProducto($nuevoProducto){
        array_push($this->productos, $nuevoProducto);
    }
    public function calcularCarro(){
        $total = 0;
        foreach($this->productos as $producto){
            foreach($producto as $key => $value){
                if($key == "precio"){
                    $total += $value;
                }
            }
        }
        return $total;
    }
}
?>