<?php
     class Servicio{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }  
        
        //metodos
        public function consulta(){
            $con = "SELECT s.*, ts.tipo AS tipodeservicio FROM servicio s INNER JOIN tipodeservicio ts ON s.fo_tipodeservicio = ts.id_tipodeservicio ORDER BY s.fo_tipodeservicio";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM servicio WHERE id_servicio = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El servicio ha sido eliminado";
            return $vec;    
        }

        public function insertar($params){
        $ins = "INSERT INTO servicio(fo_tipodeservicio, nombre, precio) VALUES($params->fo_tipodeservicio, '$params->nombre', $params->precio)";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El servicio ha sido guardado";
        return $vec;
        }

        public function editar($id, $params){
        $editar = "UPDATE servicio SET fo_tipodeservicio = '$params->fo_tipodeservicio', nombre = '$params->nombre', precio = $params->precio WHERE id_servicio = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El servicio ha sido editado";
        return $vec;
        }

        public function filtro($valor){
        $filtro = "SELECT s.*, ts.tipo AS tipodeservicio FROM servicio s
        INNER JOIN tipodeservicio ts ON s.fo_tipodeservicio = ts.id_servicio 
        WHERE ts.tipo LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        } 
        
        return $vec;
        }
    }    

    

?>