<?php

/**
 * @noinspection MessDetectorValidationInspection
 * @noinspection PhpUnused
 * @noinspection RedundantSuppression
 */

declare(strict_types=1);

namespace App\HelloFriend\Action;

use App\HelloFriend\Responder\HelloFriendIndexResponder;
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

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responder->respond();
    }
}
