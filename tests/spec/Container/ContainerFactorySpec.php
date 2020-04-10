<?php

namespace spec\Versalle\Framework\Container;

use PhpSpec\ObjectBehavior;
use Psr\Container\ContainerInterface;
use Versalle\Framework\Container\ContainerFactory;
use Versalle\Framework\FileSystem\DirectoryList;

/**
 * Class ContainerFactorySpec
 *
 * @noinspection PhpUnused
 */
class ContainerFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new DirectoryList(ROOT_DIR));
    }

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
