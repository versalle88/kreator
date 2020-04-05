<?php

declare(strict_types=1);

namespace Versalle\Framework\Presentation\Template;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class TwigTemplateRendererFactory
{
    private $templateDirectory;

    public function __construct(TemplateDirectory $templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    public function create(string $path = null): TwigTemplateRenderer
    {
        $paths = [];

        if (!is_null($path)) {
            $paths[] = $path;
        }

        $paths[] = $this->templateDirectory->__toString();

        $loader      = new FilesystemLoader($paths);
        $environment = new Environment($loader);

        return new TwigTemplateRenderer($environment);
    }
}
