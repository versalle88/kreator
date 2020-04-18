<?php

namespace spec\Versalle\Framework\Application;

use PhpSpec\ObjectBehavior;
use Versalle\Framework\Application\ApplicationInterface;
use Versalle\Framework\Application\HttpApplication;

class HttpApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(HttpApplication::class);
    }

    function it_implements_application_interface()
    {
        $this->shouldImplement(ApplicationInterface::class);
    }
}
