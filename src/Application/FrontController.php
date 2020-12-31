<?php

declare(strict_types=1);

namespace Versalle\Framework\Application;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class FrontController implements FrontControllerInterface
{
    public function dispatch(RequestInterface $request): ResponseInterface
    {
        // TODO: Implement dispatch() method.
    }
}
