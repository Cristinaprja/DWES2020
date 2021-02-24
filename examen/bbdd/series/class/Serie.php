<?php
    require_once('DBAbstractModel.php');
    
    class Serie extends DBAbstractModel {
        private static $instancia;

        private $id;
        private $titulo;
        private $caratula;
        private $id_plan;
        private $numero_reproducciones;
 
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
        public function edit($user_data=array()) {
            
        }
        public function get(){

        }
        public function set($user_data = array()) {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "INSERT INTO series (id, titulo, caratula, valor) VALUES (:id, :titulo, :caratula, :id_plan)";
            $this->parametros['id']=$id;
            $this->parametros['titulo']=$titulo;
            $this->parametros['caratula']=$caratula;
            $this->parametros['id_plan']=$id_plan;
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = 'Clave guardada';
        }
        public function del($idUsuario=''){
            $this->query = "DELETE FROM clavefirma WHERE idUsuario = :idUsuario";
            $this->parametros['idUsuario']= $idUsuario;	
            $this->get_results_from_query();
            return $this->rows;
        }

        public function getClave($user_data=array()) {
            $this->query = "SELECT * FROM clavefirma WHERE idUsuario=:id_usuario AND fila=:fila AND columna=:columna";
            $this->parametros['id_usuario']= $user_data["id_usuario"];
            $this->parametros['fila']= $user_data["fila"];
            $this->parametros['columna']= $user_data["columna"];
            $this->get_results_from_query();
            return $this->rows;
        }
        public function getClavesUsuario($id='') {
            $this->query = "SELECT * FROM clavefirma WHERE id = :id";
            $this->parametros['id']= $id;	
            $this->get_results_from_query();
            return $this->rows;
        }
        public function delete($id="") {
            $this->query = "DELETE FROM clavefirma WHERE id = :id";
            $this->parametros['id']=$id;
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = 'Clave firma eliminada';
        }
        function __construct() {
            $this->db_name = 'book_example';
        }
        function __destruct() {
            $this->conn = null;
        }
    }
?>