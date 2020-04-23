<?php

declare(strict_types=1);

namespace Versalle\Framework\Presentation\Template;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Versalle\Framework\FileSystem\DirectoryList;

final class TwigTemplateRendererFactory
{
    private $directoryList;

    public function __construct(DirectoryList $directoryList)
    {
        $this->directoryList = $directoryList;
    }

    public function create(string $path = null): TwigTemplateRenderer
    {
        $paths = [];

        if (!is_null($path)) {
            $paths[] = $path;
        }

//        $paths[] = $this->templateDirectory->__toString();

        $loader      = new FilesystemLoader($paths);
        $environment = new Environment($loader);

        return new TwigTemplateRenderer($environment);
    }
}
