<?php
/**
 * Clase usuario
 */
require_once('DBAbstractModel.php');

class Usuario extends DBAbstractModel{
    private static $instancia;

    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    /**
     * Función set para añadir alumnos
     */
    public function set($user_data=array()) {
        $this->query = "INSERT INTO alumnos (nombre, curso, tutor, incidencias, fecha_alta ,fecha_baja, d_responsable,telefono ,control_hash ,observaciones) VALUES 
        (:nombre, :curso, :tutor, :incidencias,:fecha_alta, :fecha_baja, :d_responsable, :telefono, :control_hash ,:observaciones)";
        $this->parametros['nombre']= $user_data["nombre"];
        $this->parametros['curso']= $user_data["curso"];
        $this->parametros['tutor']= $user_data["tutor"];
        $this->parametros['incidencias']=$user_data["incidencias"];
        $this->parametros['fecha_alta']=$user_data["fecha_alta"];
        $this->parametros['fecha_baja']=$user_data["fecha_baja"];
        $this->parametros['d_responsable']=$user_data["d_responsable"];
        $this->parametros['telefono']=$user_data["telefono"];
        $this->parametros['control_hash']=bin2hex(random_bytes(64));
        $this->parametros['observaciones']=$user_data["observaciones"];
        $this->get_results_from_query();            
    }

    /**
     * Función para editar un alumno ya existente
     */
    public function edit($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE alumnos SET fecha_baja=:fecha_baja, fecha_alta=:fecha_alta, d_responsable=:d_responsable, 
        observaciones=:observaciones WHERE  control_hash=:control_hash  ";// id=:id
        $this->parametros['control_hash']= $control_hash;
        //$this->parametros['id']= $id;
        $this->parametros['fecha_baja']= $fecha_baja;
        $this->parametros['fecha_alta']= $fecha_alta;
        $this->parametros['d_responsable']=$d_responsable;
        $this->parametros['observaciones']=$observaciones;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario modificado';
    }
    
    /**
     * Función usada para la busqueda de usuarios
     */
    public function buscarInfo($busqueda){
        $this->query = "SELECT * FROM alumnos
        WHERE 
        nombre LIKE :filtro or
        curso LIKE :filtro or
        tutor LIKE :filtro or
        incidencias LIKE :filtro or
        d_responsable LIKE :filtro or
        telefono LIKE :filtro or
        observaciones LIKE :filtro 
        ";
        $this->parametros['filtro']="%".$busqueda."%";
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }

    /**
     * Función obtener hash
     */
    public function getHashbyId($id){
        $this->query = "SELECT control_hash FROM alumnos WHERE id = :id ";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }  

    /**Función para mostrar ultimos alumnos */

    public function obtenerCincoUltimos(){
        $this->query = "SELECT * 
                FROM alumnos
                ORDER BY fecha_actual DESC
                LIMIT 5";
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }
    
}
?>