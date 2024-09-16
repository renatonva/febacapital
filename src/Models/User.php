<?php
//Como não estou usando framework não usei namespace, optei pelo require
require_once __DIR__ . '/../../config/database.php';

class User {
    public $username;
    public $password;
    public $name;

    public function gravar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (username, password, name) VALUES (:username, :password, :name)");
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':name', $this->name);
        return $stmt->execute();
    }

    public static function buscarPorUsuario($username) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchObject('User');
    }
}
?>
