<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\ServerRequest;

$request = ServerRequest::fromGlobals();

$action = new \App\HelloFriend\Action\HelloFriendIndexAction();

$response = $action->execute($request);

$response = $response->withProtocolVersion($request->getProtocolVersion());

header("HTTP/{$response->getProtocolVersion()} {$response->getStatusCode()} {$response->getReasonPhrase()}");
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
