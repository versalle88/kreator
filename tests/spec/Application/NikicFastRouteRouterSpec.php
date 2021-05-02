<?php

/**
 * @noinspection PhpIllegalPsrClassPathInspection
 * @noinspection PhpUnused
 */

namespace spec\Versalle\Framework\Application;

use PhpSpec\ObjectBehavior;
use Psr\Http\Message\RequestInterface;
use Versalle\Framework\Application\NikicFastRouteRouter;
use Versalle\Framework\Application\RouterInterface;
use Versalle\Framework\FileSystem\DirectoryList;

class NikicFastRouteRouterSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(_get(DirectoryList::class));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(NikicFastRouteRouter::class);
    }

    function it_implements_application_interface()
    {
        $this->shouldImplement(RouterInterface::class);
    }

    function it_matches_a_request_to_a_route(RequestInterface $request)
    {
        $this->route($request)
            ->shouldBeArray();
    }
}
