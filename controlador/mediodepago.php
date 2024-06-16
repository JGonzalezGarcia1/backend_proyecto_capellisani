<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/mediodepago.php");

    $control = $_GET['control'];

    $mediodepago = new mediodepago($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $mediodepago->consulta();
            break;
            case 'insertar':
                //$json = file_get_contents('php://input');
                $json = '{"medio":"Nequi"}';
                $params = json_decode($json);
                $vec = $mediodepago->insertar($params);
            break;
            case 'eliminar':
                $id = $_GET['id'];
                $vec = $mediodepago->eliminar($id);
            break;
            case 'editar':
                //$json = file_get_contents('php://input');
                $json = '{"medio":"efectivo"}';
                $params = json_decode($json);
                $id = $_GET['id'];
                $vec = $mediodepago->editar($id, $params);
            break;
            case 'filtro':
                $dato = $_GET['dato'];
                $vec = $mediodepago->filtro($dato);
            break;    
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>
