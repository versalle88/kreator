<?php

declare(strict_types=1);

namespace Versalle\Framework\Application;

final class HttpApplication implements ApplicationInterface
{
    public function run(): void
    {
        require ROOT_DIR . DIRECTORY_SEPARATOR . 'boot' . DIRECTORY_SEPARATOR . 'kernel.php';
    }
}
