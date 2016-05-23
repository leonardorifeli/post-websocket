<?php

require 'vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Hermes\Business\Service\SocketService;

$socket = new SocketService();

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            $socket
        )
    ),
    777
);

$loop = $server->loop;

$server->run();
