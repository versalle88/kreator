<?php

declare(strict_types=1);

namespace Versalle\Framework\Presentation\Template;

interface TemplateRendererInterface
{
    public function render(string $template, array $data = []): string;
}
