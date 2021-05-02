<?php

declare(strict_types=1);

namespace Versalle\Framework\Presentation\Template;

use Twig\Environment;

final class TwigTemplateRenderer implements TemplateRendererInterface
{
    private $twigEnvironment;

    public function __construct(Environment $twigEnvironment)
    {
        $this->twigEnvironment = $twigEnvironment;
    }

    public function render(string $template, array $data = []): string
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return $this->twigEnvironment->render($template, $data);
    }
}
