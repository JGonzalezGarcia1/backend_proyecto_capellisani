<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/citas.php");

    $control = $_GET['control'];

    $citas = new citas($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $citas->consulta();
            break;
            case 'insertar':
                $json = file_get_contents('php://input');
                //$json = '{"fecha":"2024-05-25", "hora":"9:40", "fo_clientes": 1, "fo_servicio": 3, "fo_mediodepago": 1, "observaciones": " ", "atendido": " "}';
                $params = json_decode($json);
                $vec = $citas->insertar($params);
            break;
            case 'eliminar':
                $id = $_GET['id'];
                $vec = $citas->eliminar($id);
            break;
            case 'editar':
                $json = file_get_contents('php://input');
                //$json = '{"fecha":"2024-05-23", "hora":"16:00", "fo_clientes": 3, "fo_servicio": 2, "fo_mediodepago": 3, "observaciones": " ", "atendido": " "}';
                $params = json_decode($json);
                $id = $_GET['id'];
                $vec = $citas->editar($id, $params);
            break;
            case 'filtro':
                $dato = $_GET['dato'];
                $vec = $citas->filtro($dato);
            break;    
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>
