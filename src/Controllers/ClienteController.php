<?php
//Como não estou usando framework não usei namespace, optei pelo require
require_once __DIR__ . '/../Models/Cliente.php';

class ClienteController {

    public static function criar($data) {
        $cliente = new Cliente();
        $cliente->nome = $data['nome'];
        $cliente->cpf = $data['cpf'];
        $cliente->endereco = $data['endereco'];
        $cliente->sexo = $data['sexo'];

        if ($cliente->gravar()) {
            return ['message' => 'Cliente criado com sucesso'];
        } else {
            return ['message' => 'Não foi possível criar o cliente'];
        }
    }

    public static function listar($limit, $offset) {
        return Cliente::listarTodos($limit, $offset);
    }
}
?>
