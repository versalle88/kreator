<?php

declare(strict_types=1);

namespace Versalle\Framework;

use Exception;
use Versalle\Framework\Application\ApplicationInterface;
use Versalle\Framework\Container\ContainerFactory;
use Versalle\Framework\FileSystem\DirectoryList;

final class Kernel
{
    private $container;

    private static $instance;

    /**
     * Kernel constructor.
     *
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from \Versalle\Framework\Kernel::boot() instead
     *
     * @param ContainerFactory $containerFactory
     */
    private function __construct(ContainerFactory $containerFactory)
    {
        $this->container = $containerFactory->create();
    }

    public static function boot(string $rootDir): Kernel
    {
        if (is_null(self::$instance)) {
            self::$instance = self::createInstance($rootDir);
        }

        return self::$instance;
    }

    private static function createInstance(string $rootDir): Kernel
    {
        $containerFactory = self::createContainerFactory($rootDir);

        return new Kernel($containerFactory);
    }

    private static function createContainerFactory(string $rootDir): ContainerFactory
    {
        $directoryList = self::createDirectoryList($rootDir);

        return new ContainerFactory($directoryList);
    }

    private static function createDirectoryList(string $rootDir): DirectoryList
    {
        return new DirectoryList($rootDir);
    }

    public function createApplication(): ApplicationInterface
    {
        return $this->container->get(ApplicationInterface::class);
    }

    public function launch(ApplicationInterface $application): void
    {
        $application->run();
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
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }
}
