<?php

/**
 * @noinspection PhpIllegalPsrClassPathInspection
 * @noinspection PhpUnused
 */

namespace spec\Versalle\Framework\Presentation\Template;

use PhpSpec\ObjectBehavior;
use Versalle\Framework\FileSystem\DirectoryList;
use Versalle\Framework\Presentation\Template\TwigTemplateRenderer;
use Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory;

class TwigTemplateRendererFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(_get(DirectoryList::class));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TwigTemplateRendererFactory::class);
    }

    function it_creates_an_instance_of_twig_template_renderer()
    {
        $this->create()
            ->shouldReturnAnInstanceOf(TwigTemplateRenderer::class);
    }
}
