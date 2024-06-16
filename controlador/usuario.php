<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/usuario.php");

    $control = $_GET['control'];

    $usuario = new usuario($conexion);

    switch ($control) {
        case 'consulta':
            $vec = $usuario->consulta();
            break;
            case 'insertar':
                //$json = file_get_contents('php://input');
                $json = '{"nombre":"Liliana Reales Martinez", "correo": "lilireales@gmail.com", "clave": "Lili45"}';
                $params = json_decode($json);
                $vec = $usuario->insertar($params);
            break;
            case 'eliminar':
                $id = $_GET['id'];
                $vec = $usuario->eliminar($id);
            break;
            case 'editar':
                //$json = file_get_contents('php://input');
                $json = '{"nombre":"Liliana Reales Montes", "correo":"lilireales@gmail.com",  "clave": "Lili45 "}';
                $params = json_decode($json);
                $id = $_GET['id'];
                $vec = $usuario->editar($id, $params);
            break;
            case 'filtro':
                $dato = $_GET['dato'];
                $vec = $usuario->filtro($dato);
            break;    
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>
