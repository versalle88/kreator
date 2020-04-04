<?php

declare(strict_types=1);

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

return simpleDispatcher(
    function (RouteCollector $r) {
        $routes = include CONFIG_DIR . DIRECTORY_SEPARATOR . 'routes.php';
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
