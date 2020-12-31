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
        return $this->rootDir . self::DS;
    }

    public function getFrameworkBootDir(): string
    {
        return $this->getFrameworkRootDir() . self::BOOT . self::DS;
    }

    public function getFrameworkConfigDir(): string
    {
        return $this->getFrameworkRootDir() . self::CONFIG . self::DS;
    }

    public function getFrameworkDocsDir(): string
    {
        return $this->getFrameworkRootDir() . self::DOCS . self::DS;
    }

    public function getFrameworkPublicDir(): string
    {
        return $this->getFrameworkRootDir() . self::PUBLIC . self::DS;
    }

    public function getFrameworkResourcesDir(): string
    {
        return $this->getFrameworkRootDir() . self::RESOURCES . self::DS;
    }

    public function getFrameworkSrcDir(): string
    {
        return $this->getFrameworkRootDir() . self::SRC . self::DS;
    }

    public function getFrameworkTestsDir(): string
    {
        return $this->getFrameworkRootDir() . self::TESTS . self::DS;
    }

    public function getFrameworkVendorDir(): string
    {
        return $this->getFrameworkRootDir() . self::VENDOR . self::DS;
    }

    public function getApplicationRootDir(): string
    {
        return $this->getFrameworkRootDir() . self::APP . self::DS;
    }

    public function getApplicationConfigDir(): string
    {
        return $this->getApplicationRootDir() . self::CONFIG . self::DS;
    }

    public function getApplicationModulesDir(): string
    {
        return $this->getApplicationRootDir() . self::MODULES . self::DS;
    }

    public function getApplicationResourcesDir(): string
    {
        return $this->getApplicationRootDir() . self::RESOURCES . self::DS;
    }
}
