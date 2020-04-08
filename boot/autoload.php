<?php

declare(strict_types=1);

$filename = VENDOR_DIR . DIRECTORY_SEPARATOR . 'autoload.php';

if (!file_exists($filename)) {
    throw new RuntimeException('Composer autoload file not found. Please run `composer install`.');
}

/** @noinspection PhpIncludeInspection */
include $filename;
