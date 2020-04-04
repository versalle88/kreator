<?php

declare(strict_types=1);

use FastRoute\Dispatcher;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use Versalle\Framework\Action\ActionInterface;

$request = ServerRequest::fromGlobals();

/** @var Dispatcher $dispatcher */
$dispatcher = include __DIR__ . DIRECTORY_SEPARATOR . 'dispatcher.php';

$routeInfo = $dispatcher->dispatch(
    $request->getMethod(),
    $request->getRequestTarget()
);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response = new Response(404, [], 'Not Found');
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response = new Response(405, [], 'Method Not Allowed');
        break;
    case Dispatcher::FOUND:
        $actionName = $routeInfo[1];

        /** @var ActionInterface $action */
        $action = new $actionName();

        $response = $action->invoke($request);

        break;
}

$response = $response->withProtocolVersion($request->getProtocolVersion());

header("HTTP/{$response->getProtocolVersion()} {$response->getStatusCode()} {$response->getReasonPhrase()}");
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
