<?php

declare(strict_types=1);

use Versalle\Container\Container;

$config = include CONFIG_DIR . DIRECTORY_SEPARATOR . 'di.php';

return new Container($config['objects'], $config['parameters']);
