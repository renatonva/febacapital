<?php

class Response {
    public static function enviar($status, $mensagem, $data = null) {
        http_response_code($status);
        $resposta = ['message' => $mensagem];
        if ($data) {
            $resposta['data'] = $data;
        }
        echo json_encode($resposta);
        exit;
    }
}
?>
