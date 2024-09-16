<?php
use Firebase\JWT\JWT;

class JwtService {
    public static function gerarToken($userId) {
        $config = require __DIR__ . '/../../config/jwt.php';
        $payload = [
            'iss' => "http://localhost", 
            'aud' => "http://localhost", 
            'iat' => time(), 
            'exp' => time() + (60*60), 
            'userId' => $userId
        ];
        return JWT::encode($payload, $config['secret_key'], $config['algorithms'][0]);
    }

    public static function validarToken($token) {
        $config = require __DIR__ . '/../../config/jwt.php';
        return JWT::decode($token, $config['secret_key'], $config['algorithms']);
    }
}
?>
