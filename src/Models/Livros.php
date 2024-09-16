<?php
//Como não estou usando framework não usei namespace, optei pelo require
require_once __DIR__ . '/../../config/database.php';

class Livro {
    public $isbn;
    public $titulo;
    public $autor;
    public $preco;
    public $estoque;

    public function gravar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO livros (isbn, titulo, autor, preco, estoque) VALUES (:isbn, :titulo, :autor, :preco, :estoque)");
        $stmt->bindParam(':isbn', $this->isbn);
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':estoque', $this->estoque);
        return $stmt->execute();
    }

    public static function listarTodos($limit, $offset) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM livros LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
