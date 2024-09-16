<?php
//Como não estou usando framework não usei namespace, optei pelo require
require_once __DIR__ . '/../../config/database.php';

class Cliente {
    public $nome;
    public $cpf;
    public $endereco;
    public $sexo;

    public function gravar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, endereco, sexo) VALUES (:nome, :cpf, :endereco, :sexo)");
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':sexo', $this->sexo);
        return $stmt->execute();
    }

    public static function listarTodos($limit, $offset) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM clientes LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
