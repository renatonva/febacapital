<?php

//Como não estou usando framework não usei namespace, optei pelo require
require_once '../../config/database.php';
require_once '../../src/Services/JwService.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['username']) && isset($data['password'])) {
    $user = $data['username'];
    $pass = $data['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $user);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        $generateToken = JwtService::gerarToken($user['id']);
        echo json_encode(['token' => $generateToken]);
    } else {
        http_response_code(401);
        echo json_encode(['message' => 'Acesso ou credenciais são invákidas']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Preencha os campos obrigatórios']);
}
?>
