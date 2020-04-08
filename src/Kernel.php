<?php

declare(strict_types=1);

namespace Versalle\Framework;

final class Kernel
{
    private static $instance;

    /**
     * Kernel constructor.
     *
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {

    }

    public static function boot(): Kernel
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
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
