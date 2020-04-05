<?php

declare(strict_types=1);

namespace Versalle\Framework\Presentation\Template;

final class TemplateDirectory
{
    private $templateDirectory;

    public function __construct(string $rootDirectory)
    {
        $this->templateDirectory = $rootDirectory . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'templates';
    }

    public function __toString(): string
    {
        return $this->templateDirectory;
    }
}
