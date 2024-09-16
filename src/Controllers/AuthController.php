<?php

//Como não estou usando framework não usei namespace, optei pelo require
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Services/JwtService.php';

class AuthController {
    public static function cadastrar($data) {
        $user = new User();
        $user->username = $data['username'];
        $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $user->name = $data['name'];

        if ($user->gravar()) {
            return ['message' => 'Usuário registrado com sucesso'];
        } else {
            return ['message' => 'Erro ao registrar o usuário'];
        }
    }

    public static function login($username, $password) {
        $user = User::buscarPorUsuario($username);
        if ($user && password_verify($password, $user->password)) {
            return JwtService::gerarToken($user->id);
        }
        return false;
    }
}
?>
