<?php

namespace spec\Versalle\Framework\Container;

use PhpSpec\ObjectBehavior;
use Psr\Container\ContainerInterface;
use Versalle\Framework\Container\ContainerFactory;

/**
 * Class ContainerFactorySpec
 *
 * @noinspection PhpUnused
 */
class ContainerFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ContainerFactory::class);
    }

    function it_creates_an_instance_of_psr_container_interface()
    {
        $this->create()
            ->shouldReturnAnInstanceOf(ContainerInterface::class);
    }
}
