<?php

if (!function_exists('resposta_padrao')) {
    function resposta_padrao(
        string $message,
        string $code,
        int $statusCode,
        array $adicionais = []
    )
    {
        return response()->json([
                "status" => $statusCode,
                "code" => $code,
                "message" => $message
            ] + $adicionais, $statusCode);
    }
}


