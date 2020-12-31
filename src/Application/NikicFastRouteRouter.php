<?php

declare(strict_types=1);

namespace Versalle\Framework\Application;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Psr\Http\Message\RequestInterface;
use Versalle\Framework\FileSystem\DirectoryList;

use function FastRoute\simpleDispatcher;

final class NikicFastRouteRouter implements RouterInterface
{
    private $directoryList;

    public function __construct(DirectoryList $directoryList)
    {
        $this->directoryList = $directoryList;
    }

    public function route(RequestInterface $request): array
    {
        $dispatcher = $this->createDispatcher();

        return $dispatcher->dispatch(
            $request->getMethod(),
            $request->getRequestTarget()
        );
    }

    private function createDispatcher(): Dispatcher
    {
        return simpleDispatcher(
            function (RouteCollector $routeCollector) {
                $routes = $this->loadRoutes();

                foreach ($routes as $route => $item) {
                    foreach ($item as $httpMethod => $handler) {
                        $routeCollector->addRoute(
                            $httpMethod,
                            $route,
                            $handler
                        );
                    }
                }
            }
        );
    }

    private function loadRoutes(): array
    {
        $frameworkRoutes   = $this->loadFrameworkRoutes();
        $applicationRoutes = $this->loadApplicationRoutes();

        foreach ($applicationRoutes as $key => $item) {
            $frameworkRoutes[$key] = array_merge($frameworkRoutes[$key] ?? [], $item);
        }

        return $frameworkRoutes;
    }

    private function loadFrameworkRoutes(): array
    {
        /** @noinspection PhpIncludeInspection */
        return include $this->directoryList->getFrameworkConfigDir() . 'routes.php';
    }

    private function loadApplicationRoutes(): array
    {
        /** @noinspection PhpIncludeInspection */
        return include $this->directoryList->getApplicationConfigDir() . 'routes.php';
    }
}
