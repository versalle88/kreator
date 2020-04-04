<?php

declare(strict_types=1);

namespace Versalle\Framework\Presentation\Template;

interface TemplateRendererInterface
{
    /**
     * @param string $template
     * @param array $data
     *
     * @return string
     *
     * @throws \Exception
     */
    public function render(string $template, array $data = []): string;
}
