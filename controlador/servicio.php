<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/servicio.php");

    $control = $_GET['control'];

    $servicio = new Servicio($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $servicio->consulta();
            break;
            case 'insertar':
                $json = file_get_contents('php://input');
                //$json = '{"fo_tipodeservicio": 4, "nombre":"Tinte con mechas", "precio":"80000"}';
                $params = json_decode($json);
                $vec = $servicio->insertar($params);
            break;
            case 'eliminar':
                $id = $_GET['id'];
                $vec = $servicio->eliminar($id);
            break;
            case 'editar':
                $json = file_get_contents('php://input');
                //$json = '{"fo_tipodeservicio": 4, "nombre":"Tinte con mechas", "precio":"100000"}';
                $params = json_decode($json);
                $id = $_GET['id'];
                $vec = $servicio->editar($id, $params);
            break;
            case 'filtro':
                $dato = $_GET['dato'];
                $vec = $servicio->filtro($dato);
            break;    
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>
