<?php

//Como não estou usando framework não usei namespace, optei pelo require
require_once '../../config/database.php';
require_once '../../src/Controllers/LivroController.php';
require_once '../../src/Middleware/AuthMiddleware.php';
require_once '../../src/Utils/Response.php';

if (!AuthMiddleware::validarToken()) {
    Response::enviar(401, "Acesso não autorizado");
}

$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

$livros = LivroController::listar($limit, $offset);
Response::enviar(200, "Listagem de livros", $livros);
?>
