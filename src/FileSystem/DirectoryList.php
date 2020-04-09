<?php

declare(strict_types=1);

namespace Versalle\Framework\FileSystem;

final class DirectoryList
{
    private $rootDir;

    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }
}
