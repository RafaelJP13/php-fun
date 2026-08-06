<?php

declare(strict_types=1);

namespace App\WebSocket;

use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Swoole\Server;
use Swoole\WebSocket\Frame;

class ChatHandler implements OnOpenInterface, OnMessageInterface, OnCloseInterface
{
    public function onOpen($server, $request): void
    {
        echo "Cliente conectado: {$request->fd}\n";

        $server->push(
            $request->fd,
            'Conectado ao Chat Hyperf!'
        );
    }

    public function onMessage($server, $frame): void
    {
        echo "Mensagem recebida: {$frame->data}\n";

        $server->push(
            $frame->fd,
            "Você disse: {$frame->data}"
        );
    }

    public function onClose($server, int $fd, int $reactorId): void
    {
        echo "Cliente desconectado: {$fd}\n";
    }
}