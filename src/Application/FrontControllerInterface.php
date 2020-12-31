<?php

declare(strict_types=1);

namespace Versalle\Framework\Application;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface FrontControllerInterface
{
    public function dispatch(ServerRequestInterface $request): ResponseInterface;
}
