<?php
     class Tipodeservicio{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }  
        
        //metodos
        public function consulta(){
            $con = "SELECT * FROM tipodeservicio ORDER BY tipo";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM tipodeservicio WHERE id_tipodeservicio = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El tipo de servicio ha sido eliminado";
            return $vec;    
        }

        public function insertar($params){
        $ins = "INSERT INTO tipodeservicio(tipo) VALUES('$params->tipo')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El tipo de servicio ha sido guardado";
        return $vec;
        }

        public function editar($id, $params){
        $editar = "UPDATE tipodeservicio SET tipo = '$params->tipo' WHERE id_tipodeservicio = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El tipo de servicio ha sido editado";
        return $vec;
        }

        public function filtro($valor){
        $filtro = "SELECT * FROM tipodeservicio WHERE tipo LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        } 
        
        return $vec;
        }
    }    

    

?>