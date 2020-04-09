<?php

namespace spec\Versalle\Framework\FileSystem;

use PhpSpec\ObjectBehavior;
use Versalle\Framework\FileSystem\DirectoryList;

/**
 * Class DirectoryListSpec
 *
 * @noinspection PhpUnused
 */
class DirectoryListSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DirectoryList::class);
    }
}
