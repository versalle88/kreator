<?php

declare(strict_types=1);

use Versalle\Container\Container;

$config            = include CONFIG_DIR . DIRECTORY_SEPARATOR . 'di.php';
$applicationConfig = include APP_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'di.php';

foreach ($applicationConfig['objects'] as $key => $object) {
    $config['objects'][$key] = array_merge($config['objects'][$key], $object);
}
foreach ($applicationConfig['parameters'] as $key => $object) {
    $config['parameters'][$key] = array_merge($config['parameters'][$key], $object);
}

return new Container($config['objects'], $config['parameters']);
