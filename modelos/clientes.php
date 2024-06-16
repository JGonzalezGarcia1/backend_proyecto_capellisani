<?php
     class Clientes{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }  
        
        //metodos
        public function consulta(){
            $con = "SELECT * FROM clientes ORDER BY nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM clientes WHERE id_clientes = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El cliente ha sido eliminado";
            return $vec;    
        }

        public function insertar($params){
        $ins = "INSERT INTO clientes(nombre, celular, correo, identificacion) VALUES('$params->nombre', '$params->celular', '$params->correo', '$params->identificacion')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El cliente ha sido guardado";
        return $vec;
        }

        public function editar($id, $params){
        $editar = "UPDATE clientes SET nombre = '$params->nombre', celular = '$params->celular', correo = '$params->correo', identificacion = '$params->identificacion' WHERE id_cliente = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El cliente ha sido editado";
        return $vec;
        }

        public function filtro($valor){
        $filtro = "SELECT * FROM clientes WHERE nombre LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        } 
        
        return $vec;
        }
    }    

    

?>