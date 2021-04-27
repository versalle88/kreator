<?php

declare(strict_types=1);

namespace Versalle\Framework\ActionDomainResponder\Responder\Response;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\ResponseInterface;
use Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory;

final class ViewFactory
{
    private $factory;

    public function __construct(TwigTemplateRendererFactory $factory)
    {
        $this->factory = $factory;
    }

    public function create(string $view, array $data = []): ResponseInterface
    {
        $path             = $this->getPath($view);
        $view             = $this->getView($view);
        $templateRenderer = $this->factory->create($path);
        $content          = $templateRenderer->render($view, $data);
        $body             = Utils::streamFor($content);

        return (new Response())->withBody($body);
    }

    private function getPath(string $view): ?string
    {
        if (strpos($view, '::') === false) {
            return null;
        }

        $pieces = explode('::', $view);

        return FRAMEWORK_ROOT_DIR . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR
            . $pieces[0] . DIRECTORY_SEPARATOR . 'views';
    }

    private function getView(string $view): string
    {
        if (strpos($view, '::') === false) {
            return $view . '.html.twig';
        }

        $pieces = explode('::', $view);

        return $pieces[1] . '.html.twig';
    }
}
