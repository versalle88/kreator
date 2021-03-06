<?php

declare(strict_types=1);

namespace App\HelloFriend\Action;

use App\HelloFriend\Responder\HelloFriendIndexResponder;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Versalle\Framework\ActionDomainResponder\Action\ActionInterface;

final class HelloFriendIndexAction implements ActionInterface
{
    private $responder;

    public function __construct(HelloFriendIndexResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws Exception
     */
    public function invoke(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responder->respond();
    }
}
