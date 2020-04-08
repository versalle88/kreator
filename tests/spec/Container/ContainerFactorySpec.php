<?php

namespace spec\Versalle\Framework\Container;

use PhpSpec\ObjectBehavior;
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
}
