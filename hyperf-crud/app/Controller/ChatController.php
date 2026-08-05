<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Contract\ResponseInterface;

class ChatController
{
    public function index(ResponseInterface $response)
    {
        return $response->html(<<<'HTML'
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <title>Chat Hyperf</title>
        </head>
        <body>
            <h1>Chat Hyperf</h1>

            <p>Servidor funcionando!</p>
        </body>
        </html>
        HTML);
    }
}