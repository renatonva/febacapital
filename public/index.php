<?php
require_once __DIR__ . '/../config/autoload.php';

//Montando o roteamento das telas
$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_uri === '/api/auth/login' && $request_method === 'POST') {
    require_once __DIR__ . '/../api/auth/login.php';
} elseif ($request_uri === '/api/auth/cadastrar' && $request_method === 'POST') {
    require_once __DIR__ . '/../api/auth/cadastrar.php';
} elseif ($request_uri === '/api/clientes/cadastrar' && $request_method === 'POST') {
    require_once __DIR__ . '/../api/clientes/cadastrar.php';
} elseif ($request_uri === '/api/clientes/listagem' && $request_method === 'GET') {
    require_once __DIR__ . '/../api/clientes/listagem.php';
} elseif ($request_uri === '/api/livros/cadastrar' && $request_method === 'POST') {
    require_once __DIR__ . '/../api/livros/cadastrar.php';
} elseif ($request_uri === '/api/livros/listagem' && $request_method === 'GET') {
    require_once __DIR__ . '/../api/livros/listagem.php';
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Não encontramos essa Rota']);
}
?>
