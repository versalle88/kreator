<?php /** @noinspection PhpIllegalPsrClassPathInspection */

namespace spec\Versalle\Framework\Presentation\Template;

use PhpSpec\ObjectBehavior;
use Versalle\Framework\FileSystem\DirectoryList;
use Versalle\Framework\Presentation\Template\TwigTemplateRenderer;
use Versalle\Framework\Presentation\Template\TwigTemplateRendererFactory;

/**
 * Class TwigTemplateRendererFactorySpec
 *
 * @noinspection PhpUnused
 */
class TwigTemplateRendererFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new DirectoryList(FRAMEWORK_ROOT_DIR));
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
