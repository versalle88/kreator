<?php

declare(strict_types=1);

namespace Versalle\Framework\Application;

use Psr\Http\Message\RequestInterface;

interface RouterInterface
{
    public function route(RequestInterface $request): array;
}
