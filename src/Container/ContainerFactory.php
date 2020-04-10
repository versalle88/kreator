<?php

declare(strict_types=1);

namespace Versalle\Framework\Container;

use Psr\Container\ContainerInterface;
use Versalle\Container\Container;
use Versalle\Framework\FileSystem\DirectoryList;

final class ContainerFactory
{
    private $directoryList;

    private $containerClassName = Container::class;

    public function __construct(DirectoryList $directoryList)
    {
        $this->directoryList = $directoryList;
    }

    public function create(): ContainerInterface
    {
        $frameworkConfig   = $this->loadFrameworkConfig();
        $applicationConfig = $this->loadApplicationConfig();

        $config = $this->mergeConfig($frameworkConfig, $applicationConfig);

        return new $this->containerClassName($config['objects'], $config['parameters']);
    }

    private function loadFrameworkConfig(): array
    {
        /** @noinspection PhpIncludeInspection */
        return include $this->directoryList->getFrameworkConfigDir() . 'di.php';
    }

    private function loadApplicationConfig(): array
    {
        /** @noinspection PhpIncludeInspection */
        return include $this->directoryList->getApplicationConfigDir() . 'di.php';
    }

    private function mergeConfig(array $frameworkConfig, array $applicationConfig): array
    {
        foreach ($applicationConfig['objects'] as $key => $object) {
            $frameworkConfig['objects'][$key] = array_merge($frameworkConfig['objects'][$key], $object);
        }
        foreach ($applicationConfig['parameters'] as $key => $object) {
            $frameworkConfig['parameters'][$key] = array_merge($frameworkConfig['parameters'][$key], $object);
        }

        return $frameworkConfig;
    }
}
