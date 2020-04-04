<?php

declare(strict_types=1);

namespace Versalle\Framework\ActionDomainResponder\Responder\Response;

use Exception;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory;
use function GuzzleHttp\Psr7\stream_for;

final class ViewFactory
{
    private $factory;

    public function __construct(TwigTemplateRendererFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $view
     * @param array $data
     *
     * @return ResponseInterface
     *
     * @throws Exception
     */
    public function create(string $view, array $data = []): ResponseInterface
    {
        $templateRenderer = $this->factory->create();
        $content          = $templateRenderer->render($view, $data);
        $body             = stream_for($content);

        return (new Response())->withBody($body);
    }
}
