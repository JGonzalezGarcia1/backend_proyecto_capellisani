<?php
     class Mediodepago{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }  
        
        //metodos
        public function consulta(){
            $con = "SELECT * FROM mediodepago ORDER BY medio";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM mediodepago WHERE id_mediodepago = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El medio de pago ha sido eliminado";
            return $vec;    
        }

        public function insertar($params){
        $ins = "INSERT INTO mediodepago(medio) VALUES('$params->medio')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El medio de pago ha sido guardado";
        return $vec;
        }

        public function editar($id, $params){
        $editar = "UPDATE mediodepago SET medio = '$params->medio' WHERE id_mediodepago = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El medio de pago ha sido editado";
        return $vec;
        }

        public function filtro($valor){
        $filtro = "SELECT * FROM mediodepago WHERE medio LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        } 
        
        return $vec;
        }
    }    

    

?>