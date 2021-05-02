<?php

/**
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace Versalle\Framework\Application;

use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ResponseInterface;

final class HttpApplication implements ApplicationInterface
{
    private $frontController;

    public function __construct(FrontControllerInterface $frontController)
    {
        $this->frontController = $frontController;
    }

    public function run(): void
    {
        $request  = ServerRequest::fromGlobals();
        $response = $this->frontController->dispatch($request);

        $this->sendResponse($response);
    }

    private function sendResponse(ResponseInterface $response): void
    {
        $this->sendResponseHeaders($response);
        $this->sendResponseBody($response);
    }

    private function sendResponseHeaders(ResponseInterface $response): void
    {
        header(
            "HTTP/{$response->getProtocolVersion()} {$response->getStatusCode()} {$response->getReasonPhrase()}",
            true,
            $response->getStatusCode()
        );

        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }
    }

    private function sendResponseBody(ResponseInterface $response): void
    {
        echo $response->getBody();
    }
}
