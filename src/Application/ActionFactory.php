<?php

declare(strict_types=1);

namespace Versalle\Framework\Application;

use Psr\Container\ContainerInterface;
use Versalle\Framework\ActionDomainResponder\Action\ActionInterface;

final class ActionFactory
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function create(array $routeInfo): ActionInterface
    {
        $actionName = $routeInfo[1];

        return $this->container->get($actionName);
    }
}
