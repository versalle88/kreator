<?php

declare(strict_types=1);

namespace App\HelloFriend\Responder;

use Psr\Http\Message\ResponseInterface;
use Versalle\Framework\ActionDomainResponder\Responder\Response\ViewFactory;

final class HelloFriendIndexResponder
{
    private $viewFactory;

    public function __construct(ViewFactory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    public function respond(): ResponseInterface
    {
        return $this->viewFactory->create('HelloFriend::hello_friend');
    }
}
