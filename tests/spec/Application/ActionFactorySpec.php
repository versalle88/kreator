<?php

/**
 * @noinspection PhpIllegalPsrClassPathInspection
 * @noinspection PhpUnused
 */

namespace spec\Versalle\Framework\Application;

use PhpSpec\ObjectBehavior;
use Psr\Container\ContainerInterface;
use Versalle\Framework\ActionDomainResponder\Action\ActionInterface;
use Versalle\Framework\Application\ActionFactory;

class ActionFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(_get(ContainerInterface::class));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ActionFactory::class);
    }

    function it_creates_an_instance_of_action_interface()
    {
        $routeInfo = [
            1,
            'App\HelloFriend\Action\HelloFriendIndexAction',
            [],
        ];

        $this->create($routeInfo)
            ->shouldBeAnInstanceOf(ActionInterface::class);
    }
}
