<?php

declare(strict_types=1);

namespace Versalle\Framework\Application;

use FastRoute\Dispatcher;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class FrontController implements FrontControllerInterface
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function dispatch(RequestInterface $request): ResponseInterface
    {
        $routeInfo = $this->router->route($request);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                $response = $this->prepareNotFoundResponse();

                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $response = $this->prepareMethodNotAllowedResponse();

                break;
            case Dispatcher::FOUND:
                $response = $this->prepareFoundResponse($routeInfo);

                break;
            default:
                $response = $this->prepareInternalServerErrorResponse();
        }

        return $response;
    }

    private function prepareFoundResponse(array $routeInfo): ResponseInterface
    {

    }

    private function prepareNotFoundResponse(): ResponseInterface
    {
        return new Response(404, [], 'Not Found');
    }

    private function prepareMethodNotAllowedResponse(): ResponseInterface
    {
        return new Response(405, [], 'Method Not Allowed');
    }

    private function prepareInternalServerErrorResponse(): ResponseInterface
    {
        return new Response(500, [], 'Internal Server Error');
    }
}
