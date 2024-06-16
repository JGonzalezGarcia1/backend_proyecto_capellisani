<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/tipodeservicio.php");

    $control = $_GET['control'];

    $tipodeservicio = new tipodeservicio($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $tipodeservicio->consulta();
            break;
            case 'insertar':
                //$json = file_get_contents('php://input');
                $json = '{"tipo":"Tinte(mechas,decoloracion)"}';
                $params = json_decode($json);
                $vec = $tipodeservicio->insertar($params);
            break;
            case 'eliminar':
                $id = $_GET['id'];
                $vec = $tipodeservicio->eliminar($id);
            break;
            case 'editar':
                //$json = file_get_contents('php://input');
                $json = '{"tipo":"Tinte(mechas)"}';
                $params = json_decode($json);
                $id = $_GET['id'];
                $vec = $tipodeservicio->editar($id, $params);
            break;
            case 'filtro':
                $dato = $_GET['dato'];
                $vec = $tipodeservicio->filtro($dato);
            break;    
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>
