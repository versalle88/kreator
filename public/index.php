<?php

declare(strict_types=1);

use Versalle\Framework\Kernel;

try {
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'boot' . DIRECTORY_SEPARATOR . 'bootstrap.php';
} catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 503 Service Unavailable.', true, 503);
    echo $e->getMessage();
    exit(1);
}

$kernel = Kernel::boot(ROOT_DIR);

$kernel->run();
