<?php

//Como não estou usando framework não usei namespace, optei pelo require
require_once '../../config/database.php';
require_once '../../src/Middleware/AuthMiddleware.php';
require_once '../../src/Utils/Validator.php';
require_once '../../src/Utils/Response.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!AuthMiddleware::validarToken()) {
    Response::enviar(401, "Acesso não permitido");
}

if (Validator::validarCliente($data)) {
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, endereco, sexo) VALUES (:nome, :cpf, :endereco, :sexo)");
    $stmt->bindParam(':nome', $data['nome']);
    $stmt->bindParam(':cpf', $data['cpf']);
    $stmt->bindParam(':endereco', $data['endereco']);
    $stmt->bindParam(':sexo', $data['sexo']);
    if ($stmt->execute()) {
        Response::enviar(201, "Cliente criado com sucesso");
    } else {
        Response::enviar(500, "Erro ao criar cliente");
    }
} else {
    Response::enviar(400, "Dados inválidos");
}
?>
