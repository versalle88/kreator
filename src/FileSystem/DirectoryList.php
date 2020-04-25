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
        return $this->rootDir . static::DS;
    }

    public function getFrameworkBootDir(): string
    {
        return $this->getFrameworkRootDir() . static::BOOT . static::DS;
    }

    public function getFrameworkConfigDir(): string
    {
        return $this->getFrameworkRootDir() . static::CONFIG . static::DS;
    }

    public function getFrameworkDocsDir(): string
    {
        return $this->getFrameworkRootDir() . static::DOCS . static::DS;
    }

    public function getFrameworkPublicDir(): string
    {
        return $this->getFrameworkRootDir() . static::PUBLIC . static::DS;
    }

    public function getFrameworkResourcesDir(): string
    {
        return $this->getFrameworkRootDir() . static::RESOURCES . static::DS;
    }

    public function getFrameworkSrcDir(): string
    {
        return $this->getFrameworkRootDir() . static::SRC . static::DS;
    }

    public function getFrameworkTestsDir(): string
    {
        return $this->getFrameworkRootDir() . static::TESTS . static::DS;
    }

    public function getFrameworkVendorDir(): string
    {
        return $this->getFrameworkRootDir() . static::VENDOR . static::DS;
    }

    public function getApplicationRootDir(): string
    {
        return $this->getFrameworkRootDir() . static::APP . static::DS;
    }

    public function getApplicationConfigDir(): string
    {
        return $this->getApplicationRootDir() . static::CONFIG . static::DS;
    }

    public function getApplicationModulesDir(): string
    {
        return $this->getApplicationRootDir() . static::MODULES . static::DS;
    }

    public function getApplicationResourcesDir(): string
    {
        return $this->getApplicationRootDir() . static::RESOURCES . static::DS;
    }
}
