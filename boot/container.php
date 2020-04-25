<?php

declare(strict_types=1);

use Versalle\Framework\Container\ContainerFactory;
use Versalle\Framework\FileSystem\DirectoryList;

return (new ContainerFactory(new DirectoryList(FRAMEWORK_ROOT_DIR)))->create();
