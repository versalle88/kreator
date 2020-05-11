<?php

declare(strict_types=1);

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

return simpleDispatcher(
    function (RouteCollector $r) {
        $routes            = include CONFIG_DIR . DIRECTORY_SEPARATOR . 'routes.php';
        $applicationRoutes = include APP_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routes.php';

        foreach ($applicationRoutes as $key => $item) {
            $routes[$key] = array_merge($routes[$key] ?? [], $item);
        }

        foreach ($routes as $route => $item) {
            foreach ($item as $httpMethod => $handler) {
                $r->addRoute(
                    $httpMethod,
                    $route,
                    $handler
                );
            }
        }
    }
);
