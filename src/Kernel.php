<?php

declare(strict_types=1);

namespace Versalle\Framework;

use Versalle\Framework\Container\ContainerFactory;

final class Kernel
{
    private $containerFactory;

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
    }

    public static function boot(): Kernel
    {
        if (is_null(static::$instance)) {
            static::$instance = static::createInstance();
        }

        return static::$instance;
    }

    private static function createInstance(): Kernel
    {
        $containerFactory = static::createContainerFactory();

        return new static($containerFactory);
    }

    private static function createContainerFactory(): ContainerFactory
    {
        return new ContainerFactory();
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
     */
    private function __wakeup()
    {

    }
}
