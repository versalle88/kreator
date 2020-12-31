<?php

declare(strict_types=1);

namespace Versalle\Framework\FileSystem;

final class DirectoryList
{
    private $rootDir;

    private const BOOT = 'boot';

    private const CONFIG = 'config';

    private const DOCS = 'docs';

    private const PUBLIC = 'public';

    private const RESOURCES = 'resources';

    private const SRC = 'src';

    private const TESTS = 'tests';

    private const VENDOR = 'vendor';

    private const APP = 'app';

    private const MODULES = 'modules';

    private const DS = DIRECTORY_SEPARATOR;

    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }

    public function getFrameworkRootDir(): string
    {
        return $this->rootDir . DirectoryList::DS;
    }

    public function getFrameworkBootDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::BOOT . DirectoryList::DS;
    }

    public function getFrameworkConfigDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::CONFIG . DirectoryList::DS;
    }

    public function getFrameworkDocsDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::DOCS . DirectoryList::DS;
    }

    public function getFrameworkPublicDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::PUBLIC . DirectoryList::DS;
    }

    public function getFrameworkResourcesDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::RESOURCES . DirectoryList::DS;
    }

    public function getFrameworkSrcDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::SRC . DirectoryList::DS;
    }

    public function getFrameworkTestsDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::TESTS . DirectoryList::DS;
    }

    public function getFrameworkVendorDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::VENDOR . DirectoryList::DS;
    }

    public function getApplicationRootDir(): string
    {
        return $this->getFrameworkRootDir() . DirectoryList::APP . DirectoryList::DS;
    }

    public function getApplicationConfigDir(): string
    {
        return $this->getApplicationRootDir() . DirectoryList::CONFIG . DirectoryList::DS;
    }

    public function getApplicationModulesDir(): string
    {
        return $this->getApplicationRootDir() . DirectoryList::MODULES . DirectoryList::DS;
    }

    public function getApplicationResourcesDir(): string
    {
        return $this->getApplicationRootDir() . DirectoryList::RESOURCES . DirectoryList::DS;
    }
}
