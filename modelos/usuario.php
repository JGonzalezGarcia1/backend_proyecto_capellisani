<?php
     class Usuario{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }  
        
        //metodos
        public function consulta(){
            $con = "SELECT * FROM usuario ORDER BY nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM usuario WHERE id_usuario = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El usuario ha sido eliminado";
            return $vec;    
        }

        public function insertar($params){
        $ins = "INSERT INTO usuario(nombre, correo, clave) VALUES('$params->nombre', '$params->correo', '$params->clave')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El usuario ha sido guardado";
        return $vec;
        }

        public function editar($id, $params){
        $editar = "UPDATE usuario SET nombre = '$params->nombre', correo = '$params->correo', clave = '$params->clave' WHERE id_usuario = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El usuario ha sido editado";
        return $vec;
        }

        public function filtro($valor){
        $filtro = "SELECT * FROM usuario WHERE nombre LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        } 
        
        return $vec;
        }
    }    

    

?>