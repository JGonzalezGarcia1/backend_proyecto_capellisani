<?php
     class Citas{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }  
        
        //metodos
        public function consulta(){
            $con = "SELECT c.*, cl.nombre AS clientes, s.nombre AS servicio, mp.medio AS mediodepago FROM citas c
            INNER JOIN clientes cl ON c.fo_clientes = cl.id_clientes
            INNER JOIN servicio s ON c.fo_servicio = s.id_servicio
            INNER JOIN mediodepago mp ON c.fo_mediodepago = mp.id_mediodepago
            ORDER BY c.fo_clientes";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];
            
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        }

        public function eliminar($id){
            $del = "DELETE FROM citas WHERE id_citas = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La cita ha sido eliminada";
            return $vec;    
        }

        public function insertar($params){
        $ins = "INSERT INTO citas(fecha, hora, fo_clientes, fo_servicio, fo_mediodepago, observaciones, atendido) 
                VALUES('$params->fecha', '$params->hora', $params->fo_clientes, $params->fo_servicio, $params->fo_mediodepago, '$params->observaciones', '$params->atendido')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La cita ha sido guardada";
        return $vec;
        }

        public function editar($id, $params){
        $editar = "UPDATE citas SET fecha = '$params->fecha', hora = '$params->hora', fo_clientes = '$params->fo_clientes', fo_servicio = '$params->fo_servicio', fo_mediodepago = '$params->fo_mediodepago', observaciones = '$params->observaciones', atendido = '$params->atendido' WHERE id_citas = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La cita ha sido editada";
        return $vec;
        }

        public function filtro($valor){
        $filtro = "SELECT c.*, cl.nombre AS clientes, s.nombre AS servicio, mp.medio AS mediodepago FROM citas c
        INNER JOIN clientes cl ON c.fo_clientes = cl.id_clientes
        INNER JOIN servicio s ON c.fo_servicio = s.id_servicio
        INNER JOIN mediodepago mp ON c.fo_mediodepago = mp.id_mediodepago
        WHERE cl.nombre LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        } 
        
        return $vec;
        }
    }    

    

?>