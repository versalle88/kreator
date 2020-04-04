<?php

declare(strict_types=1);

namespace Versalle\Framework\ActionDomainResponder\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface ActionInterface
{
    public function invoke(ServerRequestInterface $request): ResponseInterface;
}
