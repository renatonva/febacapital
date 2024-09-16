<?php

//Como não estou usando framework não usei namespace, optei pelo require
require_once '../../config/database.php';
require_once '../../src/Controllers/LivroController.php';
require_once '../../src/Middleware/AuthMiddleware.php';
require_once '../../src/Utils/Response.php';

if (!AuthMiddleware::validarToken()) {
    Response::enviar(401, "Acesso não autorizado");
}

$data = json_decode(file_get_contents("php://input"), true);

$response = LivroController::criar($data);
Response::enviar(201, $response['message']);
?>
