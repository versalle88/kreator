<?php

declare(strict_types=1);

namespace App\HelloFriend\Action;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Versalle\Framework\Action\ActionInterface;

use function GuzzleHttp\Psr7\stream_for;

final class HelloFriendIndexAction implements ActionInterface
{
    public function execute(ServerRequestInterface $request): ResponseInterface
    {
        $body = stream_for('Hello, friend.');

        return (new Response())->withBody($body);
    }
}
