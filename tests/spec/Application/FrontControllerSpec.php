<?php

/**
 * @noinspection PhpIllegalPsrClassPathInspection
 * @noinspection PhpUnused
 */

namespace spec\Versalle\Framework\Application;

use PhpSpec\ObjectBehavior;
use Versalle\Framework\Application\FrontController;
use Versalle\Framework\Application\FrontControllerInterface;
use Versalle\Framework\Application\RouterInterface;

class FrontControllerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(_get(RouterInterface::class));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FrontController::class);
    }

    function it_implements_front_controller_interface()
    {
        $this->shouldImplement(FrontControllerInterface::class);
    }
}
