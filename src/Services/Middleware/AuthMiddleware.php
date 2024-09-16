<?php

//Como não estou usando framework não usei namespace, optei pelo require
require_once __DIR__ . '/../Services/JwService.php';

class AuthMiddleware {
    
    public static function validarToken() {
        $cabecalho = apache_request_headers();
        if (!isset($cabecalho['Authorization'])) {
            return false;
        }
        
        $token = str_replace('Bearer ', '', $cabecalho['Authorization']);
        try {
            JwtService::validarToken($token);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
?>
