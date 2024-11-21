<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['operation'], $_GET['a'], $_GET['b'])) {
    echo json_encode(["error" => "Parámetros inválidos"]);
    exit();
}

$operation = $_GET['operation'];
$a = (float) $_GET['a'];
$b = (float) $_GET['b'];

switch ($operation) {
    case 'sumar':
        $resultado = $a + $b;
        break;
    case 'restar':
        $resultado = $a - $b;
        break;
    case 'multiplicar':
        $resultado = $a * $b;
        break;
    case 'dividir':
        if ($b == 0) {
            echo json_encode(["error" => "No se puede dividir por cero"]);
            exit();
        }
        $resultado = $a / $b;
        break;
    default:
        echo json_encode(["error" => "Operación inválida"]);
        exit();
}

echo json_encode(["resultado" => $resultado]);
