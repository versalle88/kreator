<?php /** @noinspection PhpIllegalPsrClassPathInspection */

namespace spec\Versalle\Framework;

use PhpSpec\ObjectBehavior;
use Versalle\Framework\Application\ApplicationInterface;
use Versalle\Framework\Kernel;

/**
 * Class KernelSpec
 *
 * @noinspection PhpUnused
 */
class KernelSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('boot', [FRAMEWORK_ROOT_DIR]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }

    function it_creates_an_instance_of_application_interface()
    {
        $this->createApplication()
            ->shouldReturnAnInstanceOf(ApplicationInterface::class);
    }
}
