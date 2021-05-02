<?php

/**
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace Versalle\Framework\Application;

use FastRoute\Dispatcher;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class FrontController implements FrontControllerInterface
{
    private $router;

    private $actionFactory;

    public function __construct(RouterInterface $router, ActionFactory $actionFactory)
    {
        $this->router        = $router;
        $this->actionFactory = $actionFactory;
    }

    public function dispatch(ServerRequestInterface $request): ResponseInterface
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
                $response = $this->prepareFoundResponse($request, $routeInfo);

                break;
            default:
                $response = $this->prepareInternalServerErrorResponse();
        }

        return $response;
    }

    private function prepareFoundResponse(ServerRequestInterface $request, array $routeInfo): ResponseInterface
    {
        $action = $this->actionFactory->create($routeInfo);

        return $action->handle($request);
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
