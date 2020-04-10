<?php

declare(strict_types=1);

namespace Versalle\Framework;

use Versalle\Framework\Container\ContainerFactory;
use Versalle\Framework\FileSystem\DirectoryList;

final class Kernel
{
    private $containerFactory;

    private $container;

    private static $instance;

    /**
     * Kernel constructor.
     *
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     *
     * @param ContainerFactory $containerFactory
     */
    private function __construct(ContainerFactory $containerFactory)
    {
        $this->containerFactory = $containerFactory;
        $this->container        = $containerFactory->create();
    }

    public static function boot(string $rootDir): Kernel
    {
        if (is_null(static::$instance)) {
            static::$instance = static::createInstance($rootDir);
        }

        return static::$instance;
    }

    private static function createInstance(string $rootDir): Kernel
    {
        $containerFactory = static::createContainerFactory($rootDir);

        return new static($containerFactory);
    }

    private static function createContainerFactory(string $rootDir): ContainerFactory
    {
        $directoryList = static::createDirectoryList($rootDir);

        return new ContainerFactory();
    }

    private static function createDirectoryList(string $rootDir): DirectoryList
    {
        return new DirectoryList($rootDir);
    }

    public function run()
    {
        require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'boot' . DIRECTORY_SEPARATOR . 'kernel.php';
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     *
     * @noinspection PhpUnusedPrivateMethodInspection
     *
     * @SuppressWarnings(PHPMD.UnusedPrivateMethod)
     */
    private function __wakeup()
    {
    }
}
