<?php
//Como não estou usando framework não usei namespace, optei pelo require
require_once __DIR__ . '/../Models/Livro.php';

class LivroController {
    
    public static function criar($data) {
        $livro = new Livro();
        $livro->isbn = $data['isbn'];
        $livro->titulo = $data['titulo'];
        $livro->autor = $data['autor'];
        $livro->preco = $data['preco'];
        $livro->estoque = $data['estoque'];

        if ($livro->gravar()) {
            return ['message' => 'Livro cadastrado com sucesso'];
        } else {
            return ['message' => 'Não foi possível cadastrar o livro'];
        }
    }

    public static function listar($limit, $offset) {
        return Livro::listarTodos($limit, $offset);
    }
}
?>
