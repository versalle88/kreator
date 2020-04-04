<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

use function GuzzleHttp\Psr7\stream_for;

$request = ServerRequest::fromGlobals();

$response = new Response();
$response = $response->withProtocolVersion($request->getProtocolVersion())
    ->withBody(stream_for('Hello, friend.'));

header("HTTP/{$response->getProtocolVersion()} {$response->getStatusCode()} {$response->getReasonPhrase()}");
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
