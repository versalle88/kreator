<?php

declare(strict_types=1);

namespace Versalle\Framework\Container;

use Psr\Container\ContainerInterface;
use Versalle\Container\Container;

final class ContainerFactory
{
    private $containerClassName = Container::class;

    public function create(): ContainerInterface
    {
        return new $this->containerClassName();
    }
}
