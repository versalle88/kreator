<?php /** @noinspection PhpIllegalPsrClassPathInspection */

namespace spec\Versalle\Framework;

use PhpSpec\ObjectBehavior;
use Versalle\Framework\Kernel;

/**
 * Class KernelSpec
 *
 * @noinspection PhpUnused
 */
class KernelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }
}
