<?php

class Validator {
    public static function validarCliente($data) {
        return isset($data['nome']) && isset($data['cpf']) && preg_match("/^\d{11}$/", $data['cpf']);
    }

    public static function validarLivro($data) {
        return isset($data['isbn']) && isset($data['titulo']) && isset($data['preco']) && isset($data['estoque']);
    }
}
?>
