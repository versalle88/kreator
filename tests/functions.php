<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Versalle\Framework\Container\ContainerFactory;
use Versalle\Framework\FileSystem\DirectoryList;

function _get($id)
{
    $container = _container();

    return $container->get($id);
}

function _container(): ContainerInterface
{
    $containerFactory = _containerFactory();

    return $containerFactory->create();
}

function _containerFactory(): ContainerFactory
{
    return new ContainerFactory(new DirectoryList(FRAMEWORK_ROOT_DIR));
}
