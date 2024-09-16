<?php

//Como não estou usando framework não usei namespace, optei pelo require
require_once '../../config/database.php';
require_once '../../src/Controllers/AuthController.php';
require_once '../../src/Utils/Response.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['username']) && isset($data['password']) && isset($data['name'])) {
    $response = AuthController::cadastrar($data);
    Response::enviar(201, $response['message']);
} else {
    Response::enviar(400, "Os dados fornecidos estão incompletos");
}
?>
